<?php

namespace App\Filament\Resources\TaxonomicClasses\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class TaxonomicClassForm
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
