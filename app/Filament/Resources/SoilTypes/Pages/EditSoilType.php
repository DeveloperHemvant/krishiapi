<?php

namespace App\Filament\Resources\SoilTypes\Pages;

use App\Filament\Resources\SoilTypes\SoilTypeResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditSoilType extends EditRecord
{
    protected static string $resource = SoilTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
