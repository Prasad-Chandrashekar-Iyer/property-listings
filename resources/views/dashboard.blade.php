<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Properties') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex">
                        <!-- Sidebar for Filters -->
                        <aside class="w-1/4 p-4">
                            <div class="bg-gray-50 dark:bg-gray-700 p-4 rounded-lg shadow-inner">
                                <h2 class="text-xl font-bold mb-4">Filters</h2>
                                <form action="{{ route('dashboard') }}" method="GET">
                                    <div class="mb-4">
                                        <label for="min_price" class="block text-gray-700 dark:text-gray-300">Min Price</label>
                                        <input type="number" name="min_price" id="min_price" value="{{ request('min_price') }}" class="w-full mt-1 border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 rounded-md shadow-sm">
                                    </div>
                                    <div class="mb-4">
                                        <label for="max_price" class="block text-gray-700 dark:text-gray-300">Max Price</label>
                                        <input type="number" name="max_price" id="max_price" value="{{ request('max_price') }}" class="w-full mt-1 border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 rounded-md shadow-sm">
                                    </div>
                                    <div class="mb-4">
                                        <label for="type" class="block text-gray-700 dark:text-gray-300">Property Type</label>
                                        <select name="type" id="type" class="w-full mt-1 border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 rounded-md shadow-sm">
                                            <option value="">All Types</option>
                                            <option value="Apartment" {{ request('type') == 'Apartment' ? 'selected' : '' }}>Apartment</option>
                                            <option value="House" {{ request('type') == 'House' ? 'selected' : '' }}>House</option>
                                            <option value="Commercial" {{ request('type') == 'Commercial' ? 'selected' : '' }}>Commercial</option>
                                        </select>
                                    </div>
                                    <button type="submit" class="w-full bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Filter</button>
                                </form>
                            </div>
                        </aside>

                        <!-- Main Content for Property Grid -->
                        <main class="w-3/4 p-4">
                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                                @forelse ($properties as $property)
                                    <div class="bg-white dark:bg-gray-700 rounded-lg shadow-md overflow-hidden">
                                        <a href="{{ route('dashboard.properties.show', $property) }}">
                                            <img src="{{ asset('storage/' . $property->image) }}" alt="{{ $property->title }}" class="w-full h-48 object-cover">
                                            <div class="p-4">
                                                <h3 class="text-lg font-bold">{{ $property->title }}</h3>
                                                <p>${{ number_format($property->price, 2) }}</p>
                                                <p>{{ $property->location }}</p>
                                                <p class="text-sm text-gray-500 dark:text-gray-400 mt-2">Listed: {{ $property->created_at->format('M d, Y') }}</p>
                                            </div>
                                        </a>
                                    </div>
                                @empty
                                    <p>No properties found matching your criteria.</p>
                                @endforelse
                            </div>

                            <div class="mt-8">
                                {{ $properties->appends(request()->query())->links() }}
                            </div>
                        </main>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
