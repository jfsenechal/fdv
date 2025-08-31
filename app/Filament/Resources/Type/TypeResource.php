<?php


namespace App\Filament\Resources\Type;

use App\Enums\NavigationGroupEnum;
use App\Filament\Resources\Type\Pages\CreateType;
use App\Filament\Resources\Type\Pages\EditType;
use App\Filament\Resources\Type\Pages\ListTypes;
use App\Filament\Resources\Type\Pages\ViewType;
use App\Filament\Resources\Type\Schemas\TypeForm;
use App\Filament\Resources\Type\Schemas\TypeInfolist;
use App\Filament\Resources\Type\Tables\TypeTable;
use App\Models\Type;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

final class TypeResource extends Resource
{
    protected static ?string $model = Type::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $modelLabel = 'Types';

    protected static string|\UnitEnum|null $navigationGroup = NavigationGroupEnum::classifications;

    public static function form(Schema $schema): Schema
    {
        return TypeForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return TypeInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return TypeTable::configure($table);
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
            'index' => ListTypes::route('/'),
            'create' => CreateType::route('/create'),
            'view' => ViewType::route('/{record}'),
            'edit' => EditType::route('/{record}/edit'),
        ];
    }
}
