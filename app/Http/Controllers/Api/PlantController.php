<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PlantResource;
use App\Models\Plant;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

final class PlantController extends Controller
{
    public function list(): AnonymousResourceCollection
    {
        $plants = Plant::with(['family', 'genus', 'type', 'photos'])->get();

        return PlantResource::collection($plants);
    }
}