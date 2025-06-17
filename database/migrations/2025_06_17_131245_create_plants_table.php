<?php

declare(strict_types=1);

use App\Enums\SeasonEnum;
use App\Models\Division;
use App\Models\Family;
use App\Models\Genus;
use App\Models\Kingdom;
use App\Models\Plant;
use App\Models\Species;
use App\Models\Subkingdom;
use App\Models\TaxonomicClass;
use App\Models\TaxonomicOrder;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class() extends Migration {
    public function up(): void
    {
        Schema::create('plants', function (Blueprint $table) {
            $table->id();
            $table->string('common_name')->nullable();
            $table->string('scientific_name')->unique();
            $table->foreignIdFor(Division::class)->nullable()->constrained()->nullOnDelete();
            $table->foreignIdFor(Family::class)->nullable()->constrained()->nullOnDelete();
            $table->foreignIdFor(Genus::class)->nullable()->constrained()->nullOnDelete();
            $table->foreignIdFor(Kingdom::class)->nullable()->constrained()->nullOnDelete();
            $table->foreignIdFor(Species::class)->nullable()->constrained()->nullOnDelete();
            $table->foreignIdFor(Subkingdom::class)->nullable()->constrained()->nullOnDelete();
            $table->foreignIdFor(TaxonomicClass::class)->nullable()->constrained()->nullOnDelete();
            $table->foreignIdFor(TaxonomicOrder::class)->nullable()->constrained()->nullOnDelete();
            $table->timestamps();
        });

        Schema::create('families', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable(false)->unique();
            $table->timestamps(false);
        });

        Schema::create('genus', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable(false)->unique();
            $table->timestamps(false);
        });

        Schema::create('species', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable(false)->unique();
            $table->timestamps(false);
        });

        Schema::create('taxonomic_order', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable(false)->unique();
            $table->timestamps(false);
        });

        Schema::create('taxonomic_class', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable(false)->unique();
            $table->timestamps(false);
        });

        Schema::create('division', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable(false)->unique();
            $table->timestamps(false);
        });

        Schema::create('kingdom', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable(false)->unique();
            $table->timestamps(false);
        });

        Schema::create('subkingdom', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable(false)->unique();
            $table->timestamps(false);
        });

        Schema::create('photos', function (Blueprint $table) {
            $table->id();

            // This is the foreign key that links to the 'plants' table.
            // constrained() automatically sets it up to reference 'plants.id'.
            // onDelete('cascade') means if a plant is deleted, all its photos will be deleted too.
            $table->foreignId('plant_id')->constrained()->onDelete('cascade');

            // The path to the image file, e.g., 'plants/tomato_summer.jpg'
            $table->string('path');

            // The season for this specific photo. Using an ENUM for data integrity.
            $table->enum('season', SeasonEnum::cases());

            // Optional: a caption for the photo
            $table->string('caption')->nullable();

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('plants');
        Schema::dropIfExists('photos');
    }
};
