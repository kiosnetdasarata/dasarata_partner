<?php

namespace App\Providers;

use App\Interfaces\Partners\CustomerInterface;
use App\Interfaces\Partners\PaymentInterface;
use App\Repositories\Partners\CustomerRepository;
use App\Repositories\Partners\PaymentRepository;
use Illuminate\Support\ServiceProvider;

class PartnerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(CustomerInterface::class, CustomerRepository::class);
        $this->app->bind(PaymentInterface::class, PaymentRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
