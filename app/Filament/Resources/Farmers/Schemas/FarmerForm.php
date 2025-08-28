<?php

namespace App\Filament\Resources\Farmers\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\CheckboxList;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use App\Models\State;
use App\Models\SoilType;

class FarmerForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label('Name')
                    ->required()
                    ->maxLength(255),

                Select::make('gender')
                    ->label('Gender')
                    ->options([
                        'male' => 'Male',
                        'female' => 'Female',
                        'other' => 'Other',
                    ])
                    ->required(),

                TextInput::make('age')
                    ->label('Age')
                    ->numeric()
                    ->minValue(18)
                    ->required(),

                TextInput::make('phone')
                    ->label('Phone')
                    ->required()
                    ->maxLength(15),

                TextInput::make('email')
                    ->label('Email')
                    ->email()
                    ->required()
                    ->maxLength(255),

                TextInput::make('password')
                    ->label('Password')
                    ->password()
                    ->dehydrated(fn ($state) => filled($state))
                    ->required(fn ($record) => !$record)
                    ->maxLength(255),

                TextInput::make('aadhaar_no')
                    ->label('Aadhaar Number')
                    ->maxLength(12),

                Select::make('preferred_language')
                    ->label('Preferred Language')
                    ->options([
                        'en' => 'English',
                        'hi' => 'Hindi',
                    ]),

                Select::make('state_id')
                    ->label('State')
                    ->relationship('state', 'name')
                    ->searchable(),

                // Uncomment if you add district relation
                // Select::make('district_id')
                //     ->label('District')
                //     ->relationship('district', 'name')
                //     ->searchable(),

                TextInput::make('village')
                    ->label('Village')
                    ->maxLength(255),

                TextInput::make('land_size')
                    ->label('Land Size')
                    ->maxLength(255),

                TextInput::make('land_type')
                    ->label('Land Type')
                    ->maxLength(255),

                CheckboxList::make('soil_types')
                    ->label('Soil Types')
                    ->options(fn () => SoilType::pluck('name','id')->toArray()),

                TextInput::make('water_source')
                    ->label('Water Source')
                    ->maxLength(255),

                

                TextInput::make('bank_name')
                    ->label('Bank Name')
                    ->maxLength(255),

                TextInput::make('account_number')
                    ->label('Account Number')
                    ->maxLength(30),

                TextInput::make('ifsc_code')
                    ->label('IFSC Code')
                    ->maxLength(20),

                Toggle::make('consent')
                    ->label('Consent')
                    ->required(),
            ]);
    }
}
