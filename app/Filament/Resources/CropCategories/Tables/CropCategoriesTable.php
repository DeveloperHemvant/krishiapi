<?php

namespace App\Filament\Resources\CropCategories\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class CropCategoriesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                // Name columns
                TextColumn::make('name')
                    ->label('Name (English)')
                    ->getStateUsing(fn($record) => $record->getTranslation('name', 'en'))
                    ->searchable()
                    ->sortable(),

                TextColumn::make('name')
                    ->label('Name (Hindi)')
                    ->getStateUsing(fn($record) => $record->getTranslation('name', 'hi'))
                    ->searchable()
                    ->sortable(),

                // Description columns
                TextColumn::make('description')
                    ->label('Description (English)')
                    ->getStateUsing(fn($record) => $record->getTranslation('description', 'en'))
                    ->limit(50)
                    ->toggleable(),

                TextColumn::make('description')
                    ->label('Description (Hindi)')
                    ->getStateUsing(fn($record) => $record->getTranslation('description', 'hi'))
                    ->limit(50)
                    ->toggleable(),

                // Timestamps
                TextColumn::make('created_at')
                    ->label('Created')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('updated_at')
                    ->label('Updated')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                // Add any filters if needed
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
