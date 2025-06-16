<?php

declare(strict_types=1);

namespace App\Providers;

use Filament\Forms\Components\Repeater;
use Filament\Pages\Page;
use Filament\Resources\Resource;
use Filament\Support\Enums\Alignment;
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

        Repeater::configureUsing(function (Repeater $repeater) {
            return $repeater->addActionAlignment(Alignment::Left)
                ->addActionLabel(__('app.add_another'));
        });

        Resource::titleCaseModelLabel(false);
    }
}
