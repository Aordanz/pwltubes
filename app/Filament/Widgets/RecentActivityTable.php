<?php

namespace App\Filament\Widgets;

use App\Models\ActivityUser;
use Filament\Widgets\TableWidget as BaseWidget;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Carbon;

class RecentActivityTable extends BaseWidget
{
    protected static ?string $heading = 'Aktivitas Hari Ini';
    protected int | string | array $columnSpan = 'full';

    /**
     * Query hanya data hari ini
     */
    protected function getTableQuery(): Builder
    {
        return ActivityUser::query()
            ->with('user')
            ->whereDate('created_at', Carbon::today())
            ->latest()
            ->limit(10);
    }

    /**
     * Kolom-kolom yang ditampilkan di tabel
     */
    protected function getTableColumns(): array
    {
        return [
            TextColumn::make('user.name')
                ->label('Nama Pengguna')
                ->searchable(),

            TextColumn::make('kategori')
                ->label('Kategori')
                ->badge(),

            TextColumn::make('hari')
                ->label('Hari ke-'),

            TextColumn::make('created_at')
                ->label('Waktu Aktivitas')
                ->dateTime('H:i'),
        ];
    }
}
