<?php

namespace App\Filament\Resources\ActivityUserResource\Pages;

use App\Filament\Resources\ActivityUserResource;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Widgets\InactiveUsersToday;

// Tambahkan widget yang ingin digunakan
use App\Filament\Widgets\UserActivityChart;
use App\Filament\Widgets\ActivityAlertNotification;
use App\Filament\Widgets\RecentActivityTable;


class ListActivityUsers extends ListRecords
{
    protected static string $resource = ActivityUserResource::class;

    protected function getHeaderWidgets(): array
    {
        return [
            ActivityAlertNotification::class,
            UserActivityChart::class,
            RecentActivityTable::class,
            InactiveUsersToday::class, // ← Tambahan baru

        ];
    }
}
