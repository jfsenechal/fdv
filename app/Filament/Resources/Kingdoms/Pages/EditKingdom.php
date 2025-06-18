<?php



namespace App\Filament\Resources\Kingdoms\Pages;

use App\Filament\Resources\Kingdoms\KingdomResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

final class EditKingdom extends EditRecord
{
    protected static string $resource = KingdomResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
