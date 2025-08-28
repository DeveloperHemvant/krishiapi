<?php

namespace App\Filament\Resources\CropCategories\Pages;

use App\Filament\Resources\CropCategories\CropCategoryResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListCropCategories extends ListRecords
{
    protected static string $resource = CropCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
