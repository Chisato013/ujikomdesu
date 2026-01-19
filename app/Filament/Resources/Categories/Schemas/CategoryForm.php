<?php

namespace App\Filament\Resources\Categories\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Schemas\Schema;
class CategoryForm
{
    public static function configure(Schema  $schema)
    {
        return $schema
            ->components([
                TextInput::make(name:'name')
                ->required()
                ->maxLength(length:255),
                FileUpload::make(name:'icon')
                ->image()
                ->directory(directory:'categories')
                ->maxSize(size:1024)
                ->required()
                ->nullable(),
            ]);
    }
}
