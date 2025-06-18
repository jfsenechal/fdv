<?php



namespace App\Filament\Resources\Kingdoms\Pages;

use App\Filament\Resources\Kingdoms\KingdomResource;
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
