<?php

declare(strict_types=1);

namespace App\Filament\Resources\Plants\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;
use Illuminate\Support\HtmlString;
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
                TextEntry::make('qr_preview')
                    ->label('QrCode')
                    ->state(function ($get, $record) {
                        $url = $record?->qrCodeUrl();
                        if (! $url) {
                            return 'Enter a URL to see the QR code preview';
                        }

                        return new HtmlString(
                            Qr::render(
                                data: $url,
                                options: ['type' => 'svg','size' => '500',]
                            )
                        );
                    }),
            ]);
    }
}
