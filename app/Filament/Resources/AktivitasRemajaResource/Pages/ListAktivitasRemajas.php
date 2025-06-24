<?php

namespace App\Filament\Resources\AktivitasRemajaResource\Pages;

use App\Filament\Resources\AktivitasRemajaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAktivitasRemajas extends ListRecords
{
    protected static string $resource = AktivitasRemajaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
