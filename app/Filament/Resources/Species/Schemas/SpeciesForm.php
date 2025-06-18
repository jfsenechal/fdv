<?php



namespace App\Filament\Resources\Species\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

final class SpeciesForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
            ]);
    }
}
