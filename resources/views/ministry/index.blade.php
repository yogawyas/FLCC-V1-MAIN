<!-- resources/views/ministry/index.blade.php -->
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ministry Department - Front Liner Campus Community</title>
    <link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&family=Montserrat&family=Libre+Baskerville&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/css/ministry.css', 'resources/js/app.js'])
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="font-sans antialiased">
    <!-- [Previous navigation code remains the same] -->
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
                    <a href="{{ route('register') }}" class="regis">Register</a>
                    <a href="{{ route('login') }}" class="login ml-4">Login</a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>
    <!-- Main Content -->
    <main class="ministry mt-20 mb-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-5" data-aos="fade-up" data-aos-duration="1500">
                <h1 class="text-4xl font-bold text-gray-900 mb-4">
                    Together in faith, stronger in service.
                </h1>
                <h2 class="text-2xl font-bold">JOIN US!</h2>
                <p class="teks mt-4 max-w-2xl mx-auto">
                    Discover your place in our community and make a difference through our various ministry opportunities.
                </p>
            </div>

            <div class="add mb-5">
                @if (Auth::check() && Str::endsWith(Auth::user()->email, '@admin.com'))
                <a href="{{ route('ministry.create') }}" class="Btn" data-aos="fade-up" data-aos-duration="1500">
                    <div class="sign">+</div>
                    <div class="text">Create</div>
                </a>
                @endif
            </div>

            
                <!-- Ministry Grid -->
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @forelse($ministries as $ministry)
                    <div class="rounded-xl overflow-hidden shadow-md hover:shadow-xl transition-all duration-300 relative">
                        <!-- Status Badge -->
                        <div class="absolute top-4 right-4 z-10" data-aos="fade-up" data-aos-duration="1500">
                            @if($ministry->status === 'open')
                            <span class="open px-3 py-1 bg-green-500 text-white text-sm font-medium rounded-full">
                                Open
                            </span>
                            @else
                            <span class="close px-3 py-1 bg-red-500 text-white text-sm font-medium rounded-full">
                                Closed
                            </span>
                            @endif
                        </div>


                    <!-- Ministry Image/Placeholder -->
                    <div data-aos="fade-up" data-aos-duration="1500">
                        <div class="aspect-video relative overflow-hidden bg-gray-100">
                            @if($ministry->image)
                            <img src="{{ asset('storage/' . $ministry->image) }}"
                                alt="{{ $ministry->name }}"
                                class="w-full h-full object-cover">
                            @else
                            <div class="w-full h-full flex flex-col items-center justify-center text-gray-400">
                                <!-- <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mb-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />  
                            </svg> -->
                                    <img src="{{ asset('images/flcc.png') }}" alt="" class="w-full h-full">
                                    <!-- <span class="text-sm">Ministry Photo</span> -->
                                </div>
                                @endif
                            </div>
<<<<<<< Updated upstream
<<<<<<< Updated upstream
                            <!-- Ministry Content -->
                            <div class="bg-white p-6">
                                <h3 class="text-xl font-bold mb-3 text-gray-900">{{ $ministry->name }}</h3>
                                <p class="text-gray-600-300 mb-6 line-clamp-2">{{ $ministry->description }}</p>
                            </div>

                            <!-- Quick Info -->
                            <div class="space-y-2 mb-6 mt-6 ml-6">
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
                                    class="more flex-1 px-4 py-2 rounded-lg transition-colors text-sm font-medium">
                                    See More
                                </button>
                                @if(auth()->user() && $ministry->users->contains(auth()->user()->id))
                                <button disabled
                                    class="close flex-1 px-4 py-2 rounded-lg cursor-not-allowed text-sm font-medium">
                                    Joined
                                </button>
                                @elseif($ministry->status === 'open' && $ministry->users->count() < $ministry->total_slots)
                                    <form action="{{ route('ministry.join', $ministry) }}" method="POST" class="flex-1">
                                        @csrf
                                        <button type="submit"
                                            class="join w-full text-white px-4 py-2 rounded-lg transition-colors text-sm font-medium">
                                            Join Now
                                        </button>
                                    </form>      
                                @else
                                    <button disabled
                                        class="close flex-1 px-4 py-2 rounded-lg cursor-not-allowed text-sm font-medium">
                                        {{ $ministry->status === 'closed' ? 'Closed' : 'Full' }}
                                    </button>
                                @endif

                                

                                    @if(auth()->user() && auth('web')->user()->isAdmin())
                                    <!-- Tombol Edit yang mengarahkan ke halaman edit ministry -->
                                    <a href="{{ route('ministries.edit', $ministry->id) }}"
                                        class="flex-1 bg-yellow-400 text-black px-4 py-2 rounded-lg">
                                        Edit
                                    </a>
                                    @endif -->


                                
                                <!-- Action Buttons
                                <div class="flex gap-2">
                                    <button onclick="openModal('modal-{{ $ministry->id }}')"
                                        class="more flex-1 px-4 py-2 rounded-lg transition-colors text-sm font-medium">
                                        See More
                                    </button>
                                    @if($ministry->status === 'open' && $ministry->users->count() < $ministry->total_slots)
                                        <form action="{{ route('ministry.join', $ministry) }}" method="POST" class="flex-1">
                                            @csrf
                                            <button type="submit"
                                                class="join w-full text-white px-4 py-2 rounded-lg transition-colors text-sm font-medium">
                                                Join Now
=======

                            <<<<<<< HEAD
                                <!-- Ministry Content -->
                                <div class="bg-white p-6">
                                    <h3 class="text-xl font-bold mb-3 text-gray-900">{{ $ministry->name }}</h3>
                                    <p class="text-gray-600-300 mb-6 line-clamp-2">{{ $ministry->description }}</p>
                                    =======
                                    <!-- Action Buttons -->
                                    <div class="flex gap-2">
                                        <button onclick="openModal('modal-{{ $ministry->id }}')"
                                            class="more flex-1 px-4 py-2 rounded-lg transition-colors text-sm font-medium">
                                            See More
                                        </button>
=======

                            <<<<<<< HEAD
                                <!-- Ministry Content -->
                                <div class="bg-white p-6">
                                    <h3 class="text-xl font-bold mb-3 text-gray-900">{{ $ministry->name }}</h3>
                                    <p class="text-gray-600-300 mb-6 line-clamp-2">{{ $ministry->description }}</p>
                                    =======
                                    <!-- Action Buttons -->
                                    <div class="flex gap-2">
                                        <button onclick="openModal('modal-{{ $ministry->id }}')"
                                            class="more flex-1 px-4 py-2 rounded-lg transition-colors text-sm font-medium">
                                            See More
                                        </button>
>>>>>>> Stashed changes
                                        @if($ministry->users->contains(auth()->user()->id))
                                            <button disabled
                                                class="close flex-1 px-4 py-2 rounded-lg cursor-not-allowed text-sm font-medium">
                                                Joined
<<<<<<< Updated upstream
>>>>>>> Stashed changes
=======
>>>>>>> Stashed changes
                                            </button>
                                        @elseif($ministry->status === 'open' && $ministry->users->count() < $ministry->total_slots)
                                            <form action="{{ route('ministry.join', $ministry) }}" method="POST" class="flex-1">
                                                @csrf
                                                <button type="submit"
                                                    class="join w-full text-white px-4 py-2 rounded-lg transition-colors text-sm font-medium">
                                                    Join Now
                                                </button>
                                            </form>
                                        @else
                                            <button disabled
                                                class="close flex-1 px-4 py-2 rounded-lg cursor-not-allowed text-sm font-medium">
                                                {{ $ministry->status === 'closed' ? 'Closed' : 'Full' }}
                                            </button>
                                        @endif
                                        @if(auth()->user() && auth('web')->user()->isAdmin())
<<<<<<< Updated upstream
<<<<<<< Updated upstream
                                        <!-- Tombol Edit yang mengarahkan ke halaman edit ministry -->
                                        <a href="{{ route('ministries.edit', $ministry->id) }}"
                                            class="flex-1 bg-yellow-400 text-black px-4 py-2 rounded-lg">
                                            Edit
                                        </a>
=======
=======
>>>>>>> Stashed changes
                                            <!-- Tombol Edit yang mengarahkan ke halaman edit ministry -->
                                            <a href="{{ route('ministries.edit', $ministry->id) }}"
                                                class="flex-1 bg-yellow-400 text-black px-4 py-2 rounded-lg">
                                                Edit
                                            </a>
                                            >>>>>>> 444f7d884c2d4a6fce19180a27f6b2472ccc4b2d
<<<<<<< Updated upstream
>>>>>>> Stashed changes
=======
>>>>>>> Stashed changes

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

<<<<<<< Updated upstream
<<<<<<< Updated upstream
                                </div> -->
                            </div>
                        </div>
                    
=======
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
                                                    class="more flex-1 px-4 py-2 rounded-lg transition-colors text-sm font-medium">
                                                    See More
                                                </button>
                                                @if($ministry->status === 'open' && $ministry->users->count() < $ministry->total_slots)
                                                    <form action="{{ route('ministry.join', $ministry) }}" method="POST" class="flex-1">
                                                        @csrf
                                                        <button type="submit"
                                                            class="join w-full text-white px-4 py-2 rounded-lg transition-colors text-sm font-medium">
                                                            Join Now
                                                        </button>
                                                    </form>
                                                    @else
                                                        <button disabled
                                                            class="close flex-1 px-4 py-2 rounded-lg cursor-not-allowed text-sm font-medium">
                                                            {{ $ministry->status === 'closed' ? 'Closed' : 'Full' }}
                                                        </button>
                                                    @endif
                                                    @if(auth('web')->user()->isAdmin())
                                                        <!-- Tombol Edit yang mengarahkan ke halaman edit ministry -->
                                                        <a href="{{ route('ministries.edit', $ministry->id) }}"
                                                            class="flex-1 bg-yellow-400 text-black px-4 py-2 rounded-lg">
                                                            Edit
                                                        </a>

                                                        <!-- Tombol Manage Users yang mengarahkan ke halaman manage users ministry -->
                                                        <a href="{{ route('ministries.users', $ministry->id) }}"
                                                            class="flex-1 bg-red-400 text-white px-4 py-2 rounded-lg">
                                                            Manage Users
                                                        </a>
                                                    @endif

                                            </div>
                                    </div>
                                </div>
                        </div>
>>>>>>> Stashed changes

                        <!-- Ministry Detail Modal -->
                        <div id="modal-{{ $ministry->id }}" class="fixed inset-0 bg-black bg-opacity-50 hidden z-50 overflow-auto">
                            <div class="min-h-screen px-4 text-center">
                                <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-2xl sm:w-full">
                                    <!-- Modal Content -->
                                    <div class="relative">
                                        <!-- Close Button -->
                                        <button onclick="closeModal('modal-{{ $ministry->id }}')"
                                            class="absolute top-4 right-4 z-20 bg-white rounded-full p-1 shadow-lg hover:bg-gray-100">
                                            <svg class="h-6 w-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                            </svg>
                                        </button>

=======
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
                                                    class="more flex-1 px-4 py-2 rounded-lg transition-colors text-sm font-medium">
                                                    See More
                                                </button>
                                                @if($ministry->status === 'open' && $ministry->users->count() < $ministry->total_slots)
                                                    <form action="{{ route('ministry.join', $ministry) }}" method="POST" class="flex-1">
                                                        @csrf
                                                        <button type="submit"
                                                            class="join w-full text-white px-4 py-2 rounded-lg transition-colors text-sm font-medium">
                                                            Join Now
                                                        </button>
                                                    </form>
                                                    @else
                                                        <button disabled
                                                            class="close flex-1 px-4 py-2 rounded-lg cursor-not-allowed text-sm font-medium">
                                                            {{ $ministry->status === 'closed' ? 'Closed' : 'Full' }}
                                                        </button>
                                                    @endif
                                                    @if(auth('web')->user()->isAdmin())
                                                        <!-- Tombol Edit yang mengarahkan ke halaman edit ministry -->
                                                        <a href="{{ route('ministries.edit', $ministry->id) }}"
                                                            class="flex-1 bg-yellow-400 text-black px-4 py-2 rounded-lg">
                                                            Edit
                                                        </a>

                                                        <!-- Tombol Manage Users yang mengarahkan ke halaman manage users ministry -->
                                                        <a href="{{ route('ministries.users', $ministry->id) }}"
                                                            class="flex-1 bg-red-400 text-white px-4 py-2 rounded-lg">
                                                            Manage Users
                                                        </a>
                                                    @endif

                                            </div>
                                    </div>
                                </div>
                        </div>

                        <!-- Ministry Detail Modal -->
                        <div id="modal-{{ $ministry->id }}" class="fixed inset-0 bg-black bg-opacity-50 hidden z-50 overflow-auto">
                            <div class="min-h-screen px-4 text-center">
                                <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-2xl sm:w-full">
                                    <!-- Modal Content -->
                                    <div class="relative">
                                        <!-- Close Button -->
                                        <button onclick="closeModal('modal-{{ $ministry->id }}')"
                                            class="absolute top-4 right-4 z-20 bg-white rounded-full p-1 shadow-lg hover:bg-gray-100">
                                            <svg class="h-6 w-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                            </svg>
                                        </button>

>>>>>>> Stashed changes
                                        <!-- Ministry Image -->
                                        <div class="aspect-video relative overflow-hidden bg-gray-100">
                                            @if($ministry->image)
                                            <img src="{{ asset('storage/' . $ministry->image) }}"
                                                alt="{{ $ministry->name }}"
                                                class="w-full h-full object-cover">
                                            @else
                                            <div class="w-full h-full flex flex-col items-center justify-center text-gray-400">
                                                <!-- <svg xmlns="http://www.w3.org/2000/svg" class="h-24 w-24 mb-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                        <span class="text-lg">Ministry Photo</span> -->
                                                <img src="{{ asset('images/flcc.png') }}" alt="" class="w-full h-full">
                                            </div>
                                            @endif
                                        </div>

                                        <!-- Ministry Details -->
                                        <div class="p-6">
                                            <h3 class="text-2xl font-bold mb-4 text-gray-900">{{ $ministry->name }}</h3>
                                            <p class="text-gray-600 mb-6">{{ $ministry->description }}</p>

                                            <div class="grid grid-cols-2 gap-4 mb-6">
                                                @if($ministry->meeting_time)
                                                <div class="bg-gray-50 p-4 rounded-lg">
                                                    <h4 class="text-sm font-medium text-gray-500 mb-1">Meeting Time</h4>
                                                    <p class="text-gray-900">{{ $ministry->meeting_time }}</p>
                                                </div>
                                                @endif

                                                @if($ministry->location)
                                                <div class="bg-gray-50 p-4 rounded-lg">
                                                    <h4 class="text-sm font-medium text-gray-500 mb-1">Location</h4>
                                                    <p class="text-gray-900">{{ $ministry->location }}</p>
                                                </div>
                                                @endif

                                                <div class="bg-gray-50 p-4 rounded-lg">
                                                    <h4 class="text-sm font-medium text-gray-500 mb-1">Status</h4>
                                                    <p class="text-gray-900 ">{{ ucfirst($ministry->status) }}</p>
                                                </div>

                                                <div class="bg-gray-50 p-4 rounded-lg">
                                                    <h4 class="text-sm font-medium text-gray-500 mb-1">Available Slots</h4>
                                                    <p class="text-gray-900">
                                                        {{ $ministry->total_slots - $ministry->users->count() }} of {{ $ministry->total_slots }}
                                                    </p>
                                                </div>
                                            </div>

                                            @if($ministry->status === 'open' && $ministry->users->count() < $ministry->total_slots)
                                                <form action="{{ route('ministry.join', $ministry) }}" method="POST">
                                                    @csrf
                                                    <button type="submit"
                                                        class="join w-full text-white py-3 rounded-lg transition-colors font-medium">
                                                        Join Ministry
                                                    </button>
                                                </form>
                                                @else
                                                <button disabled
                                                    class="close w-full py-3 rounded-lg cursor-not-allowed font-medium">
                                                    {{ $ministry->status === 'closed' ? 'Registration Closed' : 'No Slots Available' }}
                                                </button>
                                                @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @empty
                        <div class="col-span-full text-center py-12">
                            <div class="text-gray-500">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mx-auto mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                                </svg>
                                <p class="text-xl">No ministries available at the moment.</p>
                                <p class="mt-2">Please check back later for updates.</p>
                            </div>
                        </div>
                        @endforelse
                    </div>
<<<<<<< Updated upstream
                </div>

                <!-- Pagination -->
                <div>
                    {{ $ministries->links('vendor.pagination.bootstrap-4') }}
                </div>
<<<<<<< Updated upstream
            

            <!-- Pagination -->
            <div>
                {{ $ministries->links('vendor.pagination.bootstrap-4') }}
            </div>
        </div>
=======
            </div>
>>>>>>> Stashed changes
=======
                </div>

                <!-- Pagination -->
                <div>
                    {{ $ministries->links('vendor.pagination.bootstrap-4') }}
                </div>
            </div>
>>>>>>> Stashed changes
    </main>

    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script>
        AOS.init();

        // Modal JavaScript
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