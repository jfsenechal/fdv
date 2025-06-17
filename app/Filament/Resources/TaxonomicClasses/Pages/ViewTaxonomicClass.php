<?php

namespace App\Filament\Resources\TaxonomicClasses\Pages;

use App\Filament\Resources\TaxonomicClasses\TaxonomicClassResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewTaxonomicClass extends ViewRecord
{
    protected static string $resource = TaxonomicClassResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
