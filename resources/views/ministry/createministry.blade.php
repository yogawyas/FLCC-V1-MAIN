<!-- resources/views/ministry/index.blade.php -->
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ministry Department - Front Liner Campus Community</title>
    <link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&family=Montserrat&family=Libre+Baskerville&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/css/ministry.css', 'resources/js/app.js'])
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="font-sans antialiased">
    <!-- [Previous navigation code remains the same] -->
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

    <div class="container">
        <h1 class="text-4xl font-bold mb-2">Add New Ministry</h1>

        <form action="{{ route('ministry.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label" style="color: white;">Ministry Name</label>
                <input type="text" class="form-control" id="name" name="name" required style="width: 100%; padding: 10px; font-size: 16px;">
            </div>

            <div class="mb-3">
                <label for="description" class="form-label" style="color: white;">Description</label>
                <input type="text" class="form-control" id="description" name="description" required style="width: 100%; padding: 10px; font-size: 16px;">
            </div>

            <div class="mb-3">
                <label for="image" class="form-label" style="color: white;">Ministry Image</label>
                <input type="file" id="image" name="image" class="form-control" style="width: 100%; padding: 10px; font-size: 16px;">
            </div>

            <div class="mb-3">
                <label for="meeting_time" class="form-label" style="color: white;">Meeting Time</label>
                <input type="datetime-local" class="form-control" id="meeting_time" name="meeting_time" required style="width: 100%; padding: 10px; font-size: 16px;">
            </div>

            <div class="mb-3">
                <label for="location" class="form-label" style="color: white;">Location</label>
                <input type="text" class="form-control" id="location" name="location" required style="width: 100%; padding: 10px; font-size: 16px;">
            </div>

            <div class="mb-3">
                <label for="status" class="form-label" style="color: white;">Status</label>
                <select class="form-select" id="status" name="status" required style="width: 100%; padding: 10px; font-size: 16px;">
                    <option value="open">Open</option>
                    <option value="closed">Closed</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="slots" class="form-label" style="color: white;">Slots</label>
                <input type="number" class="form-control" id="slots" name="total_slots" min="1" required style="width: 100%; padding: 10px; font-size: 16px;">
            </div>

            <div class="card p-3 mt-4 shadow bg-dark">
                <div class="d-flex justify-content-between">
                    <!-- Tombol Save -->
                    <button type="submit" class="btn btn-success text-white px-4 py-2">
                        <i class="fas fa-save"></i> Save
                    </button>

                    <!-- Tombol Cancel -->
                    <a href="{{ route('ministry') }}" class="btn btn-secondary text-white px-4 py-2">
                        <i class="fas fa-times"></i> Cancel
                    </a>
                </div>
            </div>



        </form>
    </div>

</body>

</html>