<?php

namespace App\Filament\Resources\Orders\Tables;

use Filament\Actions\Action;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class OrdersTable
{
    public static function configure(Table $table): Table
    {
        return $table->columns([
            TextColumn::make('customer_name')->label('Pelanggan')->searchable(),
            TextColumn::make('whatsapp')->label('WhatsApp'),
            TextColumn::make('product.name')->label('Produk'),
            TextColumn::make('service.name')->label('Layanan'),
            TextColumn::make('subscription_package')->label('Paket'),
            TextColumn::make('subscription_duration')->label('Durasi'),
            TextColumn::make('address')->label('Alamat')->limit(35),
            TextColumn::make('notes')->label('Pesan')->limit(35),
            TextColumn::make('quantity')->label('Jumlah'),
            TextColumn::make('status')->label('Status Konfirmasi')->badge(),
            TextColumn::make('created_at')->label('Tanggal Permintaan')->dateTime()->sortable(),
            TextColumn::make('payment_proof')
                ->label('Bukti Pembayaran')
                ->state(function ($record): string {
                    $payment = $record->payments->first();
                    return $payment?->proof ? 'Lihat Bukti' : '-';
                })
                ->url(function ($record): ?string {
                    $payment = $record->payments->first();
                    return $payment?->proof ? asset('storage/'.$payment->proof) : null;
                }, shouldOpenInNewTab: true)
                ->color('primary')
                ->icon('heroicon-m-eye'),
        ])->modifyQueryUsing(fn ($query) => $query->with(['payments' => fn ($payments) => $payments->latest()]))->filters([])->recordActions([
            Action::make('konfirmasi')
                ->label('Konfirmasi')
                ->color('success')
                ->requiresConfirmation()
                ->action(fn ($record) => $record->update(['status' => 'Konfirmasi Berhasil'])),
            Action::make('tidak_dikonfirmasi')
                ->label('Tidak Dikonfirmasi')
                ->color('danger')
                ->requiresConfirmation()
                ->action(fn ($record) => $record->update(['status' => 'Tidak Dikonfirmasi'])),
            Action::make('whatsapp')
                ->label('WhatsApp')
                ->icon('heroicon-m-chat-bubble-left-right')
                ->url(fn ($record): string => wa_link($record->whatsapp, 'Halo ' . $record->customer_name . ', kami dari PT. Koneksi Net Nusantara ingin menindaklanjuti permintaan Anda.'), shouldOpenInNewTab: true),
            DeleteAction::make()->label('Hapus'),
        ])->toolbarActions([
            BulkActionGroup::make([DeleteBulkAction::make()]),
        ]);
    }
}
