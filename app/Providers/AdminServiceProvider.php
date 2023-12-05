<?php

namespace App\Providers;

use App\Interfaces\Admin\PartnerInterface;
use App\Repositories\Admin\PartnerRepository;
use Illuminate\Support\ServiceProvider;

class AdminServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(PartnerInterface::class, PartnerRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
