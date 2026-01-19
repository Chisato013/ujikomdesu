<?php

namespace App\Filament\Resources\Produks\Schemas;

use App\Models\Produk;
use Filament\Forms\Components\Repeater;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\RepeatableEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Image;
use Filament\Schemas\Schema;

class ProdukInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('name'),
                ImageEntry::make('thumb')
                ->label("foto produk thumb"),
                TextEntry::make('about')
                    ->columnSpanFull(),
                ImageEntry::make("photos")
                ->label("fotoProduk")
                ->getStateUsing(fn($record) => $record->photos->pluck('photo')->toArray() )
                ->height(120)
                ->width(120),
                TextEntry::make('price')
                    ->money(),
                TextEntry::make('stock')
                    ->numeric(),
                TextEntry::make('category.name')
                    ->label('Category'),
                TextEntry::make('brand.name')
                    ->label('Brand'),
                TextEntry::make('deleted_at')
                    ->dateTime()
                    ->visible(fn (Produk $record): bool => $record->trashed()),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
                RepeatableEntry::make("sizes")
                ->schema([
                    TextEntry::make("size"),
                ])
            ]);
    }
}
