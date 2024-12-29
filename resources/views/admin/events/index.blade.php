@extends('layouts.admin')

@section('title', 'Manage Events')

@section('content')
    <div class="flex justify-between mb-4">
        <h1 class="text-3xl font-bold">Manage Events</h1>
        <a href="{{ route('admin.events.create') }}" class="bg-violet-400 text-white px-4 py-2 rounded">
            Create Event
        </a>
    </div>

    @if(session('success'))
        <div class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded">
            {{ session('success') }}
        </div>
    @endif

    <div class="grid grid-cols-1 gap-6">
        @foreach($events as $event)
            <div class="bg-white shadow rounded-lg p-6">
                <h3 class="text-xl font-bold">{{ $event->title }}</h3>
                <p>{{ $event->description }}</p>
                <p>{{ $event->formatted_date }}</p>
                <div class="mt-4">
                    <a href="{{ route('admin.events.edit', $event) }}" class="text-blue-600">Edit</a>
                    <form method="POST" action="{{ route('admin.events.destroy', $event) }}" class="inline-block ml-4">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600">Delete</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
@endsection
