<?php

namespace App\Models;

use Database\Factories\CategoryPhotoFactory;
use Illuminate\Database\Eloquent\Attributes\UseFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[UseFactory(CategoryPhotoFactory::class)]
final class CategoryPhoto extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function photos(): hasMany
    {
        return $this->hasMany(Photo::class);
    }
}
