<?php

namespace App\Filament\Resources\Genera;

use App\Filament\Resources\Genera\Pages\CreateGenus;
use App\Filament\Resources\Genera\Pages\EditGenus;
use App\Filament\Resources\Genera\Pages\ListGenera;
use App\Filament\Resources\Genera\Pages\ViewGenus;
use App\Filament\Resources\Genera\Schemas\GenusForm;
use App\Filament\Resources\Genera\Schemas\GenusInfolist;
use App\Filament\Resources\Genera\Tables\GeneraTable;
use App\Models\Genus;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class GenusResource extends Resource
{
    protected static ?string $model = Genus::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $modelLabel = 'Genre';

    protected static string | \UnitEnum | null $navigationGroup = 'Paramètres';

    public static function form(Schema $schema): Schema
    {
        return GenusForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return GenusInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return GeneraTable::configure($table);
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
            'index' => ListGenera::route('/'),
            'create' => CreateGenus::route('/create'),
            'view' => ViewGenus::route('/{record}'),
            'edit' => EditGenus::route('/{record}/edit'),
        ];
    }
}
