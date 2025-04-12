<?php

namespace App\Policies;

use App\Models\Proposal;
use App\Models\User;

class ProposalPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }
    public function accept(User $user, Proposal $proposal)
{
    return $user->id === $proposal->job->client_id;
}
}
