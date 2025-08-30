<?php



namespace App\Filament\Resources\Type\Pages;

use App\Filament\Resources\Type\TypeResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

final class ViewType extends ViewRecord
{
    protected static string $resource = TypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
