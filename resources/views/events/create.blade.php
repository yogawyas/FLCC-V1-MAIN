<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Events - Front Liner Campus Community</title>
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-gray-50 dark:bg-black">
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
    <main class="py-8">
    <h1 class="text-3xl font-bold">Create New Event</h1>

<form method="POST" action="{{ route('events.store') }}" enctype="multipart/form-data">
    @csrf

    <div class="mb-4">
        <label for="title" class="block text-sm font-medium text-gray-700">Event Title</label>
        <input type="text" id="title" name="title" class="mt-1 block w-full" required>
    </div>

    <div class="mb-4">
        <label for="description" class="block text-sm font-medium text-gray-700">Event Description</label>
        <textarea id="description" name="description" rows="4" class="mt-1 block w-full" required></textarea>
    </div>

    <div class="mb-4">
        <label for="date" class="block text-sm font-medium text-gray-700">Event Date</label>
        <input type="datetime-local" id="date" name="date" class="mt-1 block w-full" required>
    </div>

    <div class="mb-4">
        <label for="location" class="block text-sm font-medium text-gray-700">Event Location</label>
        <input type="text" id="location" name="location" class="mt-1 block w-full" required>
    </div>

    <div class="mb-4">
        <label for="image" class="block text-sm font-medium text-gray-700">Event Image (optional)</label>
        <input type="file" id="image" name="image" class="mt-1 block w-full">
    </div>

    <div class="mb-4">
        <label for="status" class="block text-sm font-medium text-gray-700">Event Status</label>
        <select id="status" name="status" class="mt-1 block w-full" required>
            <option value="open">Open</option>
            <option value="closed">Closed</option>
        </select>
    </div>

    <div class="mb-4">
        <label for="max_participants" class="block text-sm font-medium text-gray-700">Max Participants</label>
        <input type="number" id="max_participants" name="max_participants" class="mt-1 block w-full" required>
    </div>

    <div class="flex justify-end">
        <button type="submit" class="bg-violet-400 text-white px-6 py-2 rounded">Save Event</button>
    </div>
</form>
    </main>
</body>
</html>