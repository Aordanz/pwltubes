<?php

namespace App\Filament\Widgets;

use App\Models\ActivityUser;
use Carbon\Carbon;
use Filament\Widgets\ChartWidget;

class UserActivityChart extends ChartWidget
{
    protected static ?string $heading = 'Aktivitas Harian Pengguna (31 Hari Terakhir)';
    protected static ?string $maxHeight = '300px';

    protected int | string | array $columnSpan = 2;

    protected function getData(): array
    {
        // Ambil tanggal 31 hari terakhir
        $dates = collect(range(0, 30))->map(function ($i) {
            return Carbon::today()->subDays(30 - $i)->format('Y-m-d');
        });

        // Ambil aktivitas yang dibuat dalam 31 hari terakhir
        $activityData = ActivityUser::where('created_at', '>=', Carbon::today()->subDays(30))
            ->get()
            ->groupBy(fn ($item) => $item->created_at->format('Y-m-d'))
            ->map(fn ($items) => $items->count());

        return [
            'datasets' => [
                [
                    'label' => 'Jumlah Aktivitas',
                    'data' => $dates->map(fn ($date) => $activityData[$date] ?? 0)->toArray(),
                    'borderColor' => '#3b82f6',
                    'backgroundColor' => 'rgba(59,130,246,0.2)',
                    'fill' => true,
                    'tension' => 0.4, // buat garis agak melengkung
                ],
            ],
            'labels' => $dates->toArray(),
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
