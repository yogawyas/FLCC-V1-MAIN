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
    @vite(['resources/css/app.css', 'resources/css/admin.css', 'resources/js/app.js'])
</head>

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

<script>
    document.getElementById('menu-toggle').addEventListener('click', function() {
            const menu = document.getElementById('mobile-menu');
            menu.classList.toggle('hidden');
        });
</script>