<?php

namespace App\Filament\Widgets;

use App\Models\ActivityUser;
use Filament\Widgets\Widget;
use Illuminate\Support\Carbon;

class ActivityAlertNotification extends Widget
{
    protected static string $view = 'filament.widgets.activity-alert-notification';

    protected int | string | array $columnSpan = 'full';

    // Tampilkan widget hanya jika belum ada aktivitas hari ini
    public function getShouldShow(): bool
    {
        return ActivityUser::whereDate('created_at', Carbon::today())->count() === 0;
    }
}
