<?php



namespace App\Filament\Resources\TaxonomicOrders\Pages;

use App\Filament\Resources\TaxonomicOrders\TaxonomicOrderResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

final class ViewTaxonomicOrder extends ViewRecord
{
    protected static string $resource = TaxonomicOrderResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
