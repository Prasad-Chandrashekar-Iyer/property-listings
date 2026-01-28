@extends('layouts.admin')

@section('header')
    <h1 class="text-2xl font-bold text-white">Manage Properties</h1>
@endsection

@section('content')
    <div class="container mx-auto p-4">
        <div class="mb-4">
            <a href="{{ route('admin.properties.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Create New Property
            </a>
        </div>

        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif

        <div class="bg-gray-800 shadow-md rounded-lg overflow-x-auto">
            <table class="min-w-full">
                <thead class="bg-gray-700 text-gray-300">
                    <tr>
                        <th class="w-1/4 py-3 px-4 uppercase font-semibold text-sm">Title</th>
                        <th class="w-1/4 py-3 px-4 uppercase font-semibold text-sm">Price</th>
                        <th class="w-1/4 py-3 px-4 uppercase font-semibold text-sm">Type</th>
                        <th class="w-1/4 py-3 px-4 uppercase font-semibold text-sm">Status</th>
                        <th class="py-3 px-4 uppercase font-semibold text-sm">Actions</th>
                    </tr>
                </thead>
                <tbody class="text-gray-400">
                    @forelse ($properties as $property)
                        <tr class="border-b border-gray-700">
                            <td class="w-1/4 py-3 px-4">{{ $property->title }}</td>
                            <td class="w-1/4 py-3 px-4">${{ number_format($property->price, 2) }}</td>
                            <td class="w-1/4 py-3 px-4">{{ $property->type }}</td>
                            <td class="w-1/4 py-3 px-4">
                                <span class="{{ $property->status == 'Available' ? 'bg-green-500 text-white' : 'bg-red-500 text-white' }} py-1 px-3 rounded-full text-xs">
                                    {{ $property->status }}
                                </span>
                            </td>
                            <td class="py-3 px-4">
                                <a href="{{ route('admin.properties.edit', $property) }}" class="text-blue-400 hover:text-blue-600">Edit</a>
                                <form action="{{ route('admin.properties.destroy', $property) }}" method="POST" class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-400 hover:text-red-600 ml-2" onclick="return confirm('Are you sure you want to delete this property?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center py-4">No properties found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="mt-4">
            {{ $properties->links() }}
        </div>
    </div>
@endsection
