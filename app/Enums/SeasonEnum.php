<?php



namespace App\Enums;

use BackedEnum;
use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasIcon;
use Filament\Support\Contracts\HasLabel;
use Illuminate\Contracts\Support\Htmlable;

enum SeasonEnum: string implements HasColor, HasIcon, HasLabel
{
    case Spring = 'spring';
    case Summer = 'summer';
    case Autumn = 'autumn';
    case Winter = 'winter';

    public static function toArray(): array
    {
        $values = [];
        foreach (self::cases() as $season) {
            $values[] = $season->value;
        }

        return $values;
    }

    public function getColor(): string|array|null
    {
        return match ($this) {
            self::Spring => 'primary',
            self::Summer => 'success',
            self::Autumn => 'warning',
            self::Winter => 'warning',
        };
    }

    public function getLabel(): string|Htmlable|null
    {
        return match ($this) {
            self::Spring => 'Printemps',
            self::Summer => 'Eté',
            self::Autumn => 'Automne',
            self::Winter => 'Hiver',
        };
    }

    public function getIcon(): string|BackedEnum|null
    {
        return match ($this) {
            self::Spring => 'tabler-flower',
            self::Summer => 'tabler-sun',
            self::Autumn => 'tabler-leaf',
            self::Winter => 'tabler-snowflake',
        };
    }
}
