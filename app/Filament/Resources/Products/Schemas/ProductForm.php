<?php

namespace App\Filament\Resources\Products\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class ProductForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('product_category_id')
                    ->relationship('productCategory', 'name')
                    ->label('Kategori Produk'),
                TextInput::make('name')
                    ->label('Nama Produk')
                    ->required(),
                TextInput::make('slug')
                    ->label('Slug')
                    ->required(),
                TextInput::make('brand')->label('Merek'),
                TextInput::make('category')
                    ->label('Kategori')
                    ->required()
                    ->default('CCTV Indoor'),
                FileUpload::make('image')
                    ->label('Gambar')
                    ->disk('public')
                    ->directory('products')
                    ->visibility('public')
                    ->image(),
                Textarea::make('description')
                    ->label('Deskripsi')
                    ->columnSpanFull(),
                Textarea::make('specifications')
                    ->label('Spesifikasi')
                    ->columnSpanFull(),
                TextInput::make('price')->label('Harga'),
                Toggle::make('is_active')
                    ->label('Aktif')
                    ->required(),
                Toggle::make('is_featured')
                    ->label('Unggulan')
                    ->required(),
                TextInput::make('ordering')
                    ->label('Urutan')
                    ->required()
                    ->numeric()
                    ->default(0),
            ]);
    }
}
