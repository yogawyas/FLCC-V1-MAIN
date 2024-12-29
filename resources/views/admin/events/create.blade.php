@extends('layouts.admin')

@section('title', 'Create Event')

@section('content')
    <h1 class="text-3xl font-bold">Create New Event</h1>

    <form method="POST" action="{{ route('admin.events.store') }}" enctype="multipart/form-data">
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
                <option value="upcoming">Upcoming</option>
                <option value="ongoing">Ongoing</option>
                <option value="completed">Completed</option>
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
@endsection
