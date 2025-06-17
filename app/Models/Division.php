<?php

namespace App\Models;

use Database\Factories\DivisionFactory;
use Illuminate\Database\Eloquent\Attributes\UseFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[UseFactory(DivisionFactory::class)]
final class Division extends Model
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
