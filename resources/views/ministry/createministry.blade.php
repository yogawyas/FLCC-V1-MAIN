<!-- resources/views/ministry/index.blade.php -->
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ministry Department - Front Liner Campus Community</title>
    <link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/css/ministry.css', 'resources/js/app.js'])
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="font-sans antialiased bg-gray-50 dark:bg-black">
    <!-- [Previous navigation code remains the same] -->
    <!-- Navigation -->
    <nav class="header-nav">
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
                        <a href="{{ route('about') }}" class="inline-flex items-center px-1 pt-1 text-sm font-medium {{ request()->routeIs('about*') ? 'text-violet-400' : 'text-gray-500' }}">
                            About Us
                        </a>
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






    <div class="container">
        <h1>Add New Ministry</h1>

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