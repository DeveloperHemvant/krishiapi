<?php

namespace App\Filament\Resources\Crops\Tables;

use Filament\Tables;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Table;

class CropsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name.en')
                    ->label('Name (EN)')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('category.name.en')
                    ->label('Category')
                    ->sortable(),

                Tables\Columns\ImageColumn::make('primary_image')
                    ->label('Image')
                    ->square(),

                Tables\Columns\TextColumn::make('total_days')
                    ->label('Days'),

                Tables\Columns\IconColumn::make('active')
                    ->label('Active')
                    ->boolean(),
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
