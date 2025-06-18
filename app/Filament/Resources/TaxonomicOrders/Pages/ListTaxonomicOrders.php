<?php



namespace App\Filament\Resources\TaxonomicOrders\Pages;

use App\Filament\Resources\TaxonomicOrders\TaxonomicOrderResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

final class ListTaxonomicOrders extends ListRecords
{
    protected static string $resource = TaxonomicOrderResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
