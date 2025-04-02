<?php

namespace App\Policies;

use App\Models\ClientJob;
use App\Models\Job;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ClientJobPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
            return $user->role === 'admin' || $user->role === 'client';
       

    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, ClientJob $job)
    {
        // Allow clients to view their own jobs
        return $user->role === 'admin' || $user->role === 'client';

    }
    

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return false;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, ClientJob $job): bool
    {
        return $user->role === 'admin' || $user->role === 'client';
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, ClientJob $job): bool
    {
    return $user->role === 'admin' || $user->role === 'client';

    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, ClientJob $job): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, ClientJob $job): bool
    {
        return $user->role === 'client';
    }
}
