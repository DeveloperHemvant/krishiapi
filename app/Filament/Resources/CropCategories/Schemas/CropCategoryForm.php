<?php

namespace App\Filament\Resources\CropCategories\Schemas;

use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;

class CropCategoryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('English')
                    ->schema([
                        TextInput::make('name.en')
                            ->label('Name (English)')
                            ->required(),
                        Textarea::make('description.en')
                            ->label('Description (English)')
                            ->rows(3),
                    ])
                    ->columns(2),

                Section::make('Hindi')
                    ->schema([
                        TextInput::make('name.hi')
                            ->label('Name (Hindi)'),
                        Textarea::make('description.hi')
                            ->label('Description (Hindi)')
                            ->rows(3),
                    ])
                    ->columns(2),

                // Section::make('French')
                //     ->schema([
                //         TextInput::make('name.fr')
                //             ->label('Name (French)'),
                //         Textarea::make('description.fr')
                //             ->label('Description (French)')
                //             ->rows(3),
                //     ])
                //     ->columns(2),
            ]);
    }
}
