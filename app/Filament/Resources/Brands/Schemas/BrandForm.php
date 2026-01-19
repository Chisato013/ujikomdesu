<?php

namespace App\Filament\Resources\Brands\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Schemas\Schema;

class BrandForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required()
                    ->maxLength(length:255),
                FileUpload::make('logo')
                    ->image()
                    ->directory('brands')
                    ->maxSize(1024)
                    -> required()
                    ->nullable(),
            ]);
    }
}
