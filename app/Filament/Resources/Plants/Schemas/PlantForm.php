<?php

declare(strict_types=1);

namespace App\Filament\Resources\Plants\Schemas;

use App\Filament\Forms\FormOptions;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Fieldset;
use Filament\Schemas\Schema;

final class PlantForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(1)
            ->components([
                Fieldset::make('Appellation')
                    ->components([
                        TextInput::make('latin_name')
                            ->label('Nom latin')
                            ->required(),
                        TextInput::make('french_name')
                            ->label('Nom français'),
                        TextInput::make('english_name')
                            ->label('Nom anglais'),
                    ]),
                Fieldset::make('Description')
                    ->components([
                        RichEditor::make('description')
                            ->default(null)
                            ->columnSpanFull()
                            ->toolbarButtons(FormOptions::editor()),
                    ]),
                Fieldset::make('Classification taxonomique')
                    ->components([
                        Select::make('family_id')
                            ->label('Famille')
                            ->relationship('family', 'name')
                            ->default(1)
                            ->preload()
                            ->searchable()
                            ->createOptionForm([
                                TextInput::make('name')
                                    ->required(),
                            ]),
                        Select::make('genus_id')
                            ->label('Genre')
                            ->relationship('genus', 'name')
                            ->default(null)
                            ->preload()
                            ->searchable()
                            ->createOptionForm([
                                TextInput::make('name')
                                    ->required(),
                            ]),
                        Select::make('type_id')
                            ->label('Type')
                            ->relationship('type', 'name')
                            ->default(null)
                            ->searchable()
                            ->preload()
                            ->createOptionForm([
                                TextInput::make('name')
                                    ->required(),
                            ]),
                    ]),

                Fieldset::make('Conservation et écologie')
                    ->components([
                        RichEditor::make('habitat')
                            ->label('Habitat dans la réserve')
                            ->helperText('(Calestienne)')
                            ->default(null)
                            ->columnSpanFull()
                            ->toolbarButtons(FormOptions::editor()),
                        RichEditor::make('conservation_status')
                            ->label('Statut et préservation')
                            ->default(null)
                            ->columnSpanFull()
                            ->toolbarButtons(FormOptions::editor()),
                        RichEditor::make('ecological_role')
                            ->label('Rôle écologique')
                            ->default(null)
                            ->columnSpanFull()
                            ->toolbarButtons(FormOptions::editor()),
                    ]),

                Fieldset::make('Cycles biologiques')
                    ->components([
                        RichEditor::make('flowering_period')
                            ->label('Période de floraison')
                            ->default(null)
                            ->columnSpanFull()
                            ->toolbarButtons(FormOptions::editor()),
                        RichEditor::make('fruiting_period')
                            ->label('Fructification')
                            ->default(null)
                            ->columnSpanFull()
                            ->toolbarButtons(FormOptions::editor()),
                    ]),
                Fieldset::make('Informations culturelles')
                    ->components([
                        RichEditor::make('usages')
                            ->label('Usages et anecdotes')
                            ->default(null)
                            ->columnSpanFull()
                            ->toolbarButtons(FormOptions::editor()),
                        RichEditor::make('etymology')
                            ->label('Étymologie')
                            ->default(null)
                            ->columnSpanFull()
                            ->toolbarButtons(FormOptions::editor()),
                    ]),
            ]);
    }
}
