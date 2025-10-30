<?php

declare(strict_types=1);

namespace App\Filament\Resources\Plants\Schemas;

use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;
use LaraZeus\Popover\Infolists\PopoverEntry;
use LaraZeus\Qr\Facades\Qr;

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
                    ->label('Statut et préservation')
                    ->html(),
                TextEntry::make('usages')
                    ->label('Usages et anecdotes')
                    ->html(),
                TextEntry::make('ecological_role')
                    ->label('Rôle écologique')
                    ->html(),
                TextEntry::make('habitat')
                    ->label('Habitat dans la réserve')
                    ->html(),
                TextEntry::make('flowering_period')
                    ->label('Période de floraison')
                    ->html(),
                TextEntry::make('fruiting_period')
                    ->label('Fructification')
                    ->html(),
                TextEntry::make('etymology')
                    ->label('Étymologie')
                    ->html(),
                TextEntry::make('created_at')
                    ->dateTime(),
                TextEntry::make('updated_at')
                    ->dateTime(),
                PopoverEntry::make('qrCode2')
                    ->label('QrCode')
                    ->trigger('click')
                    ->placement('right')
                    ->offset(10)
                    ->popOverMaxWidth('none')
                    ->icon('heroicon-o-qr-code')
                    ->content(fn ($record) => Qr::render(data: $record->qrCodeUrl())),
                TextEntry::make('qrCode')
                    ->label('QR Code')
                    ->getStateUsing(fn ($record) => Qr::render(
                        data: $record->qrCodeUrl(),
                        options: $record->qr_options ?? []
                    ))
                    ->html(),
            ]);
    }
}
