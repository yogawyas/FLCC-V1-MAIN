<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Front Liner Campus Community</title>
    <link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/css/welcome.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
    <!-- Navigation -->
    <nav class="header-nav border-b">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex">
                    <!-- Logo -->
                    <div class="flex-shrink-0 flex items-center">
                        <a href="{{ route('dashboard') }}" class="flcc font-bold text-xl">
                            FLCC
                        </a>
                    </div>

                    <!-- Navigation Links -->
                    <div class="header hidden space-x-8 sm:flex sm:ml-10">
                        <a href="{{ route('dashboard') }}" class="inline-flex items-center px-1 pt-1 text-sm font-medium {{ request()->routeIs('dashboard') ? 'text-violet-400' : 'text-gray-500' }}">
                            Dashboard
                        </a>
                        <a href="{{ route('events') }}" class="inline-flex items-center px-1 pt-1 text-sm font-medium {{ request()->routeIs('events*') ? 'text-violet-400' : 'text-gray-500' }}">
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
                    <!-- Welcome Message -->
                    <!-- <p class="text-sm text-gray-500 mr-4">Welcome, {{ auth()->check() ? auth()->user()->name : 'Guest' }}</p> -->

                    @auth
                    <div class="flex items-center space-x-4">
                        <button class="user flex items-center text-sm font-medium 0 focus:outline-none transition duration-150 ease-in-out">
                            {{ Auth::user()->name }}
                        </button>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="logout text-sm ml-4">
                                Logout
                            </button>
                        </form>
                    </div>
                    @else
                    <a href="{{ route('register') }}" class="regis">Register</a>
                    <a href="{{ route('login') }}" class="login ml-4">Login</a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div id="welcome">
        <!-- Video Section -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <div class="mb-12 rounded-lg overflow-hidden aspect-video" data-aos="fade-up" data-aos-duration="1000">
                <iframe class="w-full h-full"
                    src="https://www.youtube.com/embed/Fg0Tn_v8gJ0?autoplay=1"
                    frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen>
                </iframe>
            </div>

            <!-- Vision & Mission -->
            <div class="vm flex justify-between mb-12 max-w-7xl mx-auto" data-aos="fade-up" data-aos-duration="1000">
                <div class="mb-8">
                    <h2 class="text-gray-400 text-xl font-semibold mb-4">Our Vision</h2>
                    <p class="v text-2xl">
                        Transforming communities, raising next generation of leaders.
                    </p>
                </div>
                <div>
                    <h2 class="text-gray-400 text-xl font-semibold mb-4">Our Mission</h2>
                    <p class="text-2xl">
                        An assembly of next generation and discipling next generation to experience God and find their calling so they can transform and influence their communities through kingdom values.
                    </p>
                </div>
            </div>

            <!-- News Section -->
            <div class="mb-12">
                <div class="flex justify-between items-center mb-8" data-aos="fade-up-right" data-aos-duration="1500">
                    <h2 class="text-3xl font-bold text-white">FLCC's NEWS</h2>
                    <a href="{{ route('news') }}" class="news">View All News ></a>
                </div>

                <div class="relative" data-aos="fade-up" data-aos-duration="1500">
                    <div class="flex overflow-x-auto space-x-6 pb-4 scrollbar-hide">
                        @forelse($news ?? [] as $newsItem)
                        <div class="bg-violet-400 rounded-lg p-8 min-w-[300px] aspect-video flex-shrink-0">
                            <h3 class="text-white font-bold mb-2">{{ $newsItem->title }}</h3>
                            <p class="text-white/90">{{ Str::limit($newsItem->content, 100) }}</p>
                        </div>
                        @empty
                        <div class="overflow-hidden">
                            <div
                                data-aos="fade-up"
                                data-aos-duration="1500"
                                class="overflow-hidden bg-transparent rounded-lg p-8 min-w-[300px] aspect-video flex items-center justify-center text-white text-center truncate flex-shrink-0">
                                No news available
                            </div>
                        </div>


                        @endforelse
                    </div>
                </div>
            </div>

            <!-- Pastors Section -->
            <div class="mb-12">
                <div class="text-gray-400 grid md:grid-cols-2 gap-8">
                    <!-- Our Associate Youth Pastor -->
                    <!-- <div>
                        <div class="text-center mb-8" data-aos="fade-right" data-aos-duration="1500">
                            <h2 class="text-2xl font-bold mb-2">Our Associate Youth Pastor</h2>
                            <h3 class="text-xl">Stephanie Fenuela</h3>
                        </div>
                        <div class="max-w-md mx-auto rounded-lg aspect-square overflow-hidden" data-aos="fade-up-right" data-aos-duration="1500">
                            <img src="{{ asset('storage/photos/stephanie_fenuela.jpg') }}" alt="Stephanie Fenuela" class="w-full h-full object-cover">


                        </div>
                    </div> -->

                    <!-- Our Youth Pastor -->
                    <div>
                        <div class="text-center mb-8" data-aos="fade-right" data-aos-duration="1500">
                            <h2 class="text-2xl font-bold mb-2">Our Youth Pastor</h2>
                            <h3 class="text-xl">Joshua Hezer</h3>
                        </div>
                        <div class="max-w-md mx-auto rounded-lg aspect-square overflow-hidden" data-aos="fade-up-right" data-aos-duration="1500">
                            <img src="{{ asset('storage/photos/Joshua_hezer.jpg') }}" alt="Joshua Hezer" class="w-full h-full object-cover">
                        </div>
                    </div>
                </div>
            </div>

            <!-- More About Us Button -->

            <div class="text-center" data-aos="fade-up" data-aos-duration="1000">
                <a href="{{ route('about') }}" class="us text-2xl font-bold">
                    Discover More About Us
                </a>

            </div>



        </div>
    </div>

    <!-- Footer -->
    <footer class="footer">
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

    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>

</html>