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
                TextEntry::make('french_name')
                    ->label('Nom français'),
                TextEntry::make('latin_name')
                    ->label('Nom latin'),
                TextEntry::make('english.name')
                    ->label('Nom anglais'),
                TextEntry::make('family.name')
                    ->label('Famille'),
                TextEntry::make('genus.name')
                    ->label('Genre'),
                TextEntry::make('type.name')
                    ->label('Type'),
                TextEntry::make('conservation_status')
                    ->label('Statut et préservation'),
                TextEntry::make('usages')
                    ->label('Usages et anecdotes'),
                TextEntry::make('ecological_role')
                    ->label('Rôle écologique'),
                TextEntry::make('habitat')
                    ->label('Habitat dans la réserve'),
                TextEntry::make('flowering_period')
                    ->label('Période de floraison'),
                TextEntry::make('fruiting_period')
                    ->label('Fructification'),
                TextEntry::make('etymology')
                    ->label('Étymologie'),
                TextEntry::make('created_at')
                    ->dateTime(),
                TextEntry::make('updated_at')
                    ->dateTime(),
            ]);
    }
}
