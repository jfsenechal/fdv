<?php


namespace App\Models;

use Database\Factories\PlantFactory;
use Illuminate\Database\Eloquent\Attributes\UseFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[UseFactory(PlantFactory::class)]
final class Plant extends Model
{
    use HasFactory;

    protected $fillable = [
        'french_name',
        'english_name',
        'latin_name',
        'description',
        'conservation_status', // Statut et préservation
        'usages', // Usages et anecdotes
        'ecological_role', // Rôle écologique
        'habitat', // Habitat
        'flowering_period', // Période de floraison
        'fruiting_period', // Fructification
        'etymology', // Étymologie
        'family_id', // famille
        'genus_id', // genre
        'type_id', // type
    ];

    protected $casts = [

    ];

    public function firstPhoto(): ?Photo
    {
        if ($this->photos()->count() > 0) {
            return $this->photos()->first();
        }

        return null;
    }

    /**
     * Get all the photos for the Plant.
     */
    public function photos(): HasMany
    {
        return $this->hasMany(Photo::class);
    }

    public function family(): BelongsTo
    {
        return $this->belongsTo(Family::class);
    }

    public function genus(): BelongsTo
    {
        return $this->belongsTo(Genus::class);
    }

    public function division(): BelongsTo
    {
        return $this->belongsTo(Type::class);
    }
}
