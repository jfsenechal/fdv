<?php

namespace App\Filament\Resources\TaxonomicClasses;

use App\Filament\Resources\TaxonomicClasses\Pages\CreateTaxonomicClass;
use App\Filament\Resources\TaxonomicClasses\Pages\EditTaxonomicClass;
use App\Filament\Resources\TaxonomicClasses\Pages\ListTaxonomicClasses;
use App\Filament\Resources\TaxonomicClasses\Pages\ViewTaxonomicClass;
use App\Filament\Resources\TaxonomicClasses\Schemas\TaxonomicClassForm;
use App\Filament\Resources\TaxonomicClasses\Schemas\TaxonomicClassInfolist;
use App\Filament\Resources\TaxonomicClasses\Tables\TaxonomicClassesTable;
use App\Models\TaxonomicClass;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class TaxonomicClassResource extends Resource
{
    protected static ?string $model = TaxonomicClass::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return TaxonomicClassForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return TaxonomicClassInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return TaxonomicClassesTable::configure($table);
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
            'index' => ListTaxonomicClasses::route('/'),
            'create' => CreateTaxonomicClass::route('/create'),
            'view' => ViewTaxonomicClass::route('/{record}'),
            'edit' => EditTaxonomicClass::route('/{record}/edit'),
        ];
    }
}
