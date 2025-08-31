<?php

namespace App\Filament\Resources\Plants\RelationManagers;

use App\Enums\SeasonEnum;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\CreateAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Schemas\Components\Flex;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class PhotosRelationManager extends RelationManager
{
    protected static string $relationship = 'photos';

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                FileUpload::make('path')
                    ->label('Photo')
                    ->disk('public')
                    ->directory('uploads')
                    ->previewable(false)
                    ->openable()
                    ->required()
                    // ->image()
                    ->downloadable(),
                Radio::make('season')
                    ->label('Saison')
                    ->required()
                    ->options(SeasonEnum::class),
                Select::make('category_photo_id')
                    ->label('Catégorie')
                    ->relationship(name: 'categoryPhoto', titleAttribute: 'name')
                    ->preload()
                    ->createOptionForm([
                        TextInput::make('name')
                            ->required(),
                    ]),
                Flex::make([
                    Section::make([
                        Textarea::make('caption')
                            ->label('Légende'),
                        Textarea::make('credit')
                            ->label('Crédit'),
                    ])->label('Infos')->grow(true),
                ])->from('md'),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('path')
            ->columns([
                ImageColumn::make('url')
                    ->label('Aperçu'),
                TextColumn::make('season')
                    ->label('Saison'),
                TextColumn::make('categoryPhoto.name')
                    ->numeric()
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
            ->headerActions([
                CreateAction::make()->label('Ajouter une photo'),
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
