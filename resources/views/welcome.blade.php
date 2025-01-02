<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Front Liner Campus Community</title>
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased dark:bg-black dark:text-white/50">
    <!-- Navigation -->
    <nav class="bg-white dark:bg-black border-b border-gray-100 dark:border-gray-700">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex">
                    <!-- Logo -->
                    <div class="flex-shrink-0 flex items-center">
                        <a href="{{ route('welcome') }}" class="text-violet-400 font-bold text-xl">
                            FLCC
                        </a>
                    </div>

                    <!-- Navigation Links -->
                    <div class="hidden space-x-8 sm:flex sm:ml-10">
                        <a href="{{ route('dashboard') }}" class="inline-flex items-center px-1 pt-1 text-sm font-medium {{ request()->routeIs('dashboard') ? 'text-violet-400' : 'text-gray-500' }}">
                            Dashboard
                        </a>    
                        <a href="{{ route('events') }}" class="inline-flex items-center px-1 pt-1 text-sm font-medium {{ request()->routeIs('events*') ? 'text-violet-400' : 'text-gray-500' }}">
                            Events
                        </a>
                        <a href="{{ route('ministry') }}" class="inline-flex items-center px-1 pt-1 text-sm font-medium {{ request()->routeIs('ministry*') ? 'text-violet-400' : 'text-gray-500' }}">
                            Ministry
                        </a>
                    </div>
                </div>

                <!-- Authentication -->
                <div class="flex items-center">
                    <!-- Welcome Message -->
                    <!-- <p class="text-sm text-gray-500 mr-4">Welcome, {{ auth()->check() ? auth()->user()->name : 'Guest' }}</p> -->

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
    <div class="bg-gray-50 dark:bg-black">
        <!-- Video Section -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <div class="mb-12 rounded-lg overflow-hidden aspect-video">
                <iframe class="w-full h-full"
                    src="https://www.youtube.com/embed/Fg0Tn_v8gJ0?autoplay=1"
                    frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen>
                </iframe>
            </div>

            <!-- Vision & Mission -->
            <div class="mb-12 text-center max-w-4xl mx-auto">
                <div class="mb-8">
                    <h2 class="text-3xl font-semibold mb-4">Our Vision</h2>
                    <p class="text-gray-600 dark:text-gray-400">
                        Transforming communities, raising next generation of leaders.
                    </p>
                </div>
                <div>
                    <h2 class="text-3xl font-semibold mb-4">Our Mission</h2>
                    <p class="text-gray-600 dark:text-gray-400">
                        An assembly of next generation and discipling next generation to experience God and find their calling so they can transform and influence their communities through kingdom values.
                    </p>
                </div>
            </div>

            <!-- News Section -->
            <div class="mb-12">
                <div class="flex justify-between items-center mb-8">
                    <h2 class="text-3xl font-bold text-gray-900 dark:text-white">FLCC's NEWS</h2>
                    <a href="{{ route('news') }}" class="text-violet-400 hover:text-violet-500">View All News ></a>
                </div>

                <div class="relative">
                    <div class="flex overflow-x-auto space-x-6 pb-4 scrollbar-hide">
                        @forelse($news ?? [] as $newsItem)
                        <div class="bg-violet-400 rounded-lg p-8 min-w-[300px] aspect-video flex-shrink-0">
                            <h3 class="text-white font-bold mb-2">{{ $newsItem->title }}</h3>
                            <p class="text-white/90">{{ Str::limit($newsItem->content, 100) }}</p>
                        </div>
                        @empty
                        <div class="bg-transparent rounded-lg p-8 min-w-[300px] aspect-video flex items-center justify-center text-white flex-shrink-0">
                            No news available
                        </div>

                        @endforelse
                    </div>
                </div>
            </div>

            <!-- Pastors Section -->
            <div class="mb-12">
                <div class="grid md:grid-cols-2 gap-8">
                    <!-- Our Associate Youth Pastor -->
                    <div>
                        <div class="text-center mb-8">
                            <h2 class="text-2xl font-bold mb-2">Our Associate Youth Pastor</h2>
                            <h3 class="text-xl">Stephanie Fenuela</h3>
                        </div>
                        <div class="max-w-md mx-auto rounded-lg aspect-square overflow-hidden">
                            <img src="{{ asset('storage/photos/stephanie_fenuela.jpg') }}" alt="Stephanie Fenuela" class="w-full h-full object-cover">


                        </div>
                    </div>

                    <!-- Our Youth Pastor -->
                    <div>
                        <div class="text-center mb-8">
                            <h2 class="text-2xl font-bold mb-2">Our Youth Pastor</h2>
                            <h3 class="text-xl">Joshua Hezer</h3>
                        </div>
                        <div class="max-w-md mx-auto rounded-lg aspect-square overflow-hidden">
                            <img src="{{ asset('storage/photos/Joshua_hezer.jpg') }}" alt="Joshua Hezer" class="w-full h-full object-cover">
                        </div>
                    </div>
                </div>
            </div>

            <!-- More About Us Button -->

            <div class="text-center">
                <a href="{{ route('about') }}" class="text-violet-400 hover:text-violet-500 text-2xl font-bold">
                    Discover More About Us
                </a>

            </div>



        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-white dark:bg-black border-t border-gray-200 dark:border-gray-700">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div>
                    <h4 class="font-semibold mb-4">Contact Us</h4>
                </div>
                <div>
                    <h4 class="font-semibold mb-4">Service Times</h4>
                </div>
                <div>
                    <h4 class="font-semibold mb-4">Follow Us</h4>
                </div>
            </div>
        </div>
    </footer>
</body>

</html>