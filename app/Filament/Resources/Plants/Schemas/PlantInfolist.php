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
                TextEntry::make('common_name')->label('Nom commun'),
                TextEntry::make('scientific_name')->label('Nom scientifique'),
                TextEntry::make('division.name')->label('Divison'),
                TextEntry::make('family.name')
                    ->label('Famille'),
                TextEntry::make('genus.name')
                    ->label('Genre'),
                TextEntry::make('kingdom.name')
                    ->label('Règne'),
                TextEntry::make('species.name')
                    ->label('Spécimen'),
                TextEntry::make('subkingdom.name')
                    ->label('Sous règne'),
                TextEntry::make('taxonomicClass.name')
                    ->label('Classe'),
                TextEntry::make('taxonomicOrder.name')
                    ->label('Ordre'),
                TextEntry::make('created_at')
                    ->dateTime(),
                TextEntry::make('updated_at')
                    ->dateTime(),
            ]);
    }
}
