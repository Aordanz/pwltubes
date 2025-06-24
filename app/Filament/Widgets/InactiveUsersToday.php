<?php

namespace App\Filament\Widgets;

use App\Models\User;
use App\Models\ActivityUser;
use Filament\Widgets\TableWidget as BaseWidget;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Support\Carbon;

class InactiveUsersToday extends BaseWidget
{
    protected int|string|array $columnSpan = 'full';

    protected function getTableQuery(): Builder
    {
        return User::where('role', 'user')
            ->whereNotIn('id', function ($query) {
                $query->select('user_id')
                      ->from('activity_users')
                      ->whereDate('created_at', Carbon::today());
            });
    }

    protected function getTableColumns(): array
    {
        return [
            TextColumn::make('name')->label('Nama Pengguna'),
            TextColumn::make('email')->label('Email'),
            TextColumn::make('age_category')->label('Kategori Umur')->badge(),
        ];
    }

    public function getHeading(): string
    {
        return 'Pengguna yang Belum Mengisi Aktivitas Hari Ini';
    }
}
