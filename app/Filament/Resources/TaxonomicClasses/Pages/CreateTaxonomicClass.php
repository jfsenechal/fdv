<?php



namespace App\Filament\Resources\TaxonomicClasses\Pages;

use App\Filament\Resources\TaxonomicClasses\TaxonomicClassResource;
use Filament\Resources\Pages\CreateRecord;

final class CreateTaxonomicClass extends CreateRecord
{
    protected static string $resource = TaxonomicClassResource::class;
}
