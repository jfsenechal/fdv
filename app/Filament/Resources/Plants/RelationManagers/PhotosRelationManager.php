<?php

namespace App\Filament\Resources\Plants\RelationManagers;

use App\Filament\Resources\Plants\Schemas\PhotoForm;
use App\Filament\Resources\Plants\Tables\PhotosTable;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Schemas\Schema;
use Filament\Tables\Table;

class PhotosRelationManager extends RelationManager
{
    protected static string $relationship = 'photos';

    public function form(Schema $schema): Schema
    {
        return PhotoForm::configure($schema);
    }

    public function table(Table $table): Table
    {
        return PhotosTable::configure($table);
    }
}
