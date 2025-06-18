<?php


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
                Fieldset::make('Nom')
                    ->components([
                        TextInput::make('common_name')
                            ->label('Nom commun')
                            ->default(null),
                        TextInput::make('scientific_name')
                            ->label('Nom latin')
                            ->required(),
                    ]),
                Fieldset::make('Classification')
                    ->components([
                        Select::make('family_id')
                            ->label('Famille')
                            ->relationship('family', 'name')
                            ->default(null)
                            ->searchable()
                            ->preload()
                            ->createOptionForm([
                                TextInput::make('name')
                                    ->required(),
                            ]),
                        Select::make('division_id')
                            ->relationship('division', 'name')
                            ->default(null)
                            ->searchable()
                            ->preload()
                            ->createOptionForm([
                                TextInput::make('name')
                                    ->required(),
                            ]),
                        Select::make('kind_id')
                            ->label('Genre')
                            ->relationship('kind', 'name')
                            ->default(null)
                            ->searchable()
                            ->preload()
                            ->createOptionForm([
                                TextInput::make('name')
                                    ->required(),
                            ]),
                        Select::make('species_id')
                            ->label('Espèce')
                            ->relationship('species', 'name')
                            ->default(null)
                            ->preload()
                            ->searchable()
                            ->createOptionForm([
                                TextInput::make('name')
                                    ->required(),
                            ]),
                        Select::make('kingdom_id')
                            ->label('Règne')
                            ->relationship('kingdom', 'name')
                            ->default(null)
                            ->preload()
                            ->searchable()
                            ->createOptionForm([
                                TextInput::make('name')
                                    ->required(),
                            ]),
                        Select::make('subkingdom_id')
                            ->label('Sous règne')
                            ->relationship('subkingdom', 'name')
                            ->default(null)
                            ->preload()
                            ->searchable()
                            ->createOptionForm([
                                TextInput::make('name')
                                    ->required(),
                            ]),
                        Select::make('taxonomic_class_id')
                            ->label('Classe')
                            ->relationship('taxonomicClass', 'name')
                            ->default(null)
                            ->preload()
                            ->searchable()
                            ->createOptionForm([
                                TextInput::make('name')
                                    ->required(),
                            ]),
                        Select::make('taxonomic_order_id')
                            ->label('Ordre')
                            ->relationship('taxonomicOrder', 'name')
                            ->default(null)
                            ->preload()
                            ->searchable()
                            ->createOptionForm([
                                TextInput::make('name')
                                    ->required(),
                            ]),
                    ]),
                Fieldset::make('Description')
                    ->components([
                        RichEditor::make('description')
                            ->default(null)
                            ->columnSpanFull()
                            ->toolbarButtons(FormOptions::editor()),
                        RichEditor::make('anecdote')
                            ->default(null)
                            ->columnSpanFull()
                            ->toolbarButtons(FormOptions::editor()),
                    ]),
            ]);
    }
}
