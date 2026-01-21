<?php

namespace App\Filament\Resources\ProductTransactions\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\ImageColumn;

class ProductTransactionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                TextInput::make('phone')
                    ->type('number')
                    ->required(),
                TextInput::make('email')
                    ->label('Email address')
                    ->email()
                    ->required(),
                TextInput::make('city')
                    ->required(),
                TextInput::make('post_code')
                    ->type('number')
                    ->required(),
                FileUpload::make('proof')
                    ->directory('product-transactions')
                    ->maxSize(1024)
                    ->image()
                    ->required()
                    ->nullable(),
                TextInput::make('produk_size')
                    ->required()
                    ->numeric(),
                Textarea::make('address')
                    ->required()
                    ->columnSpanFull(),
                TextInput::make('quantity')
                    ->required()
                    ->numeric(),
                Toggle::make('is_paid')
                    ->required(),
                Select::make('id_produk')
                    ->relationship('produk','name')
                    ->label('Product')
                    ->required(),
                Select::make('promo_code_id')
                    ->relationship('promoCode', 'code')  // Tampilkan kolom 'code' dari PromoCode
                    ->label('Promo Code')
                    ->nullable(),
            ]);
    }
}
