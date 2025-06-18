<?php



namespace App\Filament\Resources\Genus\Pages;

use App\Filament\Resources\Genus\GenusResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

final class ViewGenus extends ViewRecord
{
    protected static string $resource = GenusResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
