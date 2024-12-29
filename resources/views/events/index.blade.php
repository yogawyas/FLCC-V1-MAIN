<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Events - Front Liner Campus Community</title>
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-gray-50 dark:bg-black">
    <!-- Navigation -->
    <nav class="bg-white dark:bg-black border-b border-gray-100 dark:border-gray-700">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex">
                    <!-- Logo -->
                    <div class="flex-shrink-0 flex items-center">
                        <a href="{{ route('dashboard') }}" class="text-violet-400 font-bold text-xl">
                            FLCC
                        </a>
                    </div>

                    <!-- Navigation Links -->
                    <div class="hidden space-x-8 sm:flex sm:ml-10">
                        <a href="{{ route('dashboard') }}" class="inline-flex items-center px-1 pt-1 text-sm font-medium {{ request()->routeIs('dashboard*') ? 'text-violet-400' : 'text-gray-500' }}">
                            Dashboard
                        </a>
                        <a href="{{ route('events') }}" class="inline-flex items-center px-1 pt-1 text-sm font-medium {{ request()->routeIs('events') ? 'text-violet-400' : 'text-gray-500' }}">
                            Events
                        </a>
                        <a href="{{ route('ministry') }}" class="inline-flex items-center px-1 pt-1 text-sm font-medium {{ request()->routeIs('ministry*') ? 'text-violet-400' : 'text-gray-500' }}">
                            Ministry
                        </a>
                    </div>
                </div>

                <!-- Authentication -->
                <div class="flex items-center">
                    @auth
                    <div class="relative">
                        <button class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 focus:outline-none transition duration-150 ease-in-out">
                            {{ Auth::user()->name }}
                        </button>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="text-sm text-gray-500 hover:text-gray-700 ml-4">
                                Logout
                            </button>
                        </form>
                    </div>
                    @else
                    <a href="{{ route('login') }}" class="text-sm text-gray-500 hover:text-gray-700">Login</a>
                    <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-500 hover:text-gray-700">Register</a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Available Events Section -->
            <section class="mb-12">
                <h2 class="text-3xl font-bold mb-8 text-gray-900 dark:text-white">Available Events</h2>
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @forelse($availableEvents as $event)
                    <div class="bg-white rounded-lg overflow-hidden shadow">
                        <div class="bg-violet-400 aspect-video flex items-center justify-center text-white">
                            @if($event->image)
                                <img src="{{ asset('storage/' . $event->image) }}" 
                                     alt="{{ $event->title }}" 
                                     class="w-full h-full object-cover">
                            @else
                                <span class="text-lg">{{ $event->title }}</span>
                            @endif
                        </div>
                        <div class="p-6">
                            <h3 class="text-xl font-bold mb-2 text-gray-900">{{ $event->title }}</h3>
                            <p class="text-gray-600 mb-4">{{ $event->description }}</p>
                            <div class="flex justify-between items-center">
                                <div>
                                    <p class="text-sm text-gray-500">
                                        {{ \Carbon\Carbon::parse($event->date)->format('F j, Y - g:i A') }}
                                    </p>
                                    <p class="text-sm text-gray-500">{{ $event->location }}</p>
                                </div>
                                <button class="bg-violet-400 text-white px-4 py-2 rounded hover:bg-violet-500 transition-colors">
                                    Sign Up
                                </button>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="col-span-full text-center py-8">
                        <p class="text-gray-600">No available events at the moment.</p>
                    </div>
                    @endforelse
                </div>
            </section>

            <!-- Previous Events Section -->
            <section>
                <h2 class="text-3xl font-bold mb-8 text-gray-900 dark:text-white">Previous Events</h2>
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @forelse($previousEvents as $event)
                    <div class="bg-white rounded-lg overflow-hidden shadow opacity-75">
                        <div class="bg-violet-400 aspect-video flex items-center justify-center text-white">
                            @if($event->image)
                                <img src="{{ asset('storage/' . $event->image) }}" 
                                     alt="{{ $event->title }}" 
                                     class="w-full h-full object-cover">
                            @else
                                <span class="text-lg">{{ $event->title }}</span>
                            @endif
                        </div>
                        <div class="p-6">
                            <h3 class="text-xl font-bold mb-2 text-gray-900">{{ $event->title }}</h3>
                            <p class="text-gray-600 mb-4">{{ $event->description }}</p>
                            <p class="text-sm text-gray-500">
                                {{ \Carbon\Carbon::parse($event->date)->format('F j, Y - g:i A') }}
                            </p>
                            <p class="text-sm text-gray-500">{{ $event->location }}</p>
                        </div>
                    </div>
                    @empty
                    <div class="col-span-full text-center py-8">
                        <p class="text-gray-600">No previous events to show.</p>
                    </div>
                    @endforelse
                </div>
            </section>
        </div>
    </main>
</body>
</html>