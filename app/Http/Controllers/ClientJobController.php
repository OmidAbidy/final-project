<?php

namespace App\Http\Controllers;

use App\Models\ClientJob;
use App\Models\Category;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;

class ClientJobController extends Controller
{
    use AuthorizesRequests;

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
            'job' => $job->load('client', 'category')
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
        $job = ClientJob::create($validated + ['client_id' => auth()->id()]);

        return redirect()->route('jobs.show', $job)
                        ->with('success', 'Job posted successfully!');
    }

    public function show(ClientJob $job)
    {
        $this->authorize('view', $job);

        return view('backend.jobs.show', [
            'job' => $job->load('client', 'category', 'proposals')
        ]);
    }

    public function edit(ClientJob $job)
    {
        $this->authorize('update', $job);
        $categories = Category::all();
        return view('backend.jobs.edit', compact('job', 'categories'));
    }

    public function update(Request $request, ClientJob $job)
    {
        $this->authorize('update', $job);
        $validated = $this->validateJobRequest($request, $job);
        $job->update($validated);

        return redirect()->route('jobs.show', $job)
                        ->with('success', 'Job updated successfully!');
    }

    public function destroy(ClientJob $job)
    {
        $this->authorize('delete', $job);
        $job->delete();

        return redirect()->route('jobs.index')
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
        ]);
    }
}
