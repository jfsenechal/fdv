<?php



namespace App\Filament\Resources\Type\Pages;

use App\Filament\Resources\Type\KingdomResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

final class ListKingdoms extends ListRecords
{
    protected static string $resource = KingdomResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
