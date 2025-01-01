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
    <!-- Main Content -->
    <main class="py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h1 class="text-4xl font-bold text-gray-900 dark:text-white mb-4">
                    Together in faith, stronger in service.
                </h1>
                <h2 class="text-2xl font-bold text-violet-400">JOIN US!</h2>
                <p class="mt-4 text-gray-600 dark:text-gray-400 max-w-2xl mx-auto">
                    Discover your place in our community and make a difference through our various ministry opportunities.
                </p>
            </div>

            <!-- Ministry Grid -->
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($ministries as $ministry)
                <div class="bg-white dark:bg-gray-800 rounded-xl overflow-hidden shadow-md hover:shadow-xl transition-all duration-300 relative">
                    <!-- Status Badge -->
                    <div class="absolute top-4 right-4 z-10">
                        @if($ministry->status === 'open')
                        <span class="px-3 py-1 bg-green-500 text-white text-sm font-medium rounded-full">
                            Open
                        </span>
                        @else
                        <span class="px-3 py-1 bg-red-500 text-white text-sm font-medium rounded-full">
                            Closed
                        </span>
                        @endif
                    </div>

                    <!-- Ministry Image/Placeholder -->
                    <div class="aspect-video relative overflow-hidden bg-gray-100">
                        @if($ministry->image)
                        <img src="{{ asset('storage/' . $ministry->image) }}"
                            alt="{{ $ministry->name }}"
                            class="w-full h-full object-cover">
                        @else
                        <div class="w-full h-full flex flex-col items-center justify-center text-gray-400">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mb-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                            <span class="text-sm">Ministry Photo</span>
                        </div>
                        @endif
                    </div>

                    <!-- Ministry Content -->
                    <div class="p-6">
                        <h3 class="text-xl font-bold mb-3 text-gray-900 dark:text-white">{{ $ministry->name }}</h3>
                        <p class="text-gray-600 dark:text-gray-300 mb-6 line-clamp-2">{{ $ministry->description }}</p>

                        <!-- Quick Info -->
                        <div class="space-y-2 mb-6">
                            @if($ministry->meeting_time)
                            <div class="flex items-center text-sm text-gray-500">
                                <svg class="h-5 w-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                {{ $ministry->meeting_time }}
                            </div>
                            @endif

                            <div class="flex items-center text-sm text-gray-500">
                                <svg class="h-5 w-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                </svg>
                                <span>{{ $ministry->users->count() }}/{{ $ministry->total_slots }} Slots</span>
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="flex gap-2">
                            <button onclick="openModal('modal-{{ $ministry->id }}')"
                                class="flex-1 bg-violet-100 text-violet-600 px-4 py-2 rounded-lg hover:bg-violet-200 transition-colors text-sm font-medium">
                                See More
                            </button>
                            @if($ministry->status === 'open' && $ministry->users->count() < $ministry->total_slots)
                                <form action="{{ route('ministry.join', $ministry) }}" method="POST" class="flex-1">
                                    @csrf
                                    <button type="submit"
                                        class="w-full bg-violet-400 text-white px-4 py-2 rounded-lg hover:bg-violet-500 transition-colors text-sm font-medium">
                                        Join Now
                                    </button>
                                </form>
                                @else
                                <button disabled
                                    class="flex-1 bg-gray-100 text-gray-400 px-4 py-2 rounded-lg cursor-not-allowed text-sm font-medium">
                                    {{ $ministry->status === 'closed' ? 'Closed' : 'Full' }}
                                </button>
                                @endif
                        </div>
                    </div>
                </div>

                <!-- Ministry Detail Modal -->
                <div id="modal-{{ $ministry->id }}" class="fixed inset-0 bg-black bg-opacity-50 hidden z-50 overflow-auto">
                    <div class="min-h-screen px-4 text-center">
                        <div class="inline-block align-bottom bg-white dark:bg-gray-800 rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-2xl sm:w-full">
                            <!-- Modal Content -->
                            <div class="relative">
                                <!-- Close Button -->
                                <button onclick="closeModal('modal-{{ $ministry->id }}')"
                                    class="absolute top-4 right-4 z-20 bg-white dark:bg-gray-700 rounded-full p-1 shadow-lg hover:bg-gray-100 dark:hover:bg-gray-600">
                                    <svg class="h-6 w-6 text-gray-600 dark:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </button>

                                <!-- Ministry Image -->
                                <div class="aspect-video relative overflow-hidden bg-gray-100">
                                    @if($ministry->image)
                                    <img src="{{ asset('storage/' . $ministry->image) }}"
                                        alt="{{ $ministry->name }}"
                                        class="w-full h-full object-cover">
                                    @else
                                    <div class="w-full h-full flex flex-col items-center justify-center text-gray-400">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-24 w-24 mb-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                        <span class="text-lg">Ministry Photo</span>
                                    </div>
                                    @endif
                                </div>

                                <!-- Ministry Details -->
                                <div class="p-6">
                                    <h3 class="text-2xl font-bold mb-4 text-gray-900 dark:text-white">{{ $ministry->name }}</h3>
                                    <p class="text-gray-600 dark:text-gray-300 mb-6">{{ $ministry->description }}</p>

                                    <div class="grid grid-cols-2 gap-4 mb-6">
                                        @if($ministry->meeting_time)
                                        <div class="bg-gray-50 dark:bg-gray-700 p-4 rounded-lg">
                                            <h4 class="text-sm font-medium text-gray-500 dark:text-gray-400 mb-1">Meeting Time</h4>
                                            <p class="text-gray-900 dark:text-white">{{ $ministry->meeting_time }}</p>
                                        </div>
                                        @endif

                                        @if($ministry->location)
                                        <div class="bg-gray-50 dark:bg-gray-700 p-4 rounded-lg">
                                            <h4 class="text-sm font-medium text-gray-500 dark:text-gray-400 mb-1">Location</h4>
                                            <p class="text-gray-900 dark:text-white">{{ $ministry->location }}</p>
                                        </div>
                                        @endif

                                        <div class="bg-gray-50 dark:bg-gray-700 p-4 rounded-lg">
                                            <h4 class="text-sm font-medium text-gray-500 dark:text-gray-400 mb-1">Status</h4>
                                            <p class="text-gray-900 dark:text-white">{{ ucfirst($ministry->status) }}</p>
                                        </div>

                                        <div class="bg-gray-50 dark:bg-gray-700 p-4 rounded-lg">
                                            <h4 class="text-sm font-medium text-gray-500 dark:text-gray-400 mb-1">Available Slots</h4>
                                            <p class="text-gray-900 dark:text-white">
                                                {{ $ministry->total_slots - $ministry->users->count() }} of {{ $ministry->total_slots }}
                                            </p>
                                        </div>
                                    </div>

                                    @if($ministry->status === 'open' && $ministry->users->count() < $ministry->total_slots)
                                        <form action="{{ route('ministry.join', $ministry) }}" method="POST">
                                            @csrf
                                            <button type="submit"
                                                class="w-full bg-violet-400 text-white py-3 rounded-lg hover:bg-violet-500 transition-colors font-medium">
                                                Join Ministry
                                            </button>
                                        </form>
                                        @else
                                        <button disabled
                                            class="w-full bg-gray-200 text-gray-500 py-3 rounded-lg cursor-not-allowed font-medium">
                                            {{ $ministry->status === 'closed' ? 'Registration Closed' : 'No Slots Available' }}
                                        </button>
                                        @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                <!-- [Empty state remains the same] -->
                @endforelse
            </div>
        </div>
    </main>

    <!-- Modal JavaScript -->
    <script>
        function openModal(modalId) {
            document.getElementById(modalId).classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }

        function closeModal(modalId) {
            document.getElementById(modalId).classList.add('hidden');
            document.body.style.overflow = 'auto';
        }

        // Close modal when clicking outside
        window.onclick = function(event) {
            if (event.target.classList.contains('fixed')) {
                event.target.classList.add('hidden');
                document.body.style.overflow = 'auto';
            }
        }
    </script>

    <!-- Sweet Alert for Success Message -->
    @if(session('success'))
    <script>
        Swal.fire({
            toast: true,
            position: 'top-end',
            icon: 'success',
            title: "{{ session('success') }}",
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        });
    </script>
    @endif
</body>

</html>