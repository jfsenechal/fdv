<?php

namespace App\Filament\Resources\CategoryPhotos\Pages;

use App\Filament\Resources\CategoryPhotos\CategoryPhotoResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ManageRecords;

class ManageCategoryPhotos extends ManageRecords
{
    protected static string $resource = CategoryPhotoResource::class;

    protected static ?string $title = 'Liste des catégories photos';

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()->label('Ajouter une catégorie'),
        ];
    }
}
