<?php

namespace App\Providers;

use App\Models\ClientJob;
use App\Models\Proposal;
use App\Policies\ClientJobPolicy;
use App\Policies\ProposalPolicy;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Gate::define('isadmin', function($user = null){
            return $user && $user->role === 'admin';
        });
        
        Gate::define('isfreelancer', function($user = null){
            return $user && $user->role === 'freelancer'; 
        });
        
        Gate::define('isclient', function($user = null){
            return $user && $user->role === 'client'; 
        });

        Gate::define('view-shortlisted-proposals', function ($user) {
            return in_array($user->role, ['client', 'admin']);
        });
        
        
    }
    protected $policies = [
        ClientJob::class => ClientJobPolicy::class,
        Proposal::class => ProposalPolicy::class,
    ];

    
    
}
