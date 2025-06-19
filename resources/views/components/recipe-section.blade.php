@props(['plants'])

<section class="mb-12">
    <div class="container mx-auto px-4">
        <!-- Section Header -->
        <div class="flex items-center justify-between mb-6">
            <h2 class="text-2xl md:text-3xl font-bold text-gray-900">

            </h2>
        </div>

        <!-- Recipes Grid -->
        @if($plants->count() > 0)
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                @foreach($plants as $plant)
                    <x-recipe-card :plant="$plant"/>
                @endforeach
            </div>
        @else
            <div class="text-center py-8">
                <p class="text-gray-500">No plants found.</p>
            </div>
        @endif
    </div>
</section>
