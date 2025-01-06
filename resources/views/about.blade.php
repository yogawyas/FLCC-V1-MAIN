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
    @vite(['resources/css/app.css', 'resources/css/about.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
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

    <!-- Main Content -->
    <div class="about">
        <div class="aus max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <div class="us flex flex-col md:flex-row mb-12 space-y-6 md:space-y-0">
                <h1 class="text-4xl md:text-5xl lg:text-6xl xl:text-7xl font-bold mb-4 md:mb-0 flex-auto" data-aos="fade-right" data-aos-duration="1500"> Our Story</h1>
                <div class="text-base lg:text-md leading-relaxed md:w-2/3" data-aos="fade-up" data-aos-duration="1500">
                    <p class="mb-3">
                        Atas kasih karunia Tuhan Yesus, Gereja Bethel Indonesia (GBI) WTC berdiri pada tahun
                        1999. GBI WTC berjalan di bawah kepemimpinan pendiri kami terkasih, Ps. Jeffrey dan
                        Angela Rachmat selama 25 tahun. Sejak Minggu, 20 Oktober 2024, kepemimpinan GBI
                        WTC diteruskan oleh Ps. Jose dan Hanna Carol sebagai Senior Pastor GBI WTC.
                    </p>
                    <p class="mb-3">
                        Bersama seluruh tim pastoral, GBI WTC adalah sebuah gereja Kristen di bawah sinode
                        Gereja Bethel Indonesia (GBI). Kami berkumpul sebagai gereja untuk pertama kalinya
                        dalam ibadah Minggu yang bertempat di Menara Gracia, kota Jakarta, Indonesia. Sejak
                        itu, kami terus bertumbuh dan kini berkumpul secara fisik di tiga lokasi gereja kami di
                        UpperRoom, The Kasablanka, dan Sutera Hall. GBI WTC juga memiliki ibadah online
                        untuk menjangkau orang melampaui batasan geografis.
                    </p>
                    <p>
                        Mulai dari memperkenalkan orang kepada Yesus Kristus dan kasih-Nya yang luar biasa,
                        membaptis mereka yang memutuskan untuk percaya dan menjadikan Yesus Juru
                        Selamat di hidupnya, memperlengkapi orang percaya melalui kelas-kelas dan
                        komunitas, serta membangun generasi penerus; baik anak-anak maupun remaja—kami
                        bersyukur atas tuntunan dan penyediaan Tuhan selama ini, dan kami percayakan
                        tahun-tahun yang akan datang di tangan-Nya sambil terus melayani Dia dan gereja-Nya.
                    </p>
                </div>
            </div>
        </div>

        <!-- Tampilkan informasi lebih lanjut -->
        <!-- <div class="mt-6" data-aos="fade-up" data-aos-duration="1500">
                    <h2 class="text-3xl font-semibold text-gray-800">Our Recent Events</h2>
                    <p class="text-gray-600 mt-4">
                        Learn more about our latest events and activities.
                    </p> -->
        <!-- Event list -->
        <!-- <div class="mt-6">
                        <ul>
                            @forelse($events as $event)
                            <li><a href="{{ route('events') }}">{{ $event->title }}</a></li>
                            @empty
                            @endforelse
                        </ul>
                    </div>
                </div> -->

        <!-- Ministry Section -->
        <!-- <div class="mt-6" data-aos="fade-up" data-aos-duration="1500">
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
                </div> -->

        <!-- News Section -->
        <!-- <div class="mt-6" data-aos="fade-up" data-aos-duration="1500">
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
                </div> -->

        <!-- Back to Home Button -->
        <!-- <div class="back mt-8" data-aos="fade-up" data-aos-duration="1500">
                    <a href="{{ route('welcome') }}" class="text-2xl font-bold">
                        Back to Main Page
                    </a>
                </div> -->

        <!-- Vision & Mission -->
        <div class="vm grid gap-5 mb-12 mx-auto max-w-7xl md:grid-cols-2 px-4 sm:px-6 lg:px-8 py-8" data-aos="fade-up" data-aos-duration="1000">
            <div>
                <h2 class="text-base md:text-lg lg:text-xl font-semibold mb-4">Our Vision</h2>
                <p class="v text-lg md:text-xl lg:text-2xl">
                    Transforming communities, raising next generation of leaders.
                </p>
            </div>
            <div>
                <h2 class="text-base md:text-lg lg:text-xl font-semibold mb-4">Our Mission</h2>
                <p class="v text-lg md:text-xl lg:text-2xl">
                    An assembly of next generation and discipling next generation to experience God and find their calling so they can transform and influence their communities through kingdom values.
                </p>
            </div>
        </div>

        <!-- Pastors -->
        <div>
            <h1 class="tp text-4xl md:text-5xl lg:text-6xl xl:text-7xl font-bold text-center mb-12" data-aos="fade-up" data-aos-duration="1500">Our Pastors</h1>
            <div class="pastor grid gap-5 px-4 sm:px-6 lg:px-8 pb-12 max-w-7xl mx-auto grid-cols-3" data-aos="fade-up" data-aos-duration="1500">
                <div>
                    <div>
                        <img src="{{ asset('images/pastor/pl-wiryohadi.png') }}" alt="Joshua Hezer" class="w-full h-full object-cover">
                    </div>
                    <div class="nama mt-3 text-start" data-aos="fade-up" data-aos-duration="1500">
                        <h2 class="text-md sm:text-lg md:text-2xl mb-2">Wiryohadi</h2>
                        <h3 class="text-sm sm:text-md md:text-lg font-bold mb-2">Pastor Leader</h3>
                    </div>
                </div>
                <div>
                    <div>
                        <img src="{{ asset('images/pastor/p-stephaniefenuela.png') }}" alt="Joshua Hezer" class="w-full h-full object-cover">
                    </div>
                    <div class="nama mt-3 text-start" data-aos="fade-up" data-aos-duration="1500">
                        <h2 class="text-md sm:text-lg md:text-2xl mb-2">Stephanie Fenuela</h2>
                        <h3 class="text-sm sm:text-md md:text-lg font-bold mb-2">Associate Youth Pastor</h3>
                    </div>
                </div>
                <div>
                    <div>
                        <img src="{{ asset('images/pastor/p-joshuahezer.png') }}" alt="Joshua Hezer" class="w-full h-full object-cover">
                    </div>
                    <div class="nama mt-3 text-start" data-aos="fade-up" data-aos-duration="1500">
                        <h2 class="text-md sm:text-lg md:text-2xl mb-2">Joshua Hezer</h2>
                        <h3 class="text-sm sm:text-md md:text-lg font-bold mb-2">Youth Pastor</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>


    <!-- Footer -->
    <footer class="footer">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 lg:pt-8 pb-3 text-sm lg:text-base xl:text-base">
            <div class="footer-g grid grid-cols-1 md:grid-cols-4 sm:grid-cols-3 gap-8 pb-3">
                <!-- <div>
                    <h4 class="font-semibold mb-4">Contact Us</h4>

                </div> -->
                <div class="footer-flcc">
                    <h4 class="font-semibold mb-4">FLCC</h4>
                    <a href="{{ route('dashboard') }}" class=" px-1 pt-1 font-medium {{ request()->routeIs('dashboard')}}">
                        Dashboard
                    </a><br>
                    <a href="{{ route('events') }}" class=" px-1 pt-1 font-medium {{ request()->routeIs('events*')}}">
                        Events
                    </a><br>
                    <a href="{{ route('ministry') }}" class=" px-1 pt-1 font-medium {{ request()->routeIs('ministry*')}}">
                        Ministry
                    </a><br>
                    <a href="{{ route('about') }}" class=" px-1 pt-1 font-medium {{ request()->routeIs('about*')}}">
                        About Us
                    </a><br>
                </div>
                <div class="footer-serv">
                    <h4 class="font-semibold mb-4">Service Times</h4>
                    <p>Every Sunday 09:00</p>
                    <p>Every Sunday 11:00</p>
                </div>
                <div class="footer-sosial">
                    <h4 class="font-semibold mb-4">Follow Us</h4>
                    <a href="https://www.instagram.com/frontlinercampus?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw==" target="_blank">
                        <i class="fa-brands fa-instagram"></i>
                    </a>
                    <a href="https://youtube.com/@frontlinercampus?si=rCnPNI-DCyTTB_Qr" target="_blank">
                        <i class="fa-brands fa-youtube"></i>
                    </a>
                </div>
                <div class="footer-loc flex items-center space-x-4">
                    <i class="fa-solid fa-location-dot"></i>
                    <p class="text-white">Ruko Golden Boulevard, Blok U No.6, Lt.3, Tangerang 15310</p>
                </div>
            </div>
            <p class="cp mt-3">&copy; 2025 Front Liner Campus Community. All rights reserved.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script>
        AOS.init();

        document.getElementById('menu-toggle').addEventListener('click', function() {
            const menu = document.getElementById('mobile-menu');
            menu.classList.toggle('hidden');
        });
    </script>
</body>

</html>