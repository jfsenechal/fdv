<?php

namespace App\Filament\Resources\Genera\Pages;

use App\Filament\Resources\Genera\GenusResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewGenus extends ViewRecord
{
    protected static string $resource = GenusResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
