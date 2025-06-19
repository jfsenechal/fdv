<?php



namespace App\Filament\Resources\TaxonomicOrders;

use App\Filament\Resources\TaxonomicOrders\Pages\CreateTaxonomicOrder;
use App\Filament\Resources\TaxonomicOrders\Pages\EditTaxonomicOrder;
use App\Filament\Resources\TaxonomicOrders\Pages\ListTaxonomicOrders;
use App\Filament\Resources\TaxonomicOrders\Pages\ViewTaxonomicOrder;
use App\Filament\Resources\TaxonomicOrders\Schemas\TaxonomicOrderForm;
use App\Filament\Resources\TaxonomicOrders\Schemas\TaxonomicOrderInfolist;
use App\Filament\Resources\TaxonomicOrders\Tables\TaxonomicOrdersTable;
use App\Models\TaxonomicOrder;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

final class TaxonomicOrderResource extends Resource
{
    protected static ?string $model = TaxonomicOrder::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $modelLabel = 'Ordres';

    protected static string|\UnitEnum|null $navigationGroup = 'Paramètres';

    public static function form(Schema $schema): Schema
    {
        return TaxonomicOrderForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return TaxonomicOrderInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return TaxonomicOrdersTable::configure($table);
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
            'index' => ListTaxonomicOrders::route('/'),
            'create' => CreateTaxonomicOrder::route('/create'),
            'view' => ViewTaxonomicOrder::route('/{record}'),
            'edit' => EditTaxonomicOrder::route('/{record}/edit'),
        ];
    }
}
