<!-- resources/views/plants/show.blade.php -->

@extends('layouts.app') {{-- Assuming you have a base layout --}}

@section('content')
    <div class="container mx-auto px-4 py-8">
        <div class="bg-white shadow-xl rounded-lg overflow-hidden animate-fade-in">
            <div class="md:flex">
                {{-- Image Gallery Section --}}
                <div class="md:w-1/2 p-6 bg-gray-100 relative">
                    @if($plant->photos->count() > 0)
                        <div class="swiper-container mySwiper">
                            <div class="swiper-wrapper">
                                @foreach($plant->photos as $photo)
                                    <div class="swiper-slide">
                                        <img src="{{ $photo->url }}" alt="{{ $plant->french_name }} - Photo"
                                             class="w-full h-96 object-cover rounded-lg shadow-md transition-transform duration-300 hover:scale-105">
                                    </div>
                                @endforeach
                            </div>
                            <!-- Add Pagination -->
                            <div class="swiper-pagination"></div>
                            <!-- Add Navigation -->
                            <div class="swiper-button-next"></div>
                            <div class="swiper-button-prev"></div>
                        </div>
                    @else
                        <div class="flex items-center justify-center h-full bg-gray-200 rounded-lg text-gray-500">
                            No image available
                        </div>
                    @endif
                </div>

                {{-- Plant Details Section --}}
                <div class="md:w-1/2 p-6">
                    <h1 class="text-4xl font-extrabold text-green-800 mb-2 animate-slide-in-right">{{ $plant->french_name }}</h1>
                    @if($plant->english_name)
                        <p class="text-xl text-green-600 mb-1 animate-slide-in-right delay-100">{{ $plant->english_name }}</p>
                    @endif
                    @if($plant->latin_name)
                        <p class="text-lg italic text-gray-600 mb-4 animate-slide-in-right delay-200">{{ $plant->latin_name }}</p>
                    @endif

                    <div class="border-t border-gray-200 pt-4 mt-4">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            @if($plant->family)
                                <p class="text-gray-700 animate-fade-in delay-300"><strong
                                        class="font-semibold text-green-700">Family:</strong> {{ $plant->family->name }}
                                </p>
                            @endif
                            @if($plant->genus)
                                <p class="text-gray-700 animate-fade-in delay-400"><strong
                                        class="font-semibold text-green-700">Genus:</strong> {{ $plant->genus->name }}
                                </p>
                            @endif
                            @if($plant->type)
                                <p class="text-gray-700 animate-fade-in delay-500"><strong
                                        class="font-semibold text-green-700">Type:</strong> {{ $plant->type->name }}</p>
                            @endif
                            @if($plant->flowering_period)
                                <p class="text-gray-700 animate-fade-in delay-600"><strong
                                        class="font-semibold text-green-700">Flowering
                                        Period:</strong> {!!  $plant->flowering_period !!}</p>
                            @endif
                            @if($plant->fruiting_period)
                                <p class="text-gray-700 animate-fade-in delay-700"><strong
                                        class="font-semibold text-green-700">Fruiting
                                        Period:</strong> {!!  $plant->fruiting_period !!}</p>
                            @endif
                        </div>
                    </div>

                    @if($plant->description)
                        <div class="mt-6 animate-fade-in delay-800">
                            <h3 class="text-2xl font-semibold text-green-800 mb-2">Description</h3>
                            <p class="text-gray-700 leading-relaxed">{!! $plant->description !!}</p>
                        </div>
                    @endif

                    @if($plant->conservation_status)
                        <div class="mt-6 animate-fade-in delay-900">
                            <h3 class="text-2xl font-semibold text-green-800 mb-2">Conservation Status</h3>
                            <p class="text-gray-700 leading-relaxed">{!! $plant->conservation_status !!}</p>
                        </div>
                    @endif

                    @if($plant->usages)
                        <div class="mt-6 animate-fade-in delay-1000">
                            <h3 class="text-2xl font-semibold text-green-800 mb-2">Usages & Anecdotes</h3>
                            <p class="text-gray-700 leading-relaxed">{!! $plant->usages !!}</p>
                        </div>
                    @endif

                    @if($plant->ecological_role)
                        <div class="mt-6 animate-fade-in delay-1100">
                            <h3 class="text-2xl font-semibold text-green-800 mb-2">Ecological Role</h3>
                            <p class="text-gray-700 leading-relaxed">{!! $plant->ecological_role !!}</p>
                        </div>
                    @endif

                    @if($plant->habitat)
                        <div class="mt-6 animate-fade-in delay-1200">
                            <h3 class="text-2xl font-semibold text-green-800 mb-2">Habitat</h3>
                            <p class="text-gray-700 leading-relaxed">{!! $plant->habitat !!}</p>
                        </div>
                    @endif

                    @if($plant->etymology)
                        <div class="mt-6 animate-fade-in delay-1300">
                            <h3 class="text-2xl font-semibold text-green-800 mb-2">Etymology</h3>
                            <p class="text-gray-700 leading-relaxed">{!! $plant->etymology !!}</p>
                        </div>
                    @endif

                    <div class="mt-8 text-center">
                        <a href="{{ route('home') }}"
                           class="inline-block bg-green-600 hover:bg-green-700 text-white font-bold py-3 px-6 rounded-full transition duration-300 transform hover:scale-105 animate-bounce-in">
                            Retour à la liste des plantes</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('styles')
        <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css"/>
        <style>
            @keyframes fade-in {
                from {
                    opacity: 0;
                    transform: translateY(20px);
                }
                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }

            @keyframes slide-in-right {
                from {
                    opacity: 0;
                    transform: translateX(20px);
                }
                to {
                    opacity: 1;
                    transform: translateX(0);
                }
            }

            @keyframes bounce-in {
                0% {
                    transform: scale(0.9);
                    opacity: 0;
                }
                60% {
                    transform: scale(1.05);
                    opacity: 1;
                }
                80% {
                    transform: scale(0.97);
                }
                100% {
                    transform: scale(1);
                }
            }

            .animate-fade-in {
                animation: fade-in 0.6s ease-out forwards;
                opacity: 0;
            }

            .animate-slide-in-right {
                animation: slide-in-right 0.7s ease-out forwards;
                opacity: 0;
            }

            .animate-bounce-in {
                animation: bounce-in 0.8s ease-out forwards;
                opacity: 0;
            }

            /* Delay animations */
            .delay-100 {
                animation-delay: 0.1s;
            }

            .delay-200 {
                animation-delay: 0.2s;
            }

            .delay-300 {
                animation-delay: 0.3s;
            }

            .delay-400 {
                animation-delay: 0.4s;
            }

            .delay-500 {
                animation-delay: 0.5s;
            }

            .delay-600 {
                animation-delay: 0.6s;
            }

            .delay-700 {
                animation-delay: 0.7s;
            }

            .delay-800 {
                animation-delay: 0.8s;
            }

            .delay-900 {
                animation-delay: 0.9s;
            }

            .delay-1000 {
                animation-delay: 1.0s;
            }

            .delay-1100 {
                animation-delay: 1.1s;
            }

            .delay-1200 {
                animation-delay: 1.2s;
            }

            .delay-1300 {
                animation-delay: 1.3s;
            }
        </style>
    @endpush

    @push('scripts')
        <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                if (document.querySelector('.swiper-container')) {
                    new Swiper('.mySwiper', {
                        loop: true,
                        pagination: {
                            el: '.swiper-pagination',
                            clickable: true,
                        },
                        navigation: {
                            nextEl: '.swiper-button-next',
                            prevEl: '.swiper-button-prev',
                        },
                        autoplay: {
                            delay: 5000,
                            disableOnInteraction: false,
                        },
                        speed: 800,
                        spaceBetween: 30,
                        effect: 'fade', // Adds a nice fade transition between slides
                        fadeEffect: {
                            crossFade: true
                        },
                    });
                }
            });
        </script>
    @endpush
@endsection
