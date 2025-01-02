<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">   
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Event</title>
    <link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/css/event.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-gray-100 dark:bg-gray-900">
    @include('layouts.navigation')

    <main>
        <h1 class="text-3xl font-bold">Edit Event</h1>

        <form method="POST" action="{{ route('events.update', $event) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="title" class="block text-sm font-medium text-gray-700">Event Title</label>
                <input type="text" id="title" name="title" class="mt-1 block w-full" value="{{ old('title', $event->title) }}" required>
            </div>

            <div class="mb-4">
                <label for="description" class="block text-sm font-medium text-gray-700">Event Description</label>
                <textarea id="description" name="description" rows="4" class="mt-1 block w-full" required>{{ old('description', $event->description) }}</textarea>
            </div>

            <div class="mb-4">
                <label for="date" class="block text-sm font-medium text-gray-700">Event Date</label>
                <input type="datetime-local" id="date" name="date" class="mt-1 block w-full"
                       value="{{ old('date', $event->date ? \Carbon\Carbon::parse($event->date)->format('Y-m-d\TH:i') : '') }}" required>
            </div>

            <div class="mb-4">
                <label for="location" class="block text-sm font-medium text-gray-700">Event Location</label>
                <input type="text" id="location" name="location" class="mt-1 block w-full" value="{{ old('location', $event->location) }}" required>
            </div>

            <div class="mb-4">
                <label for="image" class="block text-sm font-medium text-gray-700">Event Image (optional)</label>
                <input type="file" id="image" name="image" class="mt-1 block w-full">
            </div>

            <div class="mb-4">
                <label for="status" class="block text-sm font-medium text-gray-700">Event Status</label>
                <select id="status" name="status" class="mt-1 block w-full" required>
                    <option value="open" {{ $event->status == 'open' ? 'selected' : '' }}>Open</option>
                    <option value="closed" {{ $event->status == 'closed' ? 'selected' : '' }}>Closed</option>
                </select>
            </div>

            <div class="mb-4">
                <label for="max_participants" class="block text-sm font-medium text-gray-700">Max Participants</label>
                <input type="number" id="max_participants" name="max_participants" class="mt-1 block w-full" value="{{ old('max_participants', $event->max_participants) }}" required>
            </div>

            <div class="flex justify-end">
                <button type="submit" class="bg-violet-400 text-white px-6 py-2 rounded">Update Event</button>
            </div>
        </form>
    </main>
</body>
</html>
