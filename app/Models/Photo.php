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
        'path',
        'season',
        'caption',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'season' => SeasonEnum::class,
    ];

    /**
     * Get the plant that owns the photo.
     */
    public function plant(): BelongsTo
    {
        return $this->belongsTo(Plant::class);
    }
}
