<?php


namespace App\Filament\Resources\Plants\Pages;

use App\Filament\Resources\Plants\PlantResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;
use Illuminate\Contracts\Support\Htmlable;

final class ViewPlant extends ViewRecord
{
    protected static string $resource = PlantResource::class;

    public function getTitle(): string|Htmlable
    {
        return $this->record->scientific_name ?? $this->record->common_name ;
    }

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make()
                ->icon('tabler-edit'),
            DeleteAction::make()
                ->icon('tabler-trash'),
        ];
    }
}
