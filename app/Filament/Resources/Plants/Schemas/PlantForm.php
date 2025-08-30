<?php

declare(strict_types=1);

namespace App\Filament\Resources\Plants\Schemas;

use App\Enums\SeasonEnum;
use App\Filament\Forms\FormOptions;
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
                Fieldset::make('Noms')
                    ->components([
                        TextInput::make('latin_name')
                            ->label('Nom latin')
                            ->required(),
                        TextInput::make('french_name')
                            ->label('Nom français'),
                        TextInput::make('english_name')
                            ->label('Nom anglais'),
                    ]),
                Fieldset::make('Classification')
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
                Fieldset::make('Description')
                    ->components([
                        RichEditor::make('description')
                            ->default(null)
                            ->columnSpanFull()
                            ->toolbarButtons(FormOptions::editor()),
                        RichEditor::make('usages')
                            ->default(null)
                            ->columnSpanFull()
                            ->toolbarButtons(FormOptions::editor()),
                        RichEditor::make('conservation_status')
                            ->default(null)
                            ->columnSpanFull()
                            ->toolbarButtons(FormOptions::editor()),
                        RichEditor::make('ecological_role')
                            ->default(null)
                            ->columnSpanFull()
                            ->toolbarButtons(FormOptions::editor()),
                        RichEditor::make('habitat')
                            ->default(null)
                            ->columnSpanFull()
                            ->toolbarButtons(FormOptions::editor()),
                        RichEditor::make('flowering_period')
                            ->default(null)
                            ->columnSpanFull()
                            ->toolbarButtons(FormOptions::editor()),
                        RichEditor::make('fruiting_period')
                            ->default(null)
                            ->columnSpanFull()
                            ->toolbarButtons(FormOptions::editor()),
                        RichEditor::make('etymology')
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
                                    // ->image()
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
