<?php


namespace App\Filament\Resources\Plants;

use App\Filament\Resources\Plants\Pages\CreatePlant;
use App\Filament\Resources\Plants\Pages\EditPlant;
use App\Filament\Resources\Plants\Pages\ListPlants;
use App\Filament\Resources\Plants\Pages\ViewPlant;
use App\Filament\Resources\Plants\Schemas\PlantForm;
use App\Filament\Resources\Plants\Schemas\PlantInfolist;
use App\Filament\Resources\Plants\Tables\PlantsTable;
use App\Models\Plant;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

final class PlantResource extends Resource
{
    protected static ?string $model = Plant::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $modelLabel = 'Plantes';

    public static function form(Schema $schema): Schema
    {
        return PlantForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return PlantInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PlantsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListPlants::route('/'),
            'create' => CreatePlant::route('/create'),
            'view' => ViewPlant::route('/{record}'),
            'edit' => EditPlant::route('/{record}/edit'),
        ];
    }
}
