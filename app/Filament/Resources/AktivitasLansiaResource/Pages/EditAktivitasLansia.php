<?php

namespace App\Filament\Resources\AktivitasLansiaResource\Pages;

use App\Filament\Resources\AktivitasLansiaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAktivitasLansia extends EditRecord
{
    protected static string $resource = AktivitasLansiaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
