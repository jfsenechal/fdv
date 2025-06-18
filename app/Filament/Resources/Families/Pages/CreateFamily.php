<?php



namespace App\Filament\Resources\Families\Pages;

use App\Filament\Resources\Families\FamilyResource;
use Filament\Resources\Pages\CreateRecord;

final class CreateFamily extends CreateRecord
{
    protected static string $resource = FamilyResource::class;

    public function getTitle(): string
    {
        return 'Ajouter une famille';
    }
}
