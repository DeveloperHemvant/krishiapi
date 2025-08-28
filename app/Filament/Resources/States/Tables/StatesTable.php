<?php

namespace App\Filament\Resources\States\Tables;

use Filament\Tables;
use Filament\Tables\Table;
use Filament\Actions\EditAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use App\Models\State;

class StatesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                // Show English Name (default language)
                Tables\Columns\TextColumn::make('name')
                    ->label('State Name')
                    ->formatStateUsing(fn ($record) => $record->getTranslation('name', 'en'))
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('iso_code')
                    ->label('ISO Code')
                    ->searchable()
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('iso_code')
                    ->label('Filter by ISO Code')
                    ->options(
                        State::query()->pluck('iso_code', 'iso_code')->toArray()
                    ),
            ])
            ->searchPlaceholder('Search by State Name or ISO Code')
            ->defaultSort('name')
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
