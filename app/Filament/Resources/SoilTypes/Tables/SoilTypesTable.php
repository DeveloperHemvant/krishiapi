<?php

namespace App\Filament\Resources\SoilTypes\Tables;

use Filament\Tables;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Table;

class SoilTypesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                  Tables\Columns\TextColumn::make('name')
                    ->label('Name (EN)')
                    ->getStateUsing(fn ($record) => $record->getTranslation('name', 'en'))
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('name')
                    ->label('Name (HI)')
                    ->getStateUsing(fn ($record) => $record->getTranslation('name', 'hi'))
                    ->searchable(),

                Tables\Columns\TextColumn::make('description')
                    ->label('Description (EN)')
                    ->getStateUsing(fn ($record) => $record->getTranslation('description', 'en'))
                    ->limit(50),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
