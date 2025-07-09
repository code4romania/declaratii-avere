<?php

declare(strict_types=1);

namespace App\Filament\Widgets;

use App\Enums\UserRole;
use App\Models\SourceFile;
use App\Models\StatementAssets;
use App\Models\StatementInterests;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\Facades\Auth;

class StatsOverviewWidget extends BaseWidget
{
    protected static ?string $pollingInterval = null;

    protected function getStats(): array
    {
        $stats = match (Auth::user()->role) {
            UserRole::ADMIN => $this->getAdminStats(),
            UserRole::VALIDATOR => $this->getValidatorStats(),
            UserRole::CONTRIBUTOR => $this->getContributorStats(),
            default => [],
        };

        return array_merge([
            Stat::make(
                __('app.stats.assets_collected'),
                SourceFile::query()
                    ->whereAssets()
                    ->count()
            ),

            Stat::make(
                __('app.stats.interests_collected'),
                SourceFile::query()
                    ->whereInterests()
                    ->count()
            ),

            Stat::make(
                __('app.stats.assets_digitalized'),
                StatementAssets::query()
                    ->count()
            ),

            Stat::make(
                __('app.stats.interests_digitalized'),
                StatementInterests::query()
                    ->count()
            ),

            Stat::make(
                __('app.stats.assets_validated'),
                StatementAssets::query()
                    ->whereValidated()
                    ->count()
            ),

            Stat::make(
                __('app.stats.interests_validated'),
                StatementInterests::query()
                    ->whereValidated()
                    ->count()
            ),
        ], $stats);
    }

    private function getAdminStats(): array
    {
        return [
            // Define your admin stats here
        ];
    }

    private function getValidatorStats(): array
    {
        return [
            // Define your validator stats here
        ];
    }

    private function getContributorStats(): array
    {
        return [
            // Define your contributor stats here
        ];
    }
}
