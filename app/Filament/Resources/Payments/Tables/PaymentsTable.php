<?php

namespace App\Filament\Resources\Payments\Tables;

use Filament\Actions\Action;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class PaymentsTable
{
    public static function configure(Table $table): Table
    {
        return $table->columns([
            TextColumn::make('user.name')->label('Pengguna')->searchable(),
            TextColumn::make('order.product.name')->label('Produk'),
            TextColumn::make('order.service.name')->label('Layanan'),
            TextColumn::make('method')->label('Metode'),
            TextColumn::make('amount')->label('Nominal')->money('IDR'),
            ImageColumn::make('proof')->label('Bukti Transfer')->disk('public')->url(fn ($record) => $record->proof ? asset('storage/'.$record->proof) : null)->openUrlInNewTab(),
            TextColumn::make('paid_at')->label('Waktu Bayar')->dateTime(),
            TextColumn::make('status')->label('Status')->badge(),
        ])->recordActions([
            Action::make('lihat_bukti')->label('Lihat Bukti Transfer')->icon('heroicon-m-eye')->url(fn ($record) => $record->proof ? asset('storage/'.$record->proof) : null, shouldOpenInNewTab: true)->visible(fn ($record) => filled($record->proof)),
            Action::make('setuju')->label('Setujui')->color('success')->requiresConfirmation()->action(fn ($record) => $record->update(['status' => 'Pembayaran Berhasil'])),
            Action::make('tolak')->label('Tolak')->color('danger')->form([\Filament\Forms\Components\Textarea::make('admin_note')->label('Alasan Penolakan')->required()])->action(fn ($record, $data) => $record->update(['status' => 'Pembayaran Ditolak', 'admin_note' => $data['admin_note']])),
            EditAction::make()->label('Ubah'),
        ])->toolbarActions([BulkActionGroup::make([DeleteBulkAction::make()])]);
    }
}
