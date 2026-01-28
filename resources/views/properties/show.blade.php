<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $property->title }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-4">
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <img src="{{ asset('storage/' . $property->image) }}" alt="{{ $property->title }}" class="w-full h-96 object-cover">
            <div class="p-6">
                <h1 class="text-3xl font-bold mb-2">{{ $property->title }}</h1>
                <p class="text-gray-700 text-2xl font-semibold mb-4">${{ number_format($property->price, 2) }}</p>
                <div class="flex items-center mb-4">
                    <span class="text-gray-600 mr-2">{{ $property->location }}</span>
                    <span class="{{ $property->status == 'Available' ? 'bg-green-200 text-green-800' : 'bg-red-200 text-red-800' }} py-1 px-3 rounded-full text-xs">
                        {{ $property->status }}
                    </span>
                </div>
                <div class="mb-4">
                    <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#{{ $property->type }}</span>
                </div>
                <p class="text-gray-700 leading-relaxed">{{ $property->description }}</p>
            </div>
            <div class="p-6 bg-gray-50 border-t border-gray-200">
                <a href="{{ route('properties.index') }}" class="text-blue-500 hover:text-blue-800">Back to Listings</a>
            </div>
        </div>
    </div>
</body>
</html>
