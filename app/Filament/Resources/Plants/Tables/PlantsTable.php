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
                TextColumn::make('common_name')
                    ->searchable()
                    ->sortable()
                    ->label('Nom français'),
                TextColumn::make('scientific_name')
                    ->searchable()
                    ->sortable()
                    ->label('Nom latin'),
                TextColumn::make('division')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('family.name')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('genus.name')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('kingdom.name')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('species.name')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('subkingdom.name')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('taxonomicClass.name')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('taxonomicOrder.name')
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
