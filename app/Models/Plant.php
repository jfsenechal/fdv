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
        'common_name',
        'scientific_name',
        'description',
        'anecdote',
        'family_id',
        'genus_id',
        'species_id',
        'taxonomic_order_id',
        'taxonomic_class_id',
        'division_id',
        'kingdom_id',
        'subkingdom_id',
    ];

    protected $casts = [

    ];

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

    public function species(): BelongsTo
    {
        return $this->belongsTo(Species::class);
    }

    public function taxonomicOrder(): BelongsTo
    {
        return $this->belongsTo(TaxonomicOrder::class);
    }

    public function taxonomicClass(): BelongsTo
    {
        return $this->belongsTo(TaxonomicClass::class);
    }

    public function division(): BelongsTo
    {
        return $this->belongsTo(Division::class);
    }

    public function kingdom(): BelongsTo
    {
        return $this->belongsTo(Kingdom::class);
    }

    public function subkingdom(): BelongsTo
    {
        return $this->belongsTo(Subkingdom::class);
    }
}
