<?php



namespace App\Models;

use Database\Factories\KingdomFactory;
use Illuminate\Database\Eloquent\Attributes\UseFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[UseFactory(KingdomFactory::class)]
final class Kingdom extends Model
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
