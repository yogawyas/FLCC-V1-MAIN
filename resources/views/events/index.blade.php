<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Events - Front Liner Campus Community</title>
    <link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/css/event.css', 'resources/js/app.js'])
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
                        <!-- <a href="{{ route('about') }}" class="inline-flex items-center px-1 pt-1 text-sm font-medium {{ request()->routeIs('about*') ? 'text-violet-400' : 'text-gray-500' }}">
                            About Us
                        </a> -->
                    </div>
                </div>

                <!-- Authentication -->
                <div class="flex items-center">
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
    <main class="event">
        <div class="max-w-7xl mx-auto p-4 sm:px-6 lg:px-8">
            <!-- Available Events Section -->
            <section class="mb-12">
                <div class="flex justify-between">
                    <h2 class="text-3xl font-bold mb-8" data-aos="fade-up" data-aos-duration="1500">Available Events</h2>
                    @if (Auth::check() && Str::endsWith(Auth::user()->email, '@admin.com'))
                    <a ref="{{ route('ministry.create') }}" class="Btn" data-aos="fade-up" data-aos-duration="1500">
                        <div class="sign">+</div>
                        <div class="text">Create</div>
                    </a>
                    @endif
                </div>
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6" data-aos="fade-up" data-aos-duration="1500">
                    @forelse($availableEvents as $event)
                    <div class="card rounded-lg overflow-hidden shadow">
                        <div class="foto aspect-video flex items-center justify-center text-white">
                            @if($event->image)
                            <img src="{{ asset('storage/' . $event->image) }}"
                                alt="{{ $event->title }}"
                                class="w-full h-full object-cover">
                            @else
                            <span class="text-lg">{{ $event->title }}</span>
                            @endif
                        </div>
                        <div class="p-6">
                            <h3 class="text-xl font-bold mb-2 text-gray-900">{{ $event->title }}</h3>
                            <p class="text-gray-600 mb-4">{{ $event->description }}</p>
                            <div class="items-center">
                                <div>
                                    <p class="text-sm text-gray-500">
                                        {{ \Carbon\Carbon::parse($event->date)->format('F j, Y - g:i A') }}
                                    </p>
                                    <p class="text-sm text-gray-500">{{ $event->location }}</p>
                                </div>
                                @if(auth()->user()->isAdmin())
                                <div class="mt-4">
                                    <a href="{{ route('events.edit', $event->id) }}" class="edit rounded">Edit Event</a>
                                    <form action="{{ route('events.destroy', $event->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="delete rounded">Delete Event</button>
                                    </form>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="col-span-full text-center py-8">
                        <p class="text-gray-600">No available events at the moment.</p>
                    </div>
                    @endforelse
                </div>
                <div>
                    {{ $availableEvents->links('vendor.pagination.bootstrap-4') }}
                </div>
            </section>

            <!-- Previous Events Section -->
            <div>
                <section>
                    <h2 class="text-3xl font-bold mb-8" data-aos="fade-up" data-aos-duration="1500">Previous Events</h2>
                    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6" data-aos="fade-up" data-aos-duration="1500">
                        @forelse($previousEvents as $event)
                        <div class="card rounded-lg overflow-hidden shadow opacity-75">
                            <div class="foto aspect-video flex items-center justify-center text-white">
                                @if($event->image)
                                <img src="{{ asset('storage/' . $event->image) }}"
                                    alt="{{ $event->title }}"
                                    class="w-full h-full object-cover">
                                @else
                                <span class="text-lg">{{ $event->title }}</span>
                                @endif
                            </div>
                            <div class="p-6">
                                <h3 class="text-xl font-bold mb-2 text-gray-900">{{ $event->title }}</h3>
                                <p class="text-gray-600 mb-4">{{ $event->description }}</p>
                                <p class="text-sm text-gray-500">
                                    {{ \Carbon\Carbon::parse($event->date)->format('F j, Y - g:i A') }}
                                </p>
                                <p class="text-sm text-gray-500">{{ $event->location }}</p>


                                <!-- cek apakah dia admin atau bukan -->
                                <div class="mt-4">
                                    @if(auth()->user()->isAdmin())
                                    <a href="{{ route('events.edit', $event->id) }}" class="edit rounded">Edit Event</a>
                                    <form action="{{ route('events.destroy', $event->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="delete rounded">Delete Event</button>
                                    </form>
                                    @endif
                                </div>
                                <!-- sampe sini -->
                            </div>
                        </div>
                        @empty
                        <div class="col-span-full text-center py-8">
                            <p class="text-gray-600">No previous events to show.</p>
                        </div>
                        @endforelse
                    </div>
                    <div>
                        {{ $previousEvents->links('vendor.pagination.bootstrap-4') }}
                    </div>
                </section>
            </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>

</html>