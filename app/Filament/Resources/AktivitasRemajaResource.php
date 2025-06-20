<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AktivitasRemajaResource\Pages;
use App\Models\AktivitasRemaja;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\FileUpload;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Resources\Resource;

class AktivitasRemajaResource extends Resource
{
    protected static ?string $model = AktivitasRemaja::class;

    protected static ?string $navigationIcon = 'heroicon-o-fire';
    protected static ?string $navigationGroup = 'Data Aktivitas';

    public static function form(Form $form): Form
    {
        return $form->schema([
            TextInput::make('hari')
                ->numeric()
                ->required(),

            TextInput::make('program_1')
                ->label('Program 1'),

            Textarea::make('deskripsi_1')
                ->label('Deskripsi Program 1'),

            TextInput::make('program_2')
                ->label('Program 2'),

            Textarea::make('deskripsi_2')
                ->label('Deskripsi Program 2'),

            FileUpload::make('video')
                ->label('Video')
                ->directory('videos') // simpan di storage/app/public/videos
                ->visibility('public')
                ->acceptedFileTypes(['video/mp4', 'video/mkv']),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('hari')->sortable(),
                TextColumn::make('program_1')->limit(20),
                TextColumn::make('program_2')->limit(20),
                TextColumn::make('created_at')->dateTime('d M Y, H:i')->label('Dibuat pada'),
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
            'index' => Pages\ListAktivitasRemajas::route('/'),
            'create' => Pages\CreateAktivitasRemaja::route('/create'),
            'edit' => Pages\EditAktivitasRemaja::route('/{record}/edit'),
        ];
    }
}
