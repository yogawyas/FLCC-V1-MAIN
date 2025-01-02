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
        <h1>Edit Ministry</h1>

        <!-- Form untuk edit ministry -->
        <form method="POST" action="{{ route('ministries.update', $ministry) }}" >
    @csrf
    @method('PUT')  <!-- Jika Anda menggunakan metode PUT untuk update -->

    <style>
        /* CSS untuk memperbesar kotak input dan textarea */
        .large-input {
            width: 100%;       /* Membuat input memenuhi lebar container */
            height: 50px;      /* Mengubah tinggi input */
            font-size: 1.2rem; /* Mengubah ukuran font */
            padding: 10px;     /* Memberikan padding agar lebih lega */
        }

        .large-textarea {
            width: 100%;       /* Membuat textarea memenuhi lebar container */
            height: 150px;     /* Mengubah tinggi textarea */
            font-size: 1.2rem; /* Mengubah ukuran font */
            padding: 10px;     /* Memberikan padding agar lebih lega */
        }

        /* CSS untuk tombol kotak dengan warna */
        .btn-update {
            background-color: #007bff; /* Warna latar belakang biru */
            color: white;              /* Warna teks putih */
            border: none;              /* Menghapus border default */
            padding: 12px 20px;        /* Menambah padding agar tombol lebih besar */
            font-size: 16px;           /* Ukuran font */
            border-radius: 5px;        /* Memberikan sudut melengkung (kotak) */
            width: 100%;               /* Lebar tombol 100% */
            cursor: pointer;          /* Mengubah kursor saat hover */
            text-align: center;        /* Menyelaraskan teks di tengah */
        }

        .btn-update:hover {
            background-color: #0056b3; /* Warna latar belakang biru tua saat hover */
            transition: background-color 0.3s ease; /* Efek transisi warna */
        }
    </style>

    <div class="mb-3">
        <label for="name" class="form-label">Ministry Name</label>
        <input type="text" class="form-control large-input" id="name" name="name" value="{{ old('name', $ministry->name) }}">
    </div>

    <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <textarea class="form-control large-textarea" id="description" name="description">{{ old('description', $ministry->description) }}</textarea>
    </div>

    <div class="mb-3">
                <label for="image" class="block text-sm font-medium text-gray-700">Event Image (optional)</label>
                <input type="file" id="image" name="image" class="mt-1 block w-full">
            </div>

    <div class="mb-3">
        <label for="description" class="form-label">Status</label>
        <textarea class="form-control large-textarea" id="status" name="status">{{ old('status', $ministry->status) }}</textarea>
    </div>

    <button type="submit" class="btn-update">Update</button>
</form>



    </div>


</body>

</html>