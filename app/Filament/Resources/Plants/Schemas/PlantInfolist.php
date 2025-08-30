<?php


namespace App\Filament\Resources\Plants\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

final class PlantInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('french_name')->label('Nom français'),
                TextEntry::make('latin_name')->label('Nom latin'),
                TextEntry::make('english.name')->label('Nom anglais'),
                TextEntry::make('family.name')
                    ->label('Famille'),
                TextEntry::make('genus.name')
                    ->label('Genre'),
                TextEntry::make('type.name')
                    ->label('Type'),
                TextEntry::make('created_at')
                    ->dateTime(),
                TextEntry::make('updated_at')
                    ->dateTime(),
            ]);
    }
}
