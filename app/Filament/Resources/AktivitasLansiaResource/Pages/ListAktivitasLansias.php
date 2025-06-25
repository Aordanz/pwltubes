<?php

namespace App\Filament\Resources\AktivitasLansiaResource\Pages;

use App\Filament\Resources\AktivitasLansiaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAktivitasLansias extends ListRecords
{
    protected static string $resource = AktivitasLansiaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
