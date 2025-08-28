<?php

namespace App\Filament\Resources\CropCategories\Schemas;

use Filament\Schemas\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class CropCategoryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                // English Section
                Section::make('English')
                    ->schema([
                        TextInput::make('name.en')
                            ->label('Name (English)')
                            ->required()
                            ->maxLength(255)
                            ->columnSpanFull(),

                        Textarea::make('description.en')
                            ->label('Description (English)')
                            ->maxLength(500)
                            ->columnSpanFull(),
                    ])
                    ->columns(1)
                    ->collapsible(),

                // Hindi Section
                Section::make('Hindi')
                    ->schema([
                        TextInput::make('name.hi')
                            ->label('Name (Hindi)')
                            ->maxLength(255)
                            ->columnSpanFull(),

                        Textarea::make('description.hi')
                            ->label('Description (Hindi)')
                            ->maxLength(500)
                            ->columnSpanFull(),
                    ])
                    ->columns(1)
                    ->collapsible(),
            ]);
    }
}
