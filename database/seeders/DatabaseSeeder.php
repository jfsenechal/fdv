<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Family;
use App\Models\Genus;
use App\Models\Type;
use App\Models\User;
use Illuminate\Database\Seeder;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

final class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::factory()->create([
            'name' => config('app.default_user.name'),
            'email' => config('app.default_user.email'),
            'password' => bcrypt(config('app.default_user.password')),
        ]);
        Type::factory()->create(['name' => 'Arbre à feuilles caduques']);
        Family::factory()->create(['name' => 'Sapindaceae']);
        Genus::factory()->create(['name' => 'Acer']);
    }
}
