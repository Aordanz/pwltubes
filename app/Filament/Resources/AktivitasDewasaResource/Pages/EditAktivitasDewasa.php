<?php

namespace App\Filament\Resources\AktivitasDewasaResource\Pages;

use App\Filament\Resources\AktivitasDewasaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAktivitasDewasa extends EditRecord
{
    protected static string $resource = AktivitasDewasaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
