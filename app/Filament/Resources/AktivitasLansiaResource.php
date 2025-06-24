<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AktivitasLansiaResource\Pages;
use App\Models\AktivitasLansia;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;

class AktivitasLansiaResource extends Resource
{
    protected static ?string $model = AktivitasLansia::class;

    protected static ?string $navigationIcon = 'heroicon-o-heart';
    protected static ?string $navigationGroup = 'Program Aktivitas';
    protected static ?string $label = 'Aktivitas Lansia';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('hari')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('aktivitas_pagi')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('deskripsi_1')
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('video')
                    ->maxLength(255)
                    ->label('Path Video Pagi'),
                Forms\Components\Section::make(),
                Forms\Components\TextInput::make('aktivitas_sore')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('deskripsi_2')
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('video2')
                    ->maxLength(255)
                    ->label('Path Video Sore'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('hari')
                    ->sortable(),
                TextColumn::make('aktivitas_pagi')
                    ->searchable()
                    ->limit(30),
                TextColumn::make('aktivitas_sore')
                    ->searchable()
                    ->limit(30),

                // ==========================================================
                // KOLOM-KOLOM BARU YANG DITAMBAHKAN
                // ==========================================================
                TextColumn::make('deskripsi_1')
                    ->limit(40)
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('deskripsi_2')
                    ->limit(40)
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('video')
                    ->label('Video Pagi')
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('video2')
                    ->label('Video Sore')
                    ->toggleable(isToggledHiddenByDefault: true),
                // ==========================================================
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('hari', 'asc');
    }
    
    public static function getRelations(): array
    {
        return [
            //
        ];
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
