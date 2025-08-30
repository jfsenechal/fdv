<?php

namespace App\Filament\Resources\Genus\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class GenusForm
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
