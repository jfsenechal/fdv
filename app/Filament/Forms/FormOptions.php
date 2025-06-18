<?php

namespace App\Filament\Forms;

class FormOptions
{
    public static function editor(): array
    {
        return [
            ['bold', 'italic', 'underline', 'strike', 'subscript', 'superscript', 'link'],
            ['h2', 'h3'],
            ['bulletList', 'orderedList'],
            [],
            // The `customBlocks` and `mergeTags` tools are also added here if those features are used.
            ['undo', 'redo'],
        ];
    }
}
