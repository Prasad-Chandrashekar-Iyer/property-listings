@extends('layouts.admin')

@section('header')
    <h1 class="text-2xl font-bold text-white">{{ $property->title }}</h1>
@endsection

@section('content')
    <div class="container mx-auto p-4 text-gray-300">
        <div class="bg-gray-800 rounded-lg shadow-md overflow-hidden">
            <img src="{{ asset('storage/' . $property->image) }}" alt="{{ $property->title }}" class="w-full h-96 object-cover">
            <div class="p-6">
                <h1 class="text-3xl font-bold mb-2">{{ $property->title }}</h1>
                <p class="text-2xl font-semibold mb-4 text-green-400">${{ number_format($property->price, 2) }}</p>
                <div class="flex items-center mb-4">
                    <span class="text-gray-400 mr-2">{{ $property->location }}</span>
                    <span class="{{ $property->status == 'Available' ? 'bg-green-500 text-white' : 'bg-red-500 text-white' }} py-1 px-3 rounded-full text-xs">
                        {{ $property->status }}
                    </span>
                </div>
                <div class="mb-4">
                    <span class="inline-block bg-gray-700 rounded-full px-3 py-1 text-sm font-semibold mr-2 mb-2">#{{ $property->type }}</span>
                </div>
                <p class="leading-relaxed">{{ $property->description }}</p>
            </div>
            <div class="p-6 bg-gray-700 border-t border-gray-600">
                <a href="{{ route('admin.properties.index') }}" class="text-blue-400 hover:text-blue-600">Back to Admin Listings</a>
            </div>
        </div>
    </div>
@endsection
