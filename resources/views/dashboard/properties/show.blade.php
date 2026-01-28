<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-900 leading-tight">
                {{ __('Property Details') }}
            </h2>
            <a href="{{ route('dashboard') }}" class="text-sm text-gray-500 hover:text-indigo-600 flex items-center gap-1 transition-colors">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                Back to Dashboard
            </a>
        </div>
    </x-slot>

    <div class="py-12 bg-gray-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                
                <div class="lg:col-span-2 space-y-8">
                    
                    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden h-[400px] relative group">
                        @if($property->image)
                            <img src="{{ asset('storage/' . $property->image) }}" alt="{{ $property->title }}" class="w-full h-full object-cover">
                        @else
                            <div class="w-full h-full bg-gray-100 flex flex-col items-center justify-center text-gray-400">
                                <svg class="w-16 h-16 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                <span class="text-lg font-medium">No Image Available</span>
                            </div>
                        @endif
                        
                        <div class="absolute top-4 left-4">
                            <span class="px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wide shadow-sm
                                {{ $property->status == 'Available' ? 'bg-green-500 text-white' : 'bg-gray-800 text-white' }}">
                                {{ $property->status }}
                            </span>
                        </div>
                    </div>

                    <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100">
                        <div class="mb-6">
                            <h3 class="text-sm font-bold text-indigo-600 uppercase tracking-wide mb-2">About this property</h3>
                            <h1 class="text-3xl font-bold text-gray-900 mb-2">{{ $property->title }}</h1>
                            <div class="flex items-center text-gray-500">
                                <svg class="w-5 h-5 mr-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                <span class="text-lg">{{ $property->location }}</span>
                            </div>
                        </div>

                        <div class="prose max-w-none text-gray-600 leading-relaxed border-t border-gray-100 pt-6">
                            {{ $property->description }}
                        </div>
                    </div>

                </div>

                <div class="space-y-6">
                    
                    <div class="bg-white p-6 rounded-2xl shadow-md border border-gray-100 sticky top-24">
                        <div class="mb-1 text-sm text-gray-500 font-medium">Listing Price</div>
                        <div class="text-4xl font-extrabold text-indigo-600 mb-6">
                            ${{ number_format($property->price, 0) }}
                        </div>

                        <div class="space-y-3 mb-8">
                            <div class="flex justify-between py-2 border-b border-gray-50">
                                <span class="text-gray-500">Property Type</span>
                                <span class="font-semibold text-gray-900">{{ $property->type }}</span>
                            </div>
                            <div class="flex justify-between py-2 border-b border-gray-50">
                                <span class="text-gray-500">Listed On</span>
                                <span class="font-semibold text-gray-900">{{ $property->created_at->format('M d, Y') }}</span>
                            </div>
                            <div class="flex justify-between py-2 border-b border-gray-50">
                                <span class="text-gray-500">Listing ID</span>
                                <span class="font-semibold text-gray-900">#{{ $property->id }}</span>
                            </div>
                        </div>

                        <button class="w-full bg-indigo-600 text-white font-bold py-3 px-4 rounded-xl hover:bg-indigo-700 transition-all shadow-lg shadow-indigo-200 transform hover:-translate-y-0.5">
                            Contact Agent
                        </button>
                        <p class="text-center text-xs text-gray-400 mt-4">
                            Reference Listing #{{ $property->id }} when calling.
                        </p>
                    </div>

                    <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 flex items-center gap-4">
                        <div class="w-12 h-12 bg-gray-200 rounded-full flex items-center justify-center text-gray-500">
                           <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                        </div>
                        <div>
                            <div class="text-sm font-bold text-gray-900">Listed by Tech2Edge</div>
                            <div class="text-xs text-gray-500">Verified Partner</div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
</x-app-layout>