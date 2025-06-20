<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AktivitasLansiaResource\Pages;
use App\Models\AktivitasLansia;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\FileUpload;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Resources\Resource;

class AktivitasLansiaResource extends Resource
{
    protected static ?string $model = AktivitasLansia::class;

    protected static ?string $navigationIcon = 'heroicon-o-user';
    protected static ?string $navigationGroup = 'Data Aktivitas';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('hari')
                    ->numeric()
                    ->required(),

                TextInput::make('aktivitas_pagi')->label('Aktivitas Pagi'),
                Textarea::make('deskripsi_1')->label('Deskripsi Pagi'),

                TextInput::make('aktivitas_sore')->label('Aktivitas Sore'),
                Textarea::make('deskripsi_2')->label('Deskripsi Sore'),

                FileUpload::make('video')
                    ->label('Video Pagi')
                    ->directory('videos')
                    ->visibility('public')
                    ->acceptedFileTypes(['video/mp4', 'video/mkv']),

                FileUpload::make('video2')
                    ->label('Video Sore')
                    ->directory('videos')
                    ->visibility('public')
                    ->acceptedFileTypes(['video/mp4', 'video/mkv']),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('hari')->sortable(),
                TextColumn::make('aktivitas_pagi')->limit(25),
                TextColumn::make('aktivitas_sore')->limit(25),
                TextColumn::make('created_at')->label('Dibuat')->dateTime('d M Y, H:i'),
            ])
            ->filters([])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAktivitasLansias::route('/'),
            'create' => Pages\CreateAktivitasLansia::route('/create'),
            'edit' => Pages\EditAktivitasLansia::route('/{record}/edit'),
        ];
    }
}
