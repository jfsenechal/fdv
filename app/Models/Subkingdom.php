<?php

namespace App\Models;

use Database\Factories\SubkingdomFactory;
use Illuminate\Database\Eloquent\Attributes\UseFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[UseFactory(SubkingdomFactory::class)]
final class Subkingdom extends Model
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
