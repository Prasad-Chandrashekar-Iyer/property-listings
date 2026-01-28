<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ $property->title }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <img src="{{ asset('storage/' . $property->image) }}" alt="{{ $property->title }}" class="w-full h-96 object-cover rounded-lg shadow-md mb-6">
                    <div class="p-6">
                        <h1 class="text-3xl font-bold mb-2">{{ $property->title }}</h1>
                        <p class="text-2xl font-semibold mb-4 text-green-500">${{ number_format($property->price, 2) }}</p>
                        <div class="flex items-center mb-4">
                            <span class="mr-2 text-gray-600 dark:text-gray-400">{{ $property->location }}</span>
                            <span class="{{ $property->status == 'Available' ? 'bg-green-200 text-green-800' : 'bg-red-200 text-red-800' }} py-1 px-3 rounded-full text-xs font-semibold">
                                {{ $property->status }}
                            </span>
                        </div>
                        <div class="text-sm text-gray-500 dark:text-gray-400 mb-4">
                            Listed on: {{ $property->created_at->format('M d, Y') }}
                        </div>
                        <div class="mb-4">
                            <span class="inline-block bg-gray-200 dark:bg-gray-700 rounded-full px-3 py-1 text-sm font-semibold mr-2 mb-2">#{{ $property->type }}</span>
                        </div>
                        <p class="leading-relaxed">{{ $property->description }}</p>
                    </div>
                    <div class="p-6 bg-gray-50 dark:bg-gray-900 border-t border-gray-200 dark:border-gray-600 mt-4">
                        <a href="{{ route('dashboard') }}" class="text-blue-500 hover:text-blue-800">Back to Dashboard</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
