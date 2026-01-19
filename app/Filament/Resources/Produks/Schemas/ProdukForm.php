<?php

namespace App\Filament\Resources\Produks\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Schemas\Components\Section;

class ProdukForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                    TextInput::make('name')
                        ->required(),
                     TextInput::make('price')
                        ->required()
                        ->numeric()
                        ->currencyMask()
                        ->prefix('$'),
                    FileUpload::make('thumb')
                        ->label("thumbnail")
                        ->required(),
                    Repeater::make("photoss")
                        ->relationship("photos")
                        ->schema([
                            FileUpload::make("photo")
                            ->image()
                            ->nullable()
                            ->directory("foto_produk_detail"),
                        ])->addActionLabel("add fotos"),
                    Repeater::make('sizes')
                        ->relationship('sizes')
                        ->schema([
                            TextInput::make('size')
                            ->required()
                        ]),
                    Textarea::make('about')
                        ->required(),
                    TextInput::make('stock')
                        ->required()
                        ->numeric(),
                    Select::make('category_id')
                        ->relationship('category', 'name')
                        ->required(),
                    Select::make('brand_id')
                        ->relationship('brand', 'name')
                        ->required(),

                ]);
    }
}
