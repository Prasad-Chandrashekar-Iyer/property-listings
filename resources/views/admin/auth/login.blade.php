<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - Tech2Edge</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 font-[family-name:var(--font-sans)] text-gray-900 antialiased">

    <div class="min-h-screen flex flex-col justify-center items-center pt-6 sm:pt-0">
        
        <div class="mb-6">
            <a href="/" class="flex items-center gap-2 group">
                <div class="p-2 bg-white rounded-lg shadow-sm group-hover:shadow-md transition-all duration-300">
                    <svg class="w-8 h-8 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                    </svg>
                </div>
                <span class="font-bold text-2xl text-gray-900 tracking-tight">Tech2Edge <span class="text-indigo-600">Admin</span></span>
            </a>
        </div>

        <div class="w-full max-w-md px-6 py-8 bg-white shadow-lg rounded-xl border border-gray-100">
            
            <h2 class="text-xl font-bold text-center text-gray-800 mb-6">Administrator Access</h2>

            @if (session('status'))
                <div class="mb-4 p-3 bg-green-50 text-green-700 rounded-md text-sm border border-green-200">
                    {{ session('status') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="mb-4 p-3 bg-red-50 text-red-700 rounded-md text-sm border border-red-200">
                    <div class="font-medium mb-1">{{ __('Whoops! Something went wrong.') }}</div>
                    <ul class="list-disc list-inside space-y-1">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('admin.login') }}">
                @csrf

                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email Address</label>
                    <input id="email" class="w-full px-4 py-2 bg-white border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition-all text-gray-900 placeholder-gray-400" 
                        type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username" placeholder="admin@tech2edge.com" />
                </div>

                <div class="mb-4">
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                    <input id="password" class="w-full px-4 py-2 bg-white border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition-all text-gray-900 placeholder-gray-400" 
                        type="password" name="password" required autocomplete="current-password" placeholder="••••••••" />
                </div>

                <div class="block mb-6">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                        <span class="ml-2 text-sm text-gray-600">Remember me</span>
                    </label>
                </div>

                <button type="submit" class="w-full py-2.5 px-4 border border-transparent rounded-lg shadow-sm text-sm font-semibold text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-colors">
                    Log in
                </button>
            </form>
        </div>
        
        <div class="mt-6 text-center text-sm text-gray-400">
            &copy; {{ date('Y') }} Tech2Edge Property Listings. Restricted Area.
        </div>
    </div>
</body>
</html>