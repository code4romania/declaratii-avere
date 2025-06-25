<?php

declare(strict_types=1);

namespace App\Filament\Widgets;

use App\Enums\UserRole;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Illuminate\Support\Facades\Auth;

class StatsOverviewWidget extends BaseWidget
{
    protected function getStats(): array
    {
        return match (Auth::user()->role) {
            UserRole::ADMIN => $this->getAdminStats(),
            UserRole::VALIDATOR => $this->getValidatorStats(),
            UserRole::CONTRIBUTOR => $this->getContributorStats(),
            default => [],
        };
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
