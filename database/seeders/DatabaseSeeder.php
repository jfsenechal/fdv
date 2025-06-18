<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Division;
use App\Models\Family;
use App\Models\Kind;
use App\Models\Kingdom;
use App\Models\Species;
use App\Models\TaxonomicClass;
use App\Models\TaxonomicOrder;
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
        Kingdom::factory()->create(['name' => 'Plantae']);
        Kingdom::factory()->create(['name' => 'Tracheobionta']);
        Division::factory()->create(['name' => 'Pinophyta']);
        TaxonomicClass::factory()->create(['name' => 'Pinopsida']);
        TaxonomicOrder::factory()->create(['name' => 'Taxales']);
        Family::factory()->create(['name' => 'Taxaceae']);
        Kind::factory()->create(['name' => 'Taxus']);
        Species::factory()->create(['name' => 'Taxus baccata']);
    }
}
