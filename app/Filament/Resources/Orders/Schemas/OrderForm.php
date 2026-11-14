<?php

namespace App\Filament\Resources\Orders\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class OrderForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([
            TextInput::make('customer_name')->label('Nama Pelanggan')->required(),
            TextInput::make('whatsapp')->label('Nomor WhatsApp')->required(),
            Textarea::make('address')->label('Alamat Pemasangan')->required()->columnSpanFull(),
            Select::make('product_id')->label('Produk')->relationship('product', 'name')->nullable(),
            Select::make('service_id')->label('Layanan')->relationship('service', 'name')->nullable(),
            TextInput::make('quantity')->label('Jumlah Kamera/Perangkat')->numeric()->required()->minValue(1),
            TextInput::make('subscription_package')->label('Paket Langganan'),
            TextInput::make('subscription_duration')->label('Durasi Langganan'),
            Select::make('status')->options(array_combine(
                ['Menunggu Konfirmasi', 'Konfirmasi Berhasil', 'Tidak Dikonfirmasi'],
                ['Menunggu Konfirmasi', 'Konfirmasi Berhasil', 'Tidak Dikonfirmasi'],
            ))->label('Status Pesanan')->required(),
            Textarea::make('notes')->label('Catatan')->columnSpanFull(),
        ]);
    }
}
