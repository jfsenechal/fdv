@props(['plant'])

<div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300">
    <!-- Recipe Image -->
    <div class="aspect-w-16 aspect-h-9">
        <img src="{{ $plant->firstPhoto()?->path }}" alt="{{ $plant->common_name }}" class="w-full h-48 object-cover">
    </div>

    <!-- Recipe Content -->
    <div class="p-4">
        <!-- Category Badge -->
        <span class="inline-block bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded-full mb-2">
            {{ $plant->scientific_name }}
        </span>

        <!-- Recipe Title -->
        <h3 class="text-lg font-semibold text-gray-900 mb-2 line-clamp-2">
            {{ $plant->scientific_name }}
        </h3>

        <!-- Recipe Description -->
        <p class="text-gray-600 text-sm mb-3 line-clamp-2">
            {{ Str::limit($plant->description, 100) }}
        </p>

        <!-- Recipe Meta Info -->
        <div class="flex items-center justify-between text-sm text-gray-500">
            <div class="flex items-center space-x-4">
                <!-- Total Time -->
                <span class="flex items-center">
                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    {{ $plant->scientific_name }}min
                </span>

                <!-- Servings -->
                <span class="flex items-center">
                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                    </svg>
                    {{ $plant->scientific_name }}
                </span>
            </div>

            <!-- Difficulty -->
            <span
                class="capitalize px-2 py-1 rounded text-xsbg-green-100 text-green-800">
                {{ $plant->scientific_name }}
            </span>
        </div>
    </div>
</div>
