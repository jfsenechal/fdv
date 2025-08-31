<?php

namespace App\Http\Controllers;

use App\Models\Plant;
use Illuminate\View\View;

//https://filamentexamples.com/project/custom-homepage-with-dynamic-homepage-sections-manager
class HomeController extends Controller
{
    public function index(): View
    {
        $plants = Plant::all();

        return view('home', ['plants' => $plants]);
    }

    public function show(int $id)
    {
        $plant = Plant::findOrFail($id);

        return view('show', ['plant' => $plant]);
    }
}
