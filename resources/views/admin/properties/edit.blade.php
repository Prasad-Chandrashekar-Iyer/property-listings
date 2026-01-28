@extends('layouts.admin')

@section('header')
    <h1 class="text-2xl font-bold text-white">Edit Property</h1>
@endsection

@section('content')
    <div class="container mx-auto p-4">
        @if ($errors->any())
            <div class="bg-red-200 text-red-800 p-4 rounded-lg mb-4" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.properties.update', $property) }}" method="POST" enctype="multipart/form-data" class="bg-gray-800 p-6 rounded-lg shadow-md text-gray-300">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="title" class="block font-bold mb-2">Title</label>
                <input type="text" name="title" id="title" class="bg-gray-700 border border-gray-600 rounded w-full py-2 px-3 leading-tight focus:outline-none focus:shadow-outline" value="{{ old('title', $property->title) }}" required>
            </div>
            <div class="mb-4">
                <label for="description" class="block font-bold mb-2">Description</label>
                <textarea name="description" id="description" rows="5" class="bg-gray-700 border border-gray-600 rounded w-full py-2 px-3 leading-tight focus:outline-none focus:shadow-outline" required>{{ old('description', $property->description) }}</textarea>
            </div>
            <div class="grid grid-cols-2 gap-4 mb-4">
                <div>
                    <label for="price" class="block font-bold mb-2">Price</label>
                    <input type="number" step="0.01" name="price" id="price" class="bg-gray-700 border border-gray-600 rounded w-full py-2 px-3 leading-tight focus:outline-none focus:shadow-outline" value="{{ old('price', $property->price) }}" required>
                </div>
                <div>
                    <label for="location" class="block font-bold mb-2">Location</label>
                    <input type="text" name="location" id="location" class="bg-gray-700 border border-gray-600 rounded w-full py-2 px-3 leading-tight focus:outline-none focus:shadow-outline" value="{{ old('location', $property->location) }}" required>
                </div>
            </div>
            <div class="grid grid-cols-2 gap-4 mb-4">
                <div>
                    <label for="type" class="block font-bold mb-2">Type</label>
                    <select name="type" id="type" class="bg-gray-700 border border-gray-600 rounded w-full py-2 px-3 leading-tight focus:outline-none focus:shadow-outline" required>
                        <option value="Apartment" @if(old('type', $property->type) == 'Apartment') selected @endif>Apartment</option>
                        <option value="House" @if(old('type', $property->type) == 'House') selected @endif>House</option>
                        <option value="Commercial" @if(old('type', $property->type) == 'Commercial') selected @endif>Commercial</option>
                    </select>
                </div>
                <div>
                    <label for="status" class="block font-bold mb-2">Status</label>
                    <select name="status" id="status" class="bg-gray-700 border border-gray-600 rounded w-full py-2 px-3 leading-tight focus:outline-none focus:shadow-outline" required>
                        <option value="Available" @if(old('status', $property->status) == 'Available') selected @endif>Available</option>
                        <option value="Sold" @if(old('status', $property->status) == 'Sold') selected @endif>Sold</option>
                    </select>
                </div>
            </div>
            <div class="mb-4">
                <label for="image" class="block font-bold mb-2">Image</label>
                <input type="file" name="image" id="image" class="bg-gray-700 border border-gray-600 rounded w-full py-2 px-3 leading-tight focus:outline-none focus:shadow-outline">
                @if ($property->image)
                    <div class="mt-2">
                        <img src="{{ asset('storage/' . $property->image) }}" alt="{{ $property->title }}" class="h-24 w-auto rounded">
                        <p class="text-sm text-gray-500 mt-1">Current Image</p>
                    </div>
                @endif
            </div>
            <div class="flex items-center justify-between">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Update Property
                </button>
                <a href="{{ route('admin.properties.index') }}" class="inline-block align-baseline font-bold text-sm text-blue-400 hover:text-blue-600">
                    Cancel
                </a>
            </div>
        </form>
    </div>
@endsection
