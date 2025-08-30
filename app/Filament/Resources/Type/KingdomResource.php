<?php



namespace App\Filament\Resources\Type;

use App\Filament\Resources\Type\Pages\CreateKingdom;
use App\Filament\Resources\Type\Pages\EditKingdom;
use App\Filament\Resources\Type\Pages\ListKingdoms;
use App\Filament\Resources\Type\Pages\ViewKingdom;
use App\Filament\Resources\Type\Schemas\KingdomForm;
use App\Filament\Resources\Type\Schemas\KingdomInfolist;
use App\Filament\Resources\Type\Tables\KingdomsTable;
use App\Models\Type;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

final class KingdomResource extends Resource
{
    protected static ?string $model = Type::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $modelLabel = 'Règnes';

    protected static string|\UnitEnum|null $navigationGroup = 'Paramètres';

    public static function form(Schema $schema): Schema
    {
        return KingdomForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return KingdomInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return KingdomsTable::configure($table);
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
            'index' => ListKingdoms::route('/'),
            'create' => CreateKingdom::route('/create'),
            'view' => ViewKingdom::route('/{record}'),
            'edit' => EditKingdom::route('/{record}/edit'),
        ];
    }
}
