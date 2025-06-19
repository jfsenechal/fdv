<?php

declare(strict_types=1);

use App\Enums\SeasonEnum;
use App\Models\Division;
use App\Models\Family;
use App\Models\Genus;
use App\Models\Kingdom;
use App\Models\Species;
use App\Models\Subkingdom;
use App\Models\TaxonomicClass;
use App\Models\TaxonomicOrder;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class() extends Migration
{
    public function up(): void
    {
        Schema::create('plants', function (Blueprint $table) {
            $table->id();
            $table->string('common_name')->nullable()->unique();
            $table->string('scientific_name')->unique();
            $table->text('description')->nullable();
            $table->text('anecdote')->nullable();
            $table->foreignIdFor(Division::class)->nullable();
            $table->foreignIdFor(Family::class)->nullable();
            $table->foreignIdFor(Genus::class)->nullable();
            $table->foreignIdFor(Kingdom::class)->nullable();
            $table->foreignIdFor(Species::class)->nullable();
            $table->foreignIdFor(Subkingdom::class)->nullable();
            $table->foreignIdFor(TaxonomicClass::class)->nullable();
            $table->foreignIdFor(TaxonomicOrder::class)->nullable();
            $table->timestamps();
        });

        Schema::create('families', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable(false)->unique();
            $table->timestamps(false);
        });

        Schema::create('kinds', function (Blueprint $table) {
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

        Schema::create('taxonomic_orders', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable(false)->unique();
            $table->timestamps(false);
        });

        Schema::create('taxonomic_classes', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable(false)->unique();
            $table->timestamps(false);
        });

        Schema::create('divisions', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable(false)->unique();
            $table->timestamps(false);
        });

        Schema::create('kingdoms', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable(false)->unique();
            $table->timestamps(false);
        });

        Schema::create('subkingdoms', function (Blueprint $table) {
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
            $table->enum('season', SeasonEnum::toArray());

            // Optional: a caption for the photo
            $table->string('caption')->nullable();
            $table->integer('sort')->nullable();
            $table->text('credit')->nullable();

            $table->timestamps();
        });
    }
};
