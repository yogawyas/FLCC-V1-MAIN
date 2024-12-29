<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin - @yield('title') - FLCC</title>
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-gray-50 dark:bg-black">
    <!-- Admin Navigation -->
    <nav class="bg-white dark:bg-black border-b border-gray-100 dark:border-gray-700">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex">
                    <!-- Logo -->
                    <div class="flex-shrink-0 flex items-center">
                        <a href="{{ route('admin.dashboard') }}" class="text-violet-400 font-bold text-xl">
                            FLCC Admin
                        </a>
                    </div>

                    <!-- Navigation Links -->
                    <div class="hidden space-x-8 sm:flex sm:ml-10">
                        <a href="{{ route('admin.dashboard') }}" 
                           class="inline-flex items-center px-1 pt-1 text-sm font-medium {{ request()->routeIs('admin.dashboard') ? 'text-violet-400' : 'text-gray-500' }}">
                            Dashboard
                        </a>
                        <a href="{{ route('admin.events.index') }}"
                           class="inline-flex items-center px-1 pt-1 text-sm font-medium {{ request()->routeIs('admin.events.*') ? 'text-violet-400' : 'text-gray-500' }}">
                            Events
                        </a>
                        <a href="{{ route('admin.ministries.index') }}"
                           class="inline-flex items-center px-1 pt-1 text-sm font-medium {{ request()->routeIs('admin.ministries.*') ? 'text-violet-400' : 'text-gray-500' }}">
                            Ministries
                        </a>
                        <a href="{{ route('admin.news.index') }}"
                           class="inline-flex items-center px-1 pt-1 text-sm font-medium {{ request()->routeIs('admin.news.*') ? 'text-violet-400' : 'text-gray-500' }}">
                            News
                        </a>
                    </div>
                </div>

                <!-- Authentication -->
                <div class="flex items-center">
                    <span class="text-sm text-gray-500 mr-4">{{ Auth::guard('admin')->user()->name }}</span> <!-- Menggunakan auth:admin -->
                    <form method="POST" action="{{ route('admin.logout') }}">
                        @csrf
                        <button type="submit" class="text-sm text-gray-500 hover:text-gray-700">
                            Logout
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <!-- Page Content -->
    <main class="py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Success Message -->
            @if(session('success'))
                <div class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Error Message -->
            @if(session('error'))
                <div class="mb-4 p-4 bg-red-100 border border-red-400 text-red-700 rounded">
                    {{ session('error') }}
                </div>
            @endif

            <!-- Page Content -->
            @yield('content')
        </div>
    </main>
</body>
</html>
