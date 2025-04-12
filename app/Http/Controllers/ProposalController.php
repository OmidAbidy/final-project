<?php

namespace App\Http\Controllers;

use App\Models\ClientJob;
use App\Models\Proposal;
use Illuminate\Http\Request;

class ProposalController extends Controller
{

    public function __construct()
    {
        // Freelancer-only methods
        // $this->middleware('role:freelancer')->only(['create', 'store']);

        // // // Client-only methods
        // $this->middleware('role:client')->only(['updateStatus']);
    }

    public function index(Request $request)
    {
        $user = auth()->user();
    
        if ($user->isFreelancer()) {
            // Freelancers see their submitted proposals
            $proposals = Proposal::where('freelancer_id', $user->id)
                ->with('clientJob') // Load related job details
                ->latest()
                ->get();
    
        } elseif ($user->isClient()) {
            // Clients see proposals submitted to their jobs
            $query = Proposal::whereHas('clientJob', function ($q) use ($user) {
                $q->where('client_id', $user->id);
            })
            ->with('freelancer', 'clientJob') // Load freelancer and job details
            ->latest();
    
            // Optional filter: only shortlisted proposals
            if ($request->has('shortlisted') && $request->shortlisted == 1) {
                $query->where('shortlisted', true);
            }
    
            $proposals = $query->get();
    
        } else {
            abort(403, 'Unauthorized');
        }
    
        return view('backend.proposals.index', compact('proposals'));
    }
    
    public function adminIndex()
    {
        $proposals = Proposal::with(['freelancer', 'clientJob'])->latest()->get();
        return view('backend.proposals.admin.index', compact('proposals'));
    }


    // Admin-specific method to override status if needed
    public function adminUpdateStatus(Request $request, Proposal $proposal)
    {
        // Ensure admin user
        if (!$user = auth()->user() || !$user->isAdmin()) {
            abort(403);
        }

        $validated = $request->validate(['status' => 'required|in:accepted,rejected,disputed,closed']);
        $proposal->update(['status' => $validated['status']]);

        // Optionally log this action for audit purposes
        // Log::info("Admin {$user->id} updated proposal {$proposal->id} status to {$validated['status']}");

        return back()->with('success', 'Proposal status updated by admin!');
    }

    public function store(Request $request)
    {
        // Verify user is a freelancer
        if (!auth()->user()->isFreelancer()) {
            abort(403, 'Only freelancers can submit proposals');
        }

        $validated = $request->validate([
            'clientjob_id' => 'required|exists:client_jobs,id',
            'bid_amount' => 'required|numeric|min:1',
            'description' => 'required|string|min:100',
            'delivery_time' => 'required|string|max:50',
        ]);
        // Check if freelancer has already submitted a proposal for this job
        $existing = Proposal::where('freelancer_id', auth()->id())
            ->where('clientjob_id', $validated['clientjob_id'])
            ->exists();

        if ($existing) {
            return redirect()->back()->withErrors([
                'clientjob_id' => 'You have already submitted a proposal for this job.'
            ])->withInput();
        }


        Proposal::create([
            ...$validated,
            'freelancer_id' => auth()->id(),
            'status' => 'pending'
        ]);


        return redirect()->route('freelancer.jobs.show', $request->clientjob_id)
            ->with('success', 'Proposal submitted successfully!');
    }

    public function create()
    {
        // Verify user is a freelancer
        if (!auth()->user()->isFreelancer()) {
            abort(403, 'Only freelancers can access this page.');
        }

        // Optionally fetch data required for the form, e.g., client jobs
        $clientJobs = ClientJob::all(); // Replace with your actual query
        $proposal = new Proposal();
        return view('backend.proposals.create', compact('clientJobs', 'proposal'));
    }


    public function updateStatus(Request $request, Proposal $proposal)
    {
        // Verify user is the job owner (client)
        if (!auth()->user()->isClient() || $proposal->clientJob->client_id !== auth()->id()) {
            abort(403);
        }

        $request->validate(['status' => 'required|in:accepted,rejected']);
        $proposal->update(['status' => $request->status]);

        return back()->with('success', 'Proposal status updated!');
    }

    public function show(Proposal $proposal)
    {
        $job = $proposal->clientJob;
        return view('backend.proposals.show', compact('proposal', 'job'));
    }

    // In ProposalController.php

    // Only accessible by the freelancer who created the proposal
    public function edit(Proposal $proposal)
    {
        // Check that the authenticated user is the owner and proposal is pending
        if (auth()->id() !== $proposal->freelancer_id || $proposal->status !== 'pending') {
            abort(403);
        }
        return view('backend.proposals.edit', compact('proposal'));
    }

    public function update(Request $request, Proposal $proposal)
    {
        if (auth()->id() !== $proposal->freelancer_id || $proposal->status !== 'pending') {
            abort(403);
        }

        $validated = $request->validate([
            'bid_amount'    => 'required|numeric|min:1',
            'description'   => 'required|string|min:100',
            'delivery_time' => 'required|string|max:50',
        ]);

        $proposal->update($validated);

        return redirect()->route('proposals.show', $proposal)
            ->with('success', 'Proposal updated successfully!');
    }

    public function destroy(Proposal $proposal)
    {
        if (auth()->id() !== $proposal->freelancer_id || $proposal->status !== 'pending') {
            abort(403);
        }

        $proposal->delete();

        return redirect()->route('proposals.index')
            ->with('success', 'Proposal withdrawn successfully!');
    }


    // Only accessible by clients and only for proposals belonging to their jobs
    public function shortlist(Proposal $proposal)
    {
        // Ensure that the client is the owner of the job associated with the proposal
        if (!auth()->user()->isClient() || $proposal->clientJob->client_id !== auth()->id()) {
            abort(403);
        }

        // Assume you have a field 'shortlisted' in your proposals table
        // $proposal->update(['shortlisted' => true]);
        $proposal->shortlisted = !$proposal->shortlisted;
        $proposal->save();
        return back()->with('success', $proposal->shortlisted ? 'Proposal shortlisted.' : 'Proposal unshortlisted.');
    }

    // This method could be a starting point to integrate a messaging system
    public function messageFreelancer(Request $request, Proposal $proposal)
    {
        if (!auth()->user()->isClient() || $proposal->clientJob->client_id !== auth()->id()) {
            abort(403);
        }

        $validated = $request->validate([
            'message' => 'required|string|min:10',
        ]);

        // Here, you would send a message, store it in a messages table or trigger a notification
        // For demonstration:
        // Message::create([...]);

        return back()->with('success', 'Your message has been sent!');
    }
}
