<?php



namespace App\Filament\Resources\TaxonomicOrders\Pages;

use App\Filament\Resources\TaxonomicOrders\TaxonomicOrderResource;
use Filament\Resources\Pages\CreateRecord;

final class CreateTaxonomicOrder extends CreateRecord
{
    protected static string $resource = TaxonomicOrderResource::class;
}
