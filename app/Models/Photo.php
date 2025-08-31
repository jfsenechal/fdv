<?php

namespace App\Models;

use App\Enums\SeasonEnum;
use Database\Factories\PhotoFactory;
use Illuminate\Database\Eloquent\Attributes\UseFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[UseFactory(PhotoFactory::class)]
final class Photo extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'plant_id',
        'category_photo_id',
        'path',
        'season',
        'caption',
        'credit',
        'sort',
        'has_cover',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'season' => SeasonEnum::class,
        'has_cover' => 'boolean',
    ];

    /**
     * Get the plant that owns the photo.
     */
    public function plant(): BelongsTo
    {
        return $this->belongsTo(Plant::class);
    }

    public function categoryPhoto(): BelongsTo
    {
        return $this->belongsTo(CategoryPhoto::class);
    }

    /**
     * Scope to filter photos by season
     */
    public function scopeBySeason($query, string $season)
    {
        return $query->where('season', $season);
    }

    /**
     * Scope to order photos by sort column
     */
    public function scopeOrdered($query)
    {
        return $query->orderBy('sort');
    }

    /**
     * Get the full URL for the photo
     */
    public function getUrlAttribute(): string
    {
        return asset('storage/'.$this->path);
    }

}
