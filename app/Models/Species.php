<?php



namespace App\Models;

use Database\Factories\SpeciesFactory;
use Illuminate\Database\Eloquent\Attributes\UseFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[UseFactory(SpeciesFactory::class)]
final class Species extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function plants()
    {
        return $this->hasMany(Plant::class);
    }
}
