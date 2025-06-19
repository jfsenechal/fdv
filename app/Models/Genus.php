<?php

namespace App\Models;

use Database\Factories\GenusFactory;
use Illuminate\Database\Eloquent\Attributes\UseFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[UseFactory(GenusFactory::class)]
final class Genus extends Model
{
    use HasFactory;

    protected $table = 'genus';

    protected $fillable = [
        'name',
    ];

    public function plants()
    {
        return $this->hasMany(Plant::class);
    }
}
