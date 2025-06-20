<?php

namespace App\Filament\Resources\AktivitasRemajaResource\Pages;

use App\Filament\Resources\AktivitasRemajaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAktivitasRemaja extends EditRecord
{
    protected static string $resource = AktivitasRemajaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
