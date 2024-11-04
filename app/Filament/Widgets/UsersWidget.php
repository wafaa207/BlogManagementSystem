<?php

namespace App\Filament\Widgets;

use App\Models\User;
use Filament\Support\Enums\IconPosition;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class UsersWidget extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('', User::count())
            ->description('Blog Users')
            ->descriptionIcon('heroicon-m-user-group', IconPosition::Before)
            ->chart([10, 20, 30, 60, 90, 120])
            ->color('success')
        ];
    }
}
