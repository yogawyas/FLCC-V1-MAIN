<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Front Liner Campus Community</title>
    <link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&family=Montserrat&family=Libre+Baskerville&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/css/welcome.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
    <!-- Navigation -->
    <nav class="header-nav border-b">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16 items-center">
                <!-- Logo and Toggle Button -->
                <div class="flex items-center justify-between w-full md:w-auto">
                    <!-- Logo -->
                    <div class="flex-shrink-0">
                        <a href="{{ route('dashboard') }}" class="flcc font-bold text-xl">
                            FLCC
                        </a>
                    </div>
                    <button id="menu-toggle" class="md:hidden flex items-center px-2 py-1 border rounded-md text-gray-500 hover:text-gray-700 focus:outline-none">
                        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>

                <!-- Desktop Navigation -->
                <div class="nav-des uppercase hidden md:flex md:items-center md:ml-10">
                    <div class="header xl:space-x-8 lg:space-x-8 md:space-x-4 me-8">
                        <a href="{{ route('dashboard') }}" class="inline-flex items-center px-1 pt-1 text-sm font-medium {{ request()->routeIs('dashboard') ? 'text-violet-400' : 'text-gray-500' }}">
                            Dashboard
                        </a>
                        <a href="{{ route('events') }}" class="inline-flex items-center px-1 pt-1 text-sm font-medium {{ request()->routeIs('events*') ? 'text-violet-400' : 'text-gray-500' }}">
                            Events
                        </a>
                        <a href="{{ route('ministry') }}" class="inline-flex items-center px-1 pt-1 text-sm font-medium {{ request()->routeIs('ministry*') ? 'text-violet-400' : 'text-gray-500' }}">
                            Ministry
                        </a>
                        <a href="{{ route('about') }}" class="inline-flex items-center px-1 pt-1 text-sm font-medium {{ request()->routeIs('about*') ? 'text-violet-400' : 'text-gray-500' }}">
                            About Us
                        </a>
                    </div>
                    @auth
                    <div class="flex items-center space-x-4">
                        <button class="user flex items-center text-sm font-medium focus:outline-none">
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

            <div id="mobile-menu" class="hidden flex flex-col space-y-2 mt-4 md:hidden">
                <a href="{{ route('dashboard') }}" class="block text-sm font-medium {{ request()->routeIs('dashboard') ? 'text-violet-400' : 'text-gray-500' }}">
                    Dashboard
                </a>
                <a href="{{ route('events') }}" class="block text-sm font-medium {{ request()->routeIs('events*') ? 'text-violet-400' : 'text-gray-500' }}">
                    Events
                </a>
                <a href="{{ route('ministry') }}" class="block text-sm font-medium {{ request()->routeIs('ministry*') ? 'text-violet-400' : 'text-gray-500' }}">
                    Ministry
                </a>
                <a href="{{ route('about') }}" class="block text-sm font-medium {{ request()->routeIs('about*') ? 'text-violet-400' : 'text-gray-500' }}">
                    About Us
                </a>
                @auth
                <button class="user text-sm font-medium">{{ Auth::user()->name }}</button>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="logout text-sm">Logout</button>
                </form>
                @else
                <a href="{{ route('register') }}" class="regis text-sm">Register</a>
                <a href="{{ route('login') }}" class="login text-sm">Login</a>
                @endauth
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div id="welcome">
        <!-- Video Section -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <div class="title mb-12 rounded-lg overflow-hidden aspect-video">
                <h1 class="xl:text-7xl lg:text-6xl md:text-5xl sm:text-4xl text-center mb-2" data-aos="fade-down" data-aos-duration="1000">Front Liner Campus Community</h1>
                <iframe class="w-full h-screen xl:w-full xl:h-full"
                    src="https://www.youtube.com/embed/Fg0Tn_v8gJ0?autoplay=1"
                    frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen data-aos="fade-up" data-aos-duration="1000">
                </iframe>
            </div>

            <!-- News Section -->
            <div class="mb-12">
                <div class="news flex justify-between items-center mb-8" data-aos="fade-up-right" data-aos-duration="1500">
                    <h2 class="text-5xl font-bold text-white">FLCC's News</h2>
                    <a href="{{ route('news') }}" class="news-v">View All News <i class="fa-solid fa-arrow-right"></i></a>
                </div>

                <div class="relative" data-aos="fade-up" data-aos-duration="1500">
                    <div class="flex overflow-x-auto space-x-6 pb-4">
                        @forelse($news ?? [] as $newsItem)
                        <div class="new rounded-lg p-8 flex-shrink-0">
                            <h3 class="text-3xl font-bold mb-2">{{ $newsItem->title }}</h3>
                            <p class="text-lg">{{ Str::limit($newsItem->content, 100) }}</p>
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
                <div class="pastor flex relative sm:max-w-2xl md:max-w-3xl lg:max-w-4xl max-w-4xl w-lg">
                    <div data-aos="fade-up-right" data-aos-duration="1500">
                        <img src="{{ asset('images/pastor/p-joshuahezer.png') }}" alt="Joshua Hezer" class="foto sm:max-w-md md:max-w-xl h-full object-cover">
                    </div>
                    <div class="nama absolute" data-aos="fade-right" data-aos-duration="1500">
                        <h2 class="sm:text-5xl md:text-6xl lg:text-7xl text-7xl mb-2">Joshua Hezer</h2>
                        <h3 class="sm:text-lg md:text-xl text-2xl font-bold mb-2">Our Youth Pastor</h3>
                    </div>
                </div>
            </div>

            <!-- Vision & Mission -->
            <div class="vm grid gap-5 mb-12 max-w-7xl mx-auto md:grid-cols-2" data-aos="fade-up" data-aos-duration="1000">
                <div class="my-5">
                    <h2 class="text-base md:text-lg lg:text-xl font-semibold mb-4">Our Vision</h2>
                    <p class="v text-lg md:text-xl lg:text-2xl">
                        Transforming communities, raising next generation of leaders.
                    </p>
                </div>
                <div>
                    <h2 class="text-base md:text-lg lg:text-xl font-semibold mb-4">Our Mission</h2>
                    <p class="v text-lg md:text-xl lg:text-2xl">
                        An assembly of next generation and discipling next generation to experience God and find their calling so they can transform and influence their communities through kingdom values.
                    </p>
                </div>
            </div>

            <!-- More About Us Button -->

            <div class="text-center mt-4" data-aos="fade-up" data-aos-duration="1000">
                <a href="{{ route('about') }}" class="us text-md sm:text-xl lg:text-2xl font-bold">
                    Discover More About Us
                </a>

            </div>



        </div>
    </div>

    <!-- Footer -->
    <footer class="footer">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 lg:pt-8 pb-3 text-sm lg:text-base xl:text-base">
            <div class="footer-g grid grid-cols-1 md:grid-cols-4 sm:grid-cols-3 gap-8 pb-3">
                <!-- <div>
                    <h4 class="font-semibold mb-4">Contact Us</h4>

                </div> -->
                <div class="footer-flcc">
                    <h4 class="font-semibold mb-4">FLCC</h4>
                    <a href="{{ route('dashboard') }}" class=" px-1 pt-1 font-medium {{ request()->routeIs('dashboard')}}">
                        Dashboard
                    </a><br>
                    <a href="{{ route('events') }}" class=" px-1 pt-1 font-medium {{ request()->routeIs('events*')}}">
                        Events
                    </a><br>
                    <a href="{{ route('ministry') }}" class=" px-1 pt-1 font-medium {{ request()->routeIs('ministry*')}}">
                        Ministry
                    </a><br>
                    <a href="{{ route('about') }}" class=" px-1 pt-1 font-medium {{ request()->routeIs('about*')}}">
                        About Us
                    </a><br>
                </div>
                <div class="footer-serv">
                    <h4 class="font-semibold mb-4">Service Times</h4>
                    <p>Every Sunday 09:00</p>
                    <p>Every Sunday 11:00</p>
                </div>
                <div class="footer-sosial">
                    <h4 class="font-semibold mb-4">Follow Us</h4>
                    <a href="https://www.instagram.com/frontlinercampus?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw==" target="_blank">
                        <i class="fa-brands fa-instagram"></i>
                    </a>
                    <a href="https://youtube.com/@frontlinercampus?si=rCnPNI-DCyTTB_Qr" target="_blank">
                        <i class="fa-brands fa-youtube"></i>
                    </a>
                </div>
                <div class="footer-loc flex items-center space-x-4">
                    <i class="fa-solid fa-location-dot"></i>
                    <p class="text-white">Ruko Golden Boulevard, Blok U No.6, Lt.3, Tangerang 15310</p>
                </div>
            </div>
            <p class="cp mt-3">&copy; 2025 Front Liner Campus Community. All rights reserved.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script>
        AOS.init();

        document.getElementById('menu-toggle').addEventListener('click', function() {
            const menu = document.getElementById('mobile-menu');
            menu.classList.toggle('hidden');
        });
    </script>
</body>

</html>