<?php

namespace App\Filament\Resources\Services\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class ServiceForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label('Nama Layanan')
                    ->required(),
                TextInput::make('slug')
                    ->label('Slug')
                    ->required(),
                FileUpload::make('image')
                    ->label('Foto Layanan')
                    ->disk('public')
                    ->directory('services')
                    ->visibility('public')
                    ->image(),
                TextInput::make('short_description')
                    ->label('Deskripsi Singkat'),
                Textarea::make('description')
                    ->label('Deskripsi')
                    ->columnSpanFull(),
                Textarea::make('features')
                    ->label('Fitur Layanan')
                    ->columnSpanFull(),
                Toggle::make('is_featured')
                    ->label('Unggulan')
                    ->required(),
                Toggle::make('is_active')
                    ->label('Aktif')
                    ->required(),
                TextInput::make('ordering')
                    ->label('Urutan')
                    ->required()
                    ->numeric()
                    ->default(0),
            ]);
    }
}
