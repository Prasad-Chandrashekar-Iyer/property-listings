<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Property Listings - Find Your Dream Home</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 text-gray-800 antialiased font-[family-name:var(--font-sans)]">

    <nav class="bg-white border-b border-gray-100 shadow-sm sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <a href="/" class="flex items-center gap-2">
                        <svg class="w-8 h-8 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                        </svg>
                        <span class="font-bold text-xl text-gray-900">Tech2Edge</span>
                    </a>
                </div>

                <div class="flex items-center gap-4">
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/dashboard') }}" class="text-sm font-medium text-gray-700 hover:text-indigo-600 transition">Dashboard</a>
                        @else
                            <a href="{{ route('login') }}" class="text-sm font-medium text-gray-700 hover:text-indigo-600 transition">Log in</a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="px-4 py-2 bg-indigo-600 text-white rounded-lg text-sm font-medium hover:bg-indigo-700 transition shadow-md">Register</a>
                            @endif
                        @endauth
                    @endif
                </div>
            </div>
        </div>
    </nav>

    <div class="relative bg-white overflow-hidden">
        <div class="max-w-7xl mx-auto">
            <div class="relative z-10 pb-8 bg-white sm:pb-16 md:pb-20 lg:max-w-2xl lg:w-full lg:pb-28 xl:pb-32 pt-20 px-4 sm:px-6 lg:px-8">
                <main class="mt-10 mx-auto max-w-7xl sm:mt-12 md:mt-16 lg:mt-20 xl:mt-28">
                    <div class="sm:text-center lg:text-left">
                        <h1 class="text-4xl tracking-tight font-extrabold text-gray-900 sm:text-5xl md:text-6xl">
                            <span class="block xl:inline">Find your perfect</span>
                            <span class="block text-indigo-600 xl:inline">place to live</span>
                        </h1>
                        <p class="mt-3 text-base text-gray-500 sm:mt-5 sm:text-lg sm:max-w-xl sm:mx-auto md:mt-5 md:text-xl lg:mx-0">
                            Discover the best properties in the most desirable locations. From cozy apartments to luxury estates, we have the home you've been dreaming of.
                        </p>
                        <div class="mt-5 sm:mt-8 sm:flex sm:justify-center lg:justify-start">
                            <div class="rounded-md shadow">
                                <a href="#" class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 md:py-4 md:text-lg">
                                    Browse Listings
                                </a>
                            </div>
                            <div class="mt-3 sm:mt-0 sm:ml-3">
                                <a href="#" class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-indigo-700 bg-indigo-100 hover:bg-indigo-200 md:py-4 md:text-lg">
                                    Sell Property
                                </a>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
        <div class="lg:absolute lg:inset-y-0 lg:right-0 lg:w-1/2">
            <img class="h-56 w-full object-cover sm:h-72 md:h-96 lg:w-full lg:h-full" src="https://images.unsplash.com/photo-1560518883-ce09059eeffa?ixlib=rb-1.2.1&auto=format&fit=crop&w=1920&q=80" alt="Modern building">
        </div>
    </div>

    <div class="bg-gray-50 py-12 sm:py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h2 class="text-3xl font-extrabold text-gray-900 sm:text-4xl">Featured Properties</h2>
                <p class="mt-4 text-lg text-gray-500">Check out our latest listings selected just for you.</p>
            </div>

            <div class="mt-10 grid gap-8 md:grid-cols-2 lg:grid-cols-3">
                <div class="bg-white overflow-hidden shadow rounded-lg hover:shadow-lg transition-shadow duration-300">
                    <img class="h-48 w-full object-cover" src="https://images.unsplash.com/photo-1600596542815-60c3750436d0?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" alt="House 1">
                    <div class="p-6">
                        <div class="flex items-center">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">For Sale</span>
                            <span class="ml-auto text-lg font-bold text-indigo-600">$450,000</span>
                        </div>
                        <h3 class="mt-2 text-xl font-semibold text-gray-900">Modern Family Home</h3>
                        <p class="mt-2 text-gray-500 text-sm">3 Beds • 2 Baths • 1,800 sqft</p>
                        <p class="mt-3 text-gray-600 text-sm line-clamp-2">A beautiful modern home located in the heart of the suburbs with a spacious backyard.</p>
                        <div class="mt-4">
                            <a href="#" class="text-indigo-600 hover:text-indigo-900 font-medium text-sm">View Details &rarr;</a>
                        </div>
                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow rounded-lg hover:shadow-lg transition-shadow duration-300">
                    <img class="h-48 w-full object-cover" src="https://images.unsplash.com/photo-1512917774080-9991f1c4c750?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" alt="House 2">
                    <div class="p-6">
                        <div class="flex items-center">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">For Rent</span>
                            <span class="ml-auto text-lg font-bold text-indigo-600">$2,200/mo</span>
                        </div>
                        <h3 class="mt-2 text-xl font-semibold text-gray-900">Luxury Apartment</h3>
                        <p class="mt-2 text-gray-500 text-sm">2 Beds • 2 Baths • 1,200 sqft</p>
                        <p class="mt-3 text-gray-600 text-sm line-clamp-2">High-end apartment with city views, pool access, and modern amenities.</p>
                        <div class="mt-4">
                            <a href="#" class="text-indigo-600 hover:text-indigo-900 font-medium text-sm">View Details &rarr;</a>
                        </div>
                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow rounded-lg hover:shadow-lg transition-shadow duration-300">
                    <img class="h-48 w-full object-cover" src="https://images.unsplash.com/photo-1564013799919-ab600027ffc6?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" alt="House 3">
                    <div class="p-6">
                        <div class="flex items-center">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">For Sale</span>
                            <span class="ml-auto text-lg font-bold text-indigo-600">$1,200,000</span>
                        </div>
                        <h3 class="mt-2 text-xl font-semibold text-gray-900">Seaside Villa</h3>
                        <p class="mt-2 text-gray-500 text-sm">5 Beds • 4 Baths • 3,500 sqft</p>
                        <p class="mt-3 text-gray-600 text-sm line-clamp-2">Exclusive villa right on the coast with private beach access and sunset views.</p>
                        <div class="mt-4">
                            <a href="#" class="text-indigo-600 hover:text-indigo-900 font-medium text-sm">View Details &rarr;</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="bg-white border-t border-gray-100 py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex justify-between items-center">
            <p class="text-gray-500 text-sm">&copy; {{ date('Y') }} Tech2Edge Property Listings. All rights reserved.</p>
            <div class="flex space-x-6">
                <a href="#" class="text-gray-400 hover:text-gray-500">Privacy</a>
                <a href="#" class="text-gray-400 hover:text-gray-500">Terms</a>
            </div>
        </div>
    </footer>

</body>
</html>