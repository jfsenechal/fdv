<?php

namespace App\Filament\Resources\Plants\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class PlantInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('common_name'),
                TextEntry::make('scientific_name'),
                TextEntry::make('division.id')
                    ->numeric(),
                TextEntry::make('family.name')
                    ->numeric(),
                TextEntry::make('genus.id')
                    ->numeric(),
                TextEntry::make('kingdom.id')
                    ->numeric(),
                TextEntry::make('species.name')
                    ->numeric(),
                TextEntry::make('subkingdom.id')
                    ->numeric(),
                TextEntry::make('taxonomicClass.id')
                    ->numeric(),
                TextEntry::make('taxonomicOrder.id')
                    ->numeric(),
                TextEntry::make('created_at')
                    ->dateTime(),
                TextEntry::make('updated_at')
                    ->dateTime(),
            ]);
    }
}
