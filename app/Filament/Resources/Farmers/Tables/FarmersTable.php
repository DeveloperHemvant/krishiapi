<?php

namespace App\Filament\Resources\Farmers\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables;
use Filament\Tables\Table;
use App\Models\SoilType;
use App\Models\Livestock;

class FarmersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Name')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('phone')
                    ->label('Phone')
                    ->searchable(),

                Tables\Columns\TextColumn::make('email')
                    ->label('Email')
                    ->searchable(),

                Tables\Columns\TextColumn::make('gender')
                    ->label('Gender')
                    ->sortable(),

                Tables\Columns\TextColumn::make('age')
                    ->label('Age')
                    ->sortable(),

                Tables\Columns\TextColumn::make('state.name')
                    ->label('State')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('village')
                    ->label('Village')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('land_size')
                    ->label('Land Size'),

                Tables\Columns\TextColumn::make('land_type')
                    ->label('Land Type'),

                Tables\Columns\TextColumn::make('soil_types')
                    ->label('Soil Types')
                    ->formatStateUsing(function ($state) {
                        return is_array($state) ? implode(', ', $state) : $state;
                    }),

                Tables\Columns\TextColumn::make('livestock')
                    ->label('Livestock')
                    ->formatStateUsing(function ($state) {
                        return is_array($state) ? implode(', ', $state) : $state;
                    }),


                Tables\Columns\BooleanColumn::make('consent')
                    ->label('Consent'),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Created At')
                    ->dateTime()
                    ->sortable(),
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
