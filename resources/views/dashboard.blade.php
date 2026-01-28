<x-user-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-900 leading-tight">
            {{ __('Properties Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex flex-col lg:flex-row gap-8">
                
                <aside class="w-full lg:w-1/4">
                    <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 sticky top-24">
                        <div class="flex items-center gap-2 mb-6">
                            <svg class="w-5 h-5 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"></path></svg>
                            <h2 class="text-lg font-bold text-gray-900">Filter Properties</h2>
                        </div>
                        
                        <form action="{{ route('dashboard') }}" method="GET">
                            <div class="mb-5">
                                <label for="min_price" class="block text-sm font-medium text-gray-700 mb-1">Min Price</label>
                                <div class="relative rounded-md shadow-sm">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <span class="text-gray-500 sm:text-sm">$</span>
                                    </div>
                                    <input type="number" name="min_price" id="min_price" value="{{ request('min_price') }}" 
                                        class="focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-7 pr-3 sm:text-sm border-gray-300 rounded-md" placeholder="0">
                                </div>
                            </div>

                            <div class="mb-5">
                                <label for="max_price" class="block text-sm font-medium text-gray-700 mb-1">Max Price</label>
                                <div class="relative rounded-md shadow-sm">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <span class="text-gray-500 sm:text-sm">$</span>
                                    </div>
                                    <input type="number" name="max_price" id="max_price" value="{{ request('max_price') }}" 
                                        class="focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-7 pr-3 sm:text-sm border-gray-300 rounded-md" placeholder="500,000">
                                </div>
                            </div>

                            <div class="mb-6">
                                <label for="type" class="block text-sm font-medium text-gray-700 mb-1">Property Type</label>
                                <select name="type" id="type" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                                    <option value="">All Types</option>
                                    <option value="Apartment" {{ request('type') == 'Apartment' ? 'selected' : '' }}>Apartment</option>
                                    <option value="House" {{ request('type') == 'House' ? 'selected' : '' }}>House</option>
                                    <option value="Commercial" {{ request('type') == 'Commercial' ? 'selected' : '' }}>Commercial</option>
                                </select>
                            </div>

                            <button type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-colors">
                                Apply Filters
                            </button>
                            
                            @if(request()->hasAny(['min_price', 'max_price', 'type']))
                                <a href="{{ route('dashboard') }}" class="mt-3 w-full flex justify-center py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-colors">
                                    Clear All
                                </a>
                            @endif
                        </form>
                    </div>
                </aside>

                <main class="w-full lg:w-3/4">
                    
                    @if($properties->count() > 0)
                        <div class="flex justify-between items-center mb-6">
                            <p class="text-sm text-gray-500">Showing <span class="font-medium text-gray-900">{{ $properties->firstItem() ?? 0 }}</span> to <span class="font-medium text-gray-900">{{ $properties->lastItem() ?? 0 }}</span> of <span class="font-medium text-gray-900">{{ $properties->total() }}</span> results</p>
                        </div>
                    @endif

                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 xl:grid-cols-3 gap-6">
                        @forelse ($properties as $property)
                            <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-lg transition-all duration-300 group">
                                <a href="{{ route('dashboard.properties.show', $property) }}" class="block">
                                    <div class="relative">
                                        @if($property->image)
                                            <img src="{{ asset('storage/' . $property->image) }}" alt="{{ $property->title }}" class="w-full h-56 object-cover group-hover:scale-105 transition-transform duration-500">
                                        @else
                                            <div class="w-full h-56 bg-gray-200 flex items-center justify-center text-gray-400">
                                                <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                            </div>
                                        @endif
                                        
                                        <div class="absolute top-4 right-4 bg-white/95 backdrop-blur px-3 py-1 rounded-full text-indigo-700 font-bold text-sm shadow-sm border border-indigo-50">
                                            ${{ number_format($property->price, 0) }}
                                        </div>
                                    </div>

                                    <div class="p-5">
                                        <div class="mb-2">
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-indigo-50 text-indigo-700">
                                                {{ $property->type ?? 'Property' }}
                                            </span>
                                        </div>

                                        <h3 class="text-lg font-bold text-gray-900 mb-1 group-hover:text-indigo-600 transition-colors">{{ $property->title }}</h3>
                                        
                                        <div class="flex items-center text-gray-500 text-sm mb-4">
                                            <svg class="w-4 h-4 mr-1 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                            <span class="truncate">{{ $property->location }}</span>
                                        </div>

                                        <div class="pt-4 border-t border-gray-50 flex justify-between items-center">
                                            <p class="text-xs text-gray-400">Added {{ $property->created_at->diffForHumans() }}</p>
                                            <span class="text-indigo-600 text-sm font-medium hover:underline">View Details &rarr;</span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @empty
                            <div class="col-span-full py-12 text-center bg-white rounded-xl border border-gray-100 border-dashed">
                                <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-indigo-50 mb-4">
                                    <svg class="w-8 h-8 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                                </div>
                                <h3 class="text-lg font-medium text-gray-900">No properties found</h3>
                                <p class="mt-1 text-gray-500 max-w-sm mx-auto">We couldn't find any properties matching your filters. Try adjusting your search criteria.</p>
                                <a href="{{ route('dashboard') }}" class="mt-4 inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-indigo-700 bg-indigo-100 hover:bg-indigo-200">
                                    Clear Filters
                                </a>
                            </div>
                        @endforelse
                    </div>

                    <div class="mt-8">
                        {{ $properties->appends(request()->query())->links() }}
                    </div>
                </main>
            </div>
        </div>
    </div>
</x-user-layout>