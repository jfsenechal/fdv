<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\CategoryPhoto;
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
        $categories = ['Aspect général', 'Feuilles', 'Fleurs et fruits'];
        foreach ($categories as $category) {
            CategoryPhoto::factory()->create(['name' => $category]);
        }
    }
}
