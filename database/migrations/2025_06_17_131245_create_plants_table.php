<?php

declare(strict_types=1);

use App\Enums\SeasonEnum;
use App\Models\Family;
use App\Models\Genus;
use App\Models\Type;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class() extends Migration
{
    public function up(): void
    {
        Schema::create('plants', function (Blueprint $table) {
            $table->id();
            $table->string('french_name');
            $table->string('english_name')->nullable();
            $table->string('latin_name')->nullable();
            $table->text('description')->nullable();
            $table->text('conservation_status')->nullable(); // Statut et préservation
            $table->text('usages')->nullable(); // Usages et anecdotes
            $table->text('ecological_role')->nullable(); // Rôle écologique
            $table->text('habitat')->nullable(); // Habitat
            $table->text('flowering_period')->nullable(); // Période de floraison
            $table->text('fruiting_period')->nullable(); // Fructification
            $table->text('etymology')->nullable(); // Étymologie
            $table->foreignIdFor(Family::class)->nullable(); // famille
            $table->foreignIdFor(Genus::class)->nullable(); // genre
            $table->foreignIdFor(Type::class)->nullable(); // type
            $table->timestamps();
        });

        Schema::create('families', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable(false)->unique();
            $table->text('description')->nullable();
            $table->timestamps(false);
        });

        Schema::create('genus', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable(false)->unique();
            $table->text('description')->nullable();
            $table->timestamps(false);
        });

        Schema::create('types', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable(false)->unique();
            $table->text('description')->nullable();
            $table->timestamps(false);
        });

        Schema::create('category_photos', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable(false);
            $table->timestamps(false);
        });

        Schema::create('photos', function (Blueprint $table) {
            $table->id();

            // This is the foreign key that links to the 'plants' table.
            // constrained() automatically sets it up to reference 'plants.id'.
            // onDelete('cascade') means if a plant is deleted, all its photos will be deleted too.
            $table->foreignId('plant_id')->constrained()->onDelete('cascade');
            $table->foreignId('category_photo_id')->constrained()->onDelete('cascade');

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
