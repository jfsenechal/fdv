<?php


namespace App\Filament\Resources\Plants\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

final class PlantsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('french_name')
                    ->searchable()
                    ->sortable()
                    ->label('Nom français'),
                TextColumn::make('latin_name')
                    ->searchable()
                    ->sortable()
                    ->label('Nom latin'),
                TextColumn::make('family.name')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('genus.name')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('type.name')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
