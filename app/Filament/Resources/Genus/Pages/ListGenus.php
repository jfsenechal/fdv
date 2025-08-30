<?php

namespace App\Filament\Resources\Genus\Pages;

use App\Filament\Resources\Genus\GenusResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListGenus extends ListRecords
{
    protected static string $resource = GenusResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
