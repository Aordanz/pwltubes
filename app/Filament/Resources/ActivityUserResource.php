<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ActivityUserResource\Pages;
use App\Models\ActivityUser;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn; // <-- Import ini untuk lebih rapi

class ActivityUserResource extends Resource
{
    protected static ?string $model = ActivityUser::class;

    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-check';
    protected static ?string $label = 'Log Aktivitas';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // Form sengaja dikosongkan karena data ini tidak untuk diedit
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('user.name') 
                    ->label('Nama Pengguna')
                    ->searchable(),
                TextColumn::make('kategori')
                    ->badge(),
                TextColumn::make('hari')
                    ->numeric(), // Membuat kolom ini diurutkan sebagai angka
                TextColumn::make('created_at')
                    ->dateTime()
                    ->label('Waktu Selesai')
                    ->sortable(), // Membuat kolom ini bisa di-klik untuk diurutkan
            ])
            ->filters([
                //
            ])
            ->actions([
                // Aksi Edit dinonaktifkan
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            // ==========================================================
            // TAMBAHKAN BARIS INI UNTUK MENGURUTKAN SECARA DEFAULT
            // ==========================================================
            ->defaultSort('created_at', 'desc');
    }

    public static function canCreate(): bool
    {
        return false;
    }

    public static function canEdit($record): bool
    {
        return false;
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
            'index' => Pages\ListActivityUsers::route('/'),
        ];
    }    
}
