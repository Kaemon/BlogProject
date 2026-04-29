<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\Category;
use App\Models\Post;

class StatsAdminOverview extends StatsOverviewWidget
{
    protected function getHeading(): ?string
    {
        return 'Analytics';
    }

    protected function getDescription(): ?string
    {
        return 'An overview of Categories and Posts.';
    }
    protected function getStats(): array
    {
        return [
            Stat::make('Published Categories', Category::query()->where('status','published')->count())
                ->description(Category::query()->where('status','published')->count() .' published categories increased')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->color('success'),
            Stat::make('Draft Categories', Category::query()->where('status','draft')->count())
                ->description(Category::query()->where('status','draft')->count() .' draft categories increased')
                ->descriptionIcon('heroicon-m-arrow-trending-down')
                ->color('danger'),
            Stat::make('Published Posts', Post::query()->where('status','published')->count())
                ->description(Post::query()->where('status','published')->count() .' published posts increased')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->color('success'),
            Stat::make('Draft Posts', Post::query()->where('status','draft')->count())
                ->description(Post::query()->where('status','draft')->count() .' draft posts increased')
                ->descriptionIcon('heroicon-m-arrow-trending-down')
                ->color('danger'),
        ];
    }
}
