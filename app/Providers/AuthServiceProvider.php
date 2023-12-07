<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\PartnerCustomer;
use App\Policies\PartnerCustomerPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        PartnerCustomer::class => PartnerCustomerPolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        //
    }
}
