<?php



namespace App\Filament\Resources\Genus;

use App\Filament\Resources\Genus\Pages\CreateGenus;
use App\Filament\Resources\Genus\Pages\EditGenus;
use App\Filament\Resources\Genus\Pages\ListGenus;
use App\Filament\Resources\Genus\Pages\ViewGenus;
use App\Filament\Resources\Genus\Schemas\GenusForm;
use App\Filament\Resources\Genus\Schemas\GenusInfolist;
use App\Filament\Resources\Genus\Tables\GenusTable;
use App\Models\Genus;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

final class GenusResource extends Resource
{
    protected static ?string $model = Genus::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

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
        return GenusTable::configure($table);
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
            'index' => ListGenus::route('/'),
            'create' => CreateGenus::route('/create'),
            'view' => ViewGenus::route('/{record}'),
            'edit' => EditGenus::route('/{record}/edit'),
        ];
    }
}
