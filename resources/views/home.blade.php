@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <!-- Hero Section -->
    <section class="bg-gradient-to-r from-blue-600 to-purple-600 text-white py-16">
        <div class="container mx-auto px-4 text-center">
            <h1 class="text-4xl md:text-6xl font-bold mb-4">
                Flore de la Fdv
            </h1>
            <p class="text-xl md:text-2xl mb-8 opacity-90">
                From quick weeknight dinners to special occasion treats
            </p>
        </div>
    </section>

    <div class="py-12">
        <x-recipe-section :plants="$plants"/>
    </div>
@endsection
