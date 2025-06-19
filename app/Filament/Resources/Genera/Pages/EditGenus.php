<?php

namespace App\Filament\Resources\Genera\Pages;

use App\Filament\Resources\Genera\GenusResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditGenus extends EditRecord
{
    protected static string $resource = GenusResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
