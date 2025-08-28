<?php

namespace App\Filament\Resources\CropCategories;

use App\Filament\Resources\CropCategories\Pages\CreateCropCategory;
use App\Filament\Resources\CropCategories\Pages\EditCropCategory;
use App\Filament\Resources\CropCategories\Pages\ListCropCategories;
use App\Filament\Resources\CropCategories\Schemas\CropCategoryForm;
use App\Filament\Resources\CropCategories\Tables\CropCategoriesTable;
use App\Models\CropCategory;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class CropCategoryResource extends Resource
{
    protected static ?string $model = CropCategory::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'CropCategory';

    public static function form(Schema $schema): Schema
    {
        return CropCategoryForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return CropCategoriesTable::configure($table);
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
            'index' => ListCropCategories::route('/'),
            'create' => CreateCropCategory::route('/create'),
            'edit' => EditCropCategory::route('/{record}/edit'),
        ];
    }
}
