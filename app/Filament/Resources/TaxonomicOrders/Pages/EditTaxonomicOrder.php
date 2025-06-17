<?php

namespace App\Filament\Resources\TaxonomicOrders\Pages;

use App\Filament\Resources\TaxonomicOrders\TaxonomicOrderResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditTaxonomicOrder extends EditRecord
{
    protected static string $resource = TaxonomicOrderResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
