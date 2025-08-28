<?php

namespace App\Filament\Resources\SoilTypes;

use App\Filament\Resources\SoilTypes\Pages\CreateSoilType;
use App\Filament\Resources\SoilTypes\Pages\EditSoilType;
use App\Filament\Resources\SoilTypes\Pages\ListSoilTypes;
use App\Filament\Resources\SoilTypes\Schemas\SoilTypeForm;
use App\Filament\Resources\SoilTypes\Tables\SoilTypesTable;
use App\Models\SoilType;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class SoilTypeResource extends Resource
{
    protected static ?string $model = SoilType::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'SoilType';

    public static function form(Schema $schema): Schema
    {
        return SoilTypeForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return SoilTypesTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListSoilTypes::route('/'),
            'create' => CreateSoilType::route('/create'),
            'edit' => EditSoilType::route('/{record}/edit'),
        ];
    }
}
