<?php


namespace App\Filament\Resources\Plants\Pages;

use App\Filament\Resources\Plants\PlantResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Contracts\Support\Htmlable;

final class ListPlants extends ListRecords
{
    protected static string $resource = PlantResource::class;

    public function getTitle(): string|Htmlable
    {
        return $this->getAllTableRecordsCount().' plantes';
    }

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
                ->label('Ajouter une plante')
                ->icon('tabler-plus'),
        ];
    }
}
