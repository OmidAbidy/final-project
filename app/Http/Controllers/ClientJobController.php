<?php

namespace App\Http\Controllers;

use App\Models\ClientJob;
use App\Models\Category;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ClientJobController extends Controller
{

    use AuthorizesRequests; // Add this line
    // Public Methods
    public function publicIndex()
    {
        $jobs = ClientJob::where('visibility', 'public')
                        ->where('status', 'open')
                        ->where('application_deadline', '>', now())
                        ->with('client', 'category')
                        ->latest()
                        ->paginate(10);
        
        return view('frontend.JobProMan.jobs', compact('jobs'));
    }

    public function publicShow($id)
    {
        $job = ClientJob::where('visibility', 'public')
                       ->where('status', 'open')
                       ->findOrFail($id);
    
        return view('frontend.JobProMan.project', [
            'job' => $job->load('client', 'category'),
            'attachments' => $job->attachments ? json_decode($job->attachments) : []
        ]);
    }

    // Client Methods
    public function index()
    {
        
        $jobs = ClientJob::where('client_id', auth()->id())
                        ->with('category')
                        ->latest()
                        ->paginate(10);

        return view('backend.jobs.index', compact('jobs'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('backend.jobs.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $this->validateJobRequest($request);

        $job = $this->createJobWithAttachments($validated, $request);

        return redirect()->route('jobs.show', $job)
                        ->with('success', 'Job posted successfully!');
    }

    public function show(ClientJob $job)
    {
        if (auth()->user()->cannot('view', $job)) {
                abort(403, "You do not have permission to view this job.");
            }


        return view('backend.jobs.show', [
            'job' => $job->load('client', 'category', 'proposals'),
            'attachments' => $job->attachments ? json_decode($job->attachments) : []
        ]);
    }

    public function edit(ClientJob $job)
    {
        $this->authorize('update', $job);

        $categories = Category::all();
        return view('backend.jobs.edit', [
            'job' => $job,
            'categories' => $categories,
            'attachments' => $job->attachments ? json_decode($job->attachments) : []
        ]);
    }

    public function update(Request $request, ClientJob $job)
    {
        //uncomment the following
        $this->authorize('update', $job);

        $validated = $this->validateJobRequest($request, $job);
        $this->handleAttachments($request, $job);
        $job->update($validated);

        return redirect()->route('backend.jobs.show', $job)
                        ->with('success', 'Job updated successfully!');
    }

    public function destroy(ClientJob $job)
    {
        $this->authorize('delete', $job);
        $this->deleteJobAttachments($job);
        $job->delete();

        return redirect()->route('backend.jobs.index')
                        ->with('success', 'Job deleted successfully!');
    }

    public function markAsCompleted(ClientJob $job)
    {
        $this->authorize('update', $job);
        $job->update(['status' => 'completed']);

        return back()->with('success', 'Job marked as completed!');
    }

    public function showProposals(ClientJob $job)
    {
        $this->authorize('view', $job);
        
        return view('backend.jobs.proposals', [
            'job' => $job->load('proposals.freelancer'),
            'proposals' => $job->proposals()->latest()->paginate(10)
        ]);
    }

    // Admin Methods
    public function adminIndex()
    {
        
        $jobs = ClientJob::with('client', 'category')
                        ->latest()
                        ->paginate(15);

        return view('backend.admin.jobs.index', compact('jobs'));
    }

    public function adminDestroy(ClientJob $job)
    {
        $this->authorize('delete', $job);
        $this->deleteJobAttachments($job);
        $job->delete();

        return back()->with('success', 'Job deleted successfully!');
    }

    // Freelancer Methods
    public function freelancerIndex()
    {
        $jobs = ClientJob::where('visibility', 'public')
                        ->where('status', 'open')
                        ->where('application_deadline', '>', now())
                        ->with('client', 'category')
                        ->latest()
                        ->paginate(10);

        return view('backend.jobs.index', compact('jobs'));
    }

    public function freelancerShow(ClientJob $job)
    {
        if ($job->visibility !== 'public' || $job->status !== 'open') {
            abort(404);
        }

        return view('backend.jobs.show', [
            'job' => $job->load('client', 'category'),
            'attachments' => $job->attachments ? json_decode($job->attachments) : [],
            'hasApplied' => $job->proposals()->where('freelancer_id', auth()->id())->exists()
        ]);
    }

    // Helper Methods
    protected function validateJobRequest(Request $request, $job = null)
    {
        return $request->validate([
            'title' => 'required|string|max:255',
            'categorie_id' => 'required|exists:categories,id',
            'description' => 'required|string|min:100',
            'budget_type' => 'required|in:fixed,hourly',
            'budget_amount' => 'nullable|required_if:budget_type,fixed|numeric|min:1',
            'is_negotiable' => 'boolean',
            'application_deadline' => 'required|date|after:now',
            'project_deadline' => 'nullable|date|after:application_deadline',
            'status' => $job ? 'required|in:open,in_progress,completed,cancelled' : '',
            'visibility' => 'required|in:public,private,invite_only',
            'location' => 'required|string|max:100',
            'experience_level' => 'required|in:entry,intermediate,expert',
            'payment_method' => 'required|in:escrow,milestone,on_completion',
            'hires_needed' => 'required|integer|min:1',
            'terms' => 'nullable|string',
            'attachments.*' => 'nullable|file|mimes:pdf,doc,docx,jpg,png|max:2048',
        ]);
    }

    protected function createJobWithAttachments($validated, Request $request)
    {
        $attachments = $this->processAttachments($request);

        return ClientJob::create([
            'client_id' => auth()->id(),
            'title' => $validated['title'],
            'categorie_id' => $validated['categorie_id'],
            'description' => $validated['description'],
            'budget_type' => $validated['budget_type'],
            'budget_amount' => $validated['budget_type'] === 'fixed' ? $validated['budget_amount'] : null,
            'is_negotiable' => $validated['is_negotiable'] ?? false,
            'application_deadline' => $validated['application_deadline'],
            'project_deadline' => $validated['project_deadline'],
            'visibility' => $validated['visibility'],
            'location' => $validated['location'],
            'experience_level' => $validated['experience_level'],
            'payment_method' => $validated['payment_method'],
            'hires_needed' => $validated['hires_needed'],
            'terms' => $validated['terms'],
            'attachments' => $attachments,
        ]);
    }

    protected function handleAttachments(Request $request, $job)
    {
        if ($request->has('delete_attachments')) {
            $this->deleteAttachments($request->delete_attachments, $job);
        }

        if ($request->hasFile('attachments')) {
            $this->addAttachments($request->file('attachments'), $job);
        }
    }

    protected function processAttachments(Request $request)
    {
        if (!$request->hasFile('attachments')) return null;

        return json_encode(collect($request->file('attachments'))->map(function ($file) {
            $path = $file->store('job_attachments');
            return [
                'name' => $file->getClientOriginalName(),
                'path' => $path,
                'mime' => $file->getMimeType()
            ];
        })->toArray());
    }

    protected function deleteAttachments($paths, $job)
    {
        $attachments = collect(json_decode($job->attachments, true))
            ->reject(fn($file) => in_array($file['path'], $paths));

        foreach ($paths as $path) {
            Storage::delete($path);
        }

        $job->attachments = $attachments->isNotEmpty() ? json_encode($attachments) : null;
        $job->save();
    }

    protected function addAttachments($files, $job)
    {
        $existing = json_decode($job->attachments, true) ?? [];
        $newAttachments = $this->processAttachments(collect($files));

        $job->attachments = json_encode(array_merge($existing, $newAttachments));
        $job->save();
    }

    protected function deleteJobAttachments($job)
    {
        if ($job->attachments) {
            foreach (json_decode($job->attachments) as $file) {
                Storage::delete($file->path);
            }
        }
    }
}