<?php



namespace App\Filament\Resources\Type\Pages;

use App\Filament\Resources\Type\KingdomResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

final class ViewKingdom extends ViewRecord
{
    protected static string $resource = KingdomResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
