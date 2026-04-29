<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use App\Models\Category;

class AdminChart extends ChartWidget
{
    protected ?string $heading = 'Categories & Posts Chart';

    protected string $color = 'info';

    protected function getData(): array
    {
        $data = Category::withCount('posts')->get();
        return [
            'datasets' => [
                [
                    'label' => 'Assosiated Posts Count',
                    'data' => $data->pluck('posts_count')->toArray(),
                    'backgroundColor' => [
                        '#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0', '#9966FF', '#FF9F40', '#C9CBCF', '#E7E9ED'
                    ],
                ],
            ],
            'labels' => $data->map(fn($c) => $c->name .'('. $c->status .')')->toArray(),
        ];
    }

    protected function getType(): string
    {
        return 'pie';
    }
}
