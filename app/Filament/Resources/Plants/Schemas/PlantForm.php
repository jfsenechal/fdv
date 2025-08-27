<?php


namespace App\Filament\Resources\Plants\Schemas;

use App\Enums\SeasonEnum;
use App\Filament\Forms\FormOptions;
use Filament\Forms\Components\CheckboxList;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Fieldset;
use Filament\Schemas\Components\Flex;
use Filament\Schemas\Components\Section;
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
                            ->required(),
                        TextInput::make('scientific_name')
                            ->label('Nom latin'),
                    ]),
                Fieldset::make('Classification')
                    ->components([
                        Select::make('kingdom_id')
                            ->label('Règne')
                            ->relationship('kingdom', 'name')
                            ->default(1)
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
                        Select::make('genus_id')
                            ->label('Genre')
                            ->relationship('genus', 'name')
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
                Fieldset::make('Photos')
                    ->components([
                        Repeater::make('photos')
                            ->addActionLabel('Ajouter la photo')
                            ->relationship()
                            ->orderColumn()
                            ->schema([
                                FileUpload::make('path')
                                    ->label('Photo')
                                    ->disk('public')
                                    ->directory('uploads')
                                    ->previewable(false)
                                    ->openable()
                                    ->required()
                                    //->image()
                                    ->downloadable(),
                                Radio::make('season')
                                    ->label('Saison')
                                    ->required()
                                    ->options(SeasonEnum::class),
                                Flex::make([
                                    Section::make([
                                        Textarea::make('caption')
                                            ->label('Légende'),
                                        Textarea::make('credit')
                                            ->label('Crédit'),
                                    ])->label('Infos')->grow(true),
                                ])->from('md'),
                            ])
                            ->columns(3)
                            ->columnSpanFull(),
                    ]),
            ]);
    }
}
