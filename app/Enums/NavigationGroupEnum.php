<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;
use Illuminate\Contracts\Support\Htmlable;

enum NavigationGroupEnum implements hasLabel
{
    case classifications;

    public function getLabel(): string|Htmlable|null
    {
        return match ($this) {
            self::classifications => 'Classifications',
        };
    }
}
