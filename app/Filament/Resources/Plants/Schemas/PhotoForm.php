<?php

namespace App\Filament\Resources\Plants\Schemas;

use App\Enums\SeasonEnum;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Flex;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class PhotoForm
{
    public static function configure(Schema $schema): Schema
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
                Checkbox::make('has_cover')
                    ->label('Couverture')
                    ->helperText('Placez la photo comme couverture de la page'),
                Select::make('category_photo_id')
                    ->label('Catégorie')
                    ->relationship(name: 'categoryPhoto', titleAttribute: 'name')
                    ->preload()
                    ->required()
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
}
