<?php

declare(strict_types=1);

namespace App\Providers;

use Filament\Pages\Page;
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
        Page::alignFormActionsEnd();
    }
}
