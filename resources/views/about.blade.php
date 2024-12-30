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
                        <a href="{{ route('dashboard') }}" class="text-violet-400 font-bold text-xl">
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
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="text-center">
            <h1 class="text-4xl font-bold text-violet-500 mb-4">More About Us</h1>
            <p class="text-gray-700 text-lg">
                Welcome to our platform! We are dedicated to providing the best services to our users.
                Learn more about our mission, vision, and the values that drive us to excel every day.
            </p>

            <!-- Tampilkan informasi lebih lanjut -->
            <div class="mt-6">
                <h2 class="text-3xl font-semibold text-gray-800">Our Recent Events</h2>
                <p class="text-gray-600 mt-4">
                    Learn more about our latest events and activities.
                </p>
                <!-- Event list -->
                <div class="mt-6">
                    <ul>
                        <li><a href="{{ route('events') }}" class="text-violet-600 hover:text-violet-800">Upcoming Event 1</a></li>
                        <li><a href="{{ route('events') }}" class="text-violet-600 hover:text-violet-800">Upcoming Event 2</a></li>
                        <li><a href="{{ route('events') }}" class="text-violet-600 hover:text-violet-800">Upcoming Event 3</a></li>
                    </ul>
                </div>
            </div>

            <!-- Ministry Section -->
            <div class="mt-6">
                <h2 class="text-3xl font-semibold text-gray-800">Our Ministry</h2>
                <p class="text-gray-600 mt-4">
                    Explore the different ministries we offer to the community.
                </p>
                <div class="mt-6">
                    <ul>
                        <li><a href="{{ route('ministry') }}" class="text-violet-600 hover:text-violet-800">Ministry 1</a></li>
                        <li><a href="{{ route('ministry') }}" class="text-violet-600 hover:text-violet-800">Ministry 2</a></li>
                        <li><a href="{{ route('ministry') }}" class="text-violet-600 hover:text-violet-800">Ministry 3</a></li>
                    </ul>
                </div>
            </div>

            <!-- News Section -->
            <div class="mt-6">
                <h2 class="text-3xl font-semibold text-gray-800">Latest News</h2>
                <p class="text-gray-600 mt-4">
                    Stay updated with the latest news and announcements from our platform.
                </p>
                <div class="mt-6">
                    <ul>
                        <li><a href="{{ route('news') }}" class="text-violet-600 hover:text-violet-800">News Article 1</a></li>
                        <li><a href="{{ route('news') }}" class="text-violet-600 hover:text-violet-800">News Article 2</a></li>
                        <li><a href="{{ route('news') }}" class="text-violet-600 hover:text-violet-800">News Article 3</a></li>
                    </ul>
                </div>
            </div>

            <!-- Back to Home Button -->
            <div class="mt-8">
                <a href="{{ route('welcome') }}" class="inline-block bg-violet-400 text-white px-8 py-3 rounded-lg hover:bg-violet-500 transition-colors">
                    Back to Main Page
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