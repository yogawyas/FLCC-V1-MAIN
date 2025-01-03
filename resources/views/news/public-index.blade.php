<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>News - Front Liner Campus Community</title>
    <link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/css/news.css', 'resources/js/app.js'])
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="font-sans antialiased">
    <!-- [Previous navigation code remains the same] -->
    <!-- Navigation -->
    <nav class="header-nav">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex">
                    <!-- Logo -->
                    <div class="flex-shrink-0 flex items-center">
                        <a href="{{ route('welcome') }}" class="flcc font-bold text-xl">
                            FLCC
                        </a>
                    </div>

                    <!-- Navigation Links -->
                    <div class="header hidden space-x-8 sm:flex sm:ml-10">
                        <a href="{{ route('dashboard') }}" class="inline-flex items-center px-1 pt-1 text-sm font-medium {{ request()->routeIs('dashboard*') ? 'text-violet-400' : 'text-gray-500' }}">
                            Dashboard
                        </a>
                        <a href="{{ route('events') }}" class="inline-flex items-center px-1 pt-1 text-sm font-medium {{ request()->routeIs('events') ? 'text-violet-400' : 'text-gray-500' }}">
                            Events
                        </a>
                        <a href="{{ route('ministry') }}" class="inline-flex items-center px-1 pt-1 text-sm font-medium {{ request()->routeIs('ministry*') ? 'text-violet-400' : 'text-gray-500' }}">
                            Ministry
                        </a>
                        <!-- <a href="{{ route('about') }}" class="inline-flex items-center px-1 pt-1 text-sm font-medium {{ request()->routeIs('about*') ? 'text-violet-400' : 'text-gray-500' }}">
                            About Us
                        </a> -->
                    </div>
                </div>

                <!-- Authentication -->
                <div class="flex items-center">
                    @auth
                    <div class="flex items-center space-x-4">
                        <span class="user text-sm">{{ Auth::user()->name }}</span>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="logout text-sm">
                                Logout
                            </button>
                        </form>
                    </div>
                    @else
                    <button class="regis"><a href="{{ route('register') }}" class="text-sm">Register</a></button>
                    <button class="login ml-4"><a href="{{ route('login') }}" class="text-sm">Login</a></button>
                    @endauth
                </div>
            </div>
        </div>
    </nav>
    <div class="news max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Available Events Section -->
        <div class="mb-12">
            <h2 class="text-3xl font-bold mb-8 text-gray-900 dark:text-white">Available News</h2>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse($allNews as $event)
                <div class="bg-white dark:bg-gray-800 rounded-lg overflow-hidden shadow">
                    @if($event->image_url)
                    <img src="{{ asset('storage/' . $event->image_url) }}" alt="{{ $event->title }}"
                        class="w-full aspect-video object-cover">
                    @else
                    <div class="bg-violet-400 aspect-video flex items-center justify-center text-white">
                        <span class="text-lg">{{ $event->title }}</span>
                    </div>
                    @endif
                    <div class="p-6">
                        <h3 class="text-xl font-semibold mb-2 text-gray-900 dark:text-white">{{ $event->title }}</h3>
                        <p class="text-gray-600 dark:text-gray-400 mb-4">{{ Str::limit($event->content, 100) }}</p>
                        
                    </div>
                </div>
                @empty
                <div class="col-span-full text-center py-8">
                    <p class="text-gray-600 dark:text-gray-400">No available news at the moment.</p>
                </div>
                @endforelse
            </div>
        </div>

    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>

</html>