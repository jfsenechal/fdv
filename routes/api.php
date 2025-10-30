<?php

declare(strict_types=1);

use App\Http\Controllers\Api\PlantController;
use Illuminate\Support\Facades\Route;

Route::get('/plants/list', [PlantController::class, 'list'])->name('api.plants.list');
Route::get('/plants/{id}', [PlantController::class, 'show'])->name('api.plants.show');
