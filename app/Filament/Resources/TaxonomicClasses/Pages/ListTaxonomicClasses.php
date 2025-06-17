<?php

namespace App\Filament\Resources\TaxonomicClasses\Pages;

use App\Filament\Resources\TaxonomicClasses\TaxonomicClassResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListTaxonomicClasses extends ListRecords
{
    protected static string $resource = TaxonomicClassResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
