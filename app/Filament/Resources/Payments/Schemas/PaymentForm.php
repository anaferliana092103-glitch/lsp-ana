<?php

namespace App\Filament\Resources\Payments\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class PaymentForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('user_id')
                    ->relationship('user', 'name')
                    ->required(),
                Select::make('order_id')
                    ->relationship('order', 'id')
                    ->required(),
                TextInput::make('method')
                    ->required(),
                TextInput::make('amount')
                    ->required()
                    ->numeric(),
                FileUpload::make('proof')->label('Bukti Transfer')->image()->disk('public')->directory('payments')->visibility('public'),
                DateTimePicker::make('paid_at'),
                TextInput::make('status')
                    ->required()
                    ->default('Menunggu Verifikasi'),
                Textarea::make('admin_note')
                    ->columnSpanFull(),
            ]);
    }
}
