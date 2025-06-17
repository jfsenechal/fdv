<?php

namespace App\Filament\Resources\TaxonomicOrders\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class TaxonomicOrderForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label('Nom')
                    ->required(),
            ]);
    }
}
