<?php



namespace App\Filament\Resources\Kingdoms\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

final class KingdomForm
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
