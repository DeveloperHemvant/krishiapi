<?php

namespace App\Filament\Resources\SoilTypes\Schemas;

use Filament\Forms;
use Filament\Schemas\Components\Section;

use Filament\Schemas\Schema;

class SoilTypeForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([
            // English Section
            Section::make('English')
                ->schema([
                    Forms\Components\TextInput::make('name.en')
                        ->label('Name (English)')
                        ->required()
                        ->maxLength(255),

                    Forms\Components\Textarea::make('description.en')
                        ->label('Description (English)')
                        ->rows(3),
                ])
                ->columns(1)
                ->collapsible()
                ->collapsed(false), // open by default

            // Hindi Section
            Section::make('Hindi')
                ->schema([
                    Forms\Components\TextInput::make('name.hi')
                        ->label('Name (Hindi)')
                        ->maxLength(255),

                    Forms\Components\Textarea::make('description.hi')
                        ->label('Description (Hindi)')
                        ->rows(3),
                ])
                ->columns(1)
                ->collapsible()
                ->collapsed(true), // collapsed by default
        ]);
    }
}
