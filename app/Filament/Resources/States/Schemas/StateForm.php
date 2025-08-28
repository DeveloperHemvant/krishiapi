<?php

namespace App\Filament\Resources\States\Schemas;

use Filament\Schemas\Schema;
// use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;


class StateForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([
            Section::make('English')
                ->schema([
                    TextInput::make('name.en')
                        ->label('State Name (English)')
                        ->required(),
                ])
                ->columns(2),

            Section::make('Hindi')
                ->schema([
                    TextInput::make('name.hi')
                        ->label('State Name (Hindi)'),
                ])
                ->columns(2),

            // Section::make('French')
            //     ->schema([
            //         TextInput::make('name.fr')
            //             ->label('State Name (French)'),
            //     ])
            //     ->columns(2),

            Section::make('General Info')
                ->schema([
                    TextInput::make('iso_code')
                        ->label('ISO Code')
                        ->maxLength(10)
                        ->required(),
                ])
                ->columns(2),
        ]);
    }
}
