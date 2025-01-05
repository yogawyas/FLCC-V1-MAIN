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
    @vite(['resources/css/app.css', 'resources/css/about.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
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
                </div>

                <!-- Authentication -->
                <div class="flex items-center">
                    <!-- Welcome Message -->
                    <!-- <p class="text-sm text-gray-500 mr-4">Welcome, {{ auth()->check() ? auth()->user()->name : 'Guest' }}</p> -->

                    @auth
                    <div class="flex items-center space-x-4">
                        <button class="user flex items-center text-sm font-medium focus:outline-none transition duration-150 ease-in-out">
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
    <div class="about">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <div class="text-center">
                <h1 class="text-4xl font-bold text-violet-500 mb-4" data-aos="fade-up" data-aos-duration="1500">More About Us</h1>
                <p class="text-gray-700 text-lg" data-aos="fade-up" data-aos-duration="1500">
                    Welcome to our platform! We are dedicated to providing the best services to our users.
                    Learn more about our mission, vision, and the values that drive us to excel every day.
                </p>

                <!-- Tampilkan informasi lebih lanjut -->
                <div class="mt-6" data-aos="fade-up" data-aos-duration="1500">
                    <h2 class="text-3xl font-semibold text-gray-800">Our Recent Events</h2>
                    <p class="text-gray-600 mt-4">
                        Learn more about our latest events and activities.
                    </p>
                    <!-- Event list -->
                    <div class="mt-6">
                        <ul>
                            @forelse($events as $event)
                            <li><a href="{{ route('events') }}">{{ $event->title }}</a></li>
                            @empty
                            @endforelse
                        </ul>
                    </div>
                </div>

                <!-- Ministry Section -->
                <div class="mt-6" data-aos="fade-up" data-aos-duration="1500">
                    <h2 class="text-3xl font-semibold text-gray-800">Our Ministry</h2>
                    <p class="text-gray-600 mt-4">
                        Explore the different ministries we offer to the community.
                    </p>
                    <div class="mt-6">
                        <ul>
                            @forelse($ministries as $ministry)
                            <li><a href="{{ route('ministry') }}">{{ $ministry->name }}</a></li>
                            @empty
                            @endforelse
                        </ul>
                    </div>
                </div>

                <!-- News Section -->
                <div class="mt-6" data-aos="fade-up" data-aos-duration="1500">
                    <h2 class="text-3xl font-semibold text-gray-800">Latest News</h2>
                    <p class="text-gray-600 mt-4">
                        Stay updated with the latest news and announcements from our platform.
                    </p>
                    <div class="mt-6">
                        <ul>
                            @forelse($news as $new)
                            <li><a href="{{ route('news') }}">{{ $new->title }}</a></li>
                            @empty
                            @endforelse
                        </ul>
                    </div>
                </div>

                <!-- Back to Home Button -->
                <div class="back mt-8" data-aos="fade-up" data-aos-duration="1500">
                    <a href="{{ route('welcome') }}" class="text-2xl font-bold">
                        Back to Main Page
                    </a>
                </div>
            </div>
        </div>
    </div>


    <!-- Footer -->
    <footer class="footer">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <!-- <div>
                    <h4 class="font-semibold mb-4">Contact Us</h4>

                </div> -->
                <div>
                    <h4 class="font-semibold mb-4">Service Times</h4>
                    <p>Every Sunday 09:00</p>
                    <p>Every Sunday 11:00</p>
                </div>
                <div>
                    <h4 class="font-semibold mb-4">Follow Us</h4>
                    <a href="https://www.instagram.com/frontlinercampus?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw==" target="_blank">
                        <i class="fa-brands fa-instagram"></i>
                    </a>
                    <a href="https://youtube.com/@frontlinercampus?si=rCnPNI-DCyTTB_Qr" target="_blank">
                        <i class="fa-brands fa-youtube"></i>
                    </a>
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