<?php



namespace App\Filament\Resources\Plants\Pages;

use App\Filament\Resources\Plants\PlantResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

final class ViewPlant extends ViewRecord
{
    protected static string $resource = PlantResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
