@extends('layouts.admin')

@section('title', 'Edit Event')

@section('content')
    <h1 class="text-3xl font-bold">Edit Event</h1>

    <form method="POST" action="{{ route('admin.events.update', $event) }}" enctype="multipart/form-data">
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
            <input type="datetime-local" id="date" name="date" class="mt-1 block w-full" value="{{ old('date', $event->date->format('Y-m-d\TH:i')) }}" required>
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
                <option value="upcoming" {{ $event->status == 'upcoming' ? 'selected' : '' }}>Upcoming</option>
                <option value="ongoing" {{ $event->status == 'ongoing' ? 'selected' : '' }}>Ongoing</option>
                <option value="completed" {{ $event->status == 'completed' ? 'selected' : '' }}>Completed</option>
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
@endsection
