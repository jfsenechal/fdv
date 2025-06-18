<?php



namespace App\Filament\Resources\TaxonomicClasses\Pages;

use App\Filament\Resources\TaxonomicClasses\TaxonomicClassResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

final class EditTaxonomicClass extends EditRecord
{
    protected static string $resource = TaxonomicClassResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
