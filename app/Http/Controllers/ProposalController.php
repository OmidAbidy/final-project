<?php

namespace App\Http\Controllers;

use App\Models\Proposal;
use Illuminate\Http\Request;

class ProposalController extends Controller
{

    public function __construct()
{
    // Freelancer-only methods
    $this->middlewware('role:freelancer')->only(['create', 'store']);
    
    // Client-only methods
    $this->middleware('role:client')->only(['updateStatus']);
}
    public function store(Request $request)
    {
        // Verify user is a freelancer
        if (!auth()->user()->isFreelancer()) {
            abort(403, 'Only freelancers can submit proposals');
        }
    
        $validated = $request->validate([
            'clientjob_id' => 'required|exists:clientjobs,id',
            'bid_amount' => 'required|numeric|min:1',
            'description' => 'required|string|min:100',
            'delivery_time' => 'required|string|max:50',
        ]);
    
        Proposal::create([
            ...$validated,
            'freelancer_id' => auth()->id(),
            'status' => 'pending'
        ]);
    
        return redirect()->route('jobs.show', $request->clientjob_id)
            ->with('success', 'Proposal submitted successfully!');
    }
    
    public function updateStatus(Request $request, Proposal $proposal)
    {
        // Verify user is the job owner (client)
        if (!auth()->user()->isClient() || $proposal->clientJob->user_id !== auth()->id()) {
            abort(403);
        }
    
        $request->validate(['status' => 'required|in:accepted,rejected']);
        $proposal->update(['status' => $request->status]);
    
        return back()->with('success', 'Proposal status updated!');
    }
}
