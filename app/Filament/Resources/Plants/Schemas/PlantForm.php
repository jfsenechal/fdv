<?php

namespace App\Filament\Resources\Plants\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class PlantForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('common_name')
                    ->default(null),
                TextInput::make('scientific_name')
                    ->required(),
                Textarea::make('description')
                    ->default(null)
                    ->columnSpanFull(),
                Textarea::make('anecdote')
                    ->default(null)
                    ->columnSpanFull(),
                Select::make('division_id')
                    ->relationship('division', 'id')
                    ->default(null),
                Select::make('family_id')
                    ->relationship('family', 'name')
                    ->default(null),

                Select::make('kingdom_id')
                    ->relationship('kingdom', 'id')
                    ->default(null),
                Select::make('species_id')
                    ->relationship('species', 'name')
                    ->default(null),
                Select::make('subkingdom_id')
                    ->relationship('subkingdom', 'id')
                    ->default(null),
                Select::make('taxonomic_class_id')
                    ->relationship('taxonomicClass', 'id')
                    ->default(null),
                Select::make('taxonomic_order_id')
                    ->relationship('taxonomicOrder', 'id')
                    ->default(null),
            ]);
    }
}
