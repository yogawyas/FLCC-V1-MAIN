<!-- resources/views/ministry/index.blade.php -->
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ministry Department - Front Liner Campus Community</title>
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="font-sans antialiased bg-gray-50 dark:bg-black">
    <!-- [Previous navigation code remains the same] -->
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
                    <div class="flex items-center space-x-4">
                        <span class="text-sm text-gray-500">{{ Auth::user()->name }}</span>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="text-sm text-gray-500 hover:text-gray-700">
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
                <label for="min_slots" class="form-label" style="color: white;">Minimum Slots</label>
                <input type="number" class="form-control" id="min_slots" name="min_slots" min="1" required style="width: 100%; padding: 10px; font-size: 16px;">
            </div>

            <div class="mb-3">
                <label for="max_slots" class="form-label" style="color: white;">Maximum Slots</label>
                <input type="number" class="form-control" id="max_slots" name="max_slots" min="1" required style="width: 100%; padding: 10px; font-size: 16px;">
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