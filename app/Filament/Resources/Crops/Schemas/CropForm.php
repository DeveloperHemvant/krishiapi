<?php

namespace App\Filament\Resources\Crops\Schemas;

use Filament\Forms;
use Filament\Schemas\Components\Section;

use Filament\Schemas\Schema;

class CropForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([
            // General Section
            Section::make('General')
                ->schema([
                    Forms\Components\Select::make('category_id')
                        ->label('Category')
                        ->relationship('category', 'name->en')
                        ->required(),

                    Forms\Components\FileUpload::make('primary_image')
                        ->label('Primary Image')
                        ->image()
                        ->directory('crops')
                        ->visibility('public'),

                    Forms\Components\TextInput::make('total_days')
                        ->label('Total Days')
                        ->numeric(),

                    Forms\Components\Toggle::make('active')
                        ->label('Active')
                        ->default(true),

                    Forms\Components\Select::make('soilTypes')
                        ->label('Soil Types')
                        ->multiple()
                        ->relationship('soilTypes', 'name->en'),

                    Forms\Components\Select::make('states')
                        ->label('Suitable States')
                        ->multiple()
                        ->relationship('states', 'name'),
                ])
                ->columns(1)
                ->collapsible(),

            // English Section
            Section::make('English')
                ->schema([
                    Forms\Components\TextInput::make('name.en')
                        ->label('Name (English)')
                        ->required(),

                    Forms\Components\Textarea::make('description.en')
                        ->label('Description (English)')
                        ->rows(3),

                    Forms\Components\TextInput::make('seeding_time.en')
                        ->label('Seeding Time (English)'),

                    Forms\Components\TextInput::make('harvest_time.en')
                        ->label('Harvest Time (English)'),
                ])
                ->columns(1)
                ->collapsible()
                ->collapsed(false), // open by default

            // Hindi Section
            Section::make('Hindi')
                ->schema([
                    Forms\Components\TextInput::make('name.hi')
                        ->label('Name (Hindi)'),

                    Forms\Components\Textarea::make('description.hi')
                        ->label('Description (Hindi)')
                        ->rows(3),

                    Forms\Components\TextInput::make('seeding_time.hi')
                        ->label('Seeding Time (Hindi)'),

                    Forms\Components\TextInput::make('harvest_time.hi')
                        ->label('Harvest Time (Hindi)'),
                ])
                ->columns(1)
                ->collapsible()
                ->collapsed(true), // collapsed by default
        ]);
    }
}
