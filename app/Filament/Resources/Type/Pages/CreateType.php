<?php



namespace App\Filament\Resources\Type\Pages;

use App\Filament\Resources\Type\TypeResource;
use Filament\Resources\Pages\CreateRecord;

final class CreateType extends CreateRecord
{
    protected static string $resource = TypeResource::class;
}
