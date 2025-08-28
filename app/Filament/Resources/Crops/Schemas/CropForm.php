<?php

namespace App\Filament\Resources\Crops\Schemas;

use Filament\Forms;
use Filament\Schemas\Schema;
use App\Models\CropCategory;
use App\Models\SoilType;
use App\Models\State;

class CropForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([
            Forms\Components\Select::make('category_id')
                ->label('Category')
                ->relationship('category', 'name->en')
                ->required(),

            Forms\Components\TextInput::make('name.en')
                ->label('Name (English)')
                ->required(),

            Forms\Components\TextInput::make('name.hi')
                ->label('Name (Hindi)'),

            Forms\Components\Textarea::make('description.en')
                ->label('Description (EN)')
                ->rows(3),

            Forms\Components\Textarea::make('description.hi')
                ->label('Description (HI)')
                ->rows(3),

            Forms\Components\TextInput::make('seeding_time.en')
                ->label('Seeding Time (EN)'),

            Forms\Components\TextInput::make('seeding_time.hi')
                ->label('Seeding Time (HI)'),

            Forms\Components\TextInput::make('harvest_time.en')
                ->label('Harvest Time (EN)'),

            Forms\Components\TextInput::make('harvest_time.hi')
                ->label('Harvest Time (HI)'),

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
        ]);
    }
}
