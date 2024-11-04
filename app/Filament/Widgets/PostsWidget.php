<?php

namespace App\Filament\Widgets;

use App\Models\Post;
use Filament\Support\Enums\IconPosition;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class PostsWidget extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('', Post::count())
            ->description('Blog Posts')
            ->descriptionIcon('heroicon-m-user-group', IconPosition::Before)
            ->chart([10, 20, 30, 60, 90, 120])
            ->color('warning')
        ];
    }
}
