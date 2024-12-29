@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <!-- Available Events Section -->
    <div class="mb-12">
        <h2 class="text-3xl font-bold mb-8 text-gray-900 dark:text-white">Available News</h2>
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse($allNews as $event)
            <div class="bg-white dark:bg-gray-800 rounded-lg overflow-hidden shadow">
                @if($event->image)
                    <img src="{{ asset('storage/' . $event->image) }}" alt="{{ $event->title }}" 
                         class="w-full aspect-video object-cover">
                @else
                    <div class="bg-violet-400 aspect-video flex items-center justify-center text-white">
                        <span class="text-lg">{{ $event->title }}</span>
                    </div>
                @endif
                <div class="p-6">
                    <h3 class="text-xl font-semibold mb-2 text-gray-900 dark:text-white">{{ $event->title }}</h3>
                    <p class="text-gray-600 dark:text-gray-400 mb-4">{{ Str::limit($event->description, 100) }}</p>
                    <div class="flex justify-between items-center">
                        <div class="space-y-1">
                            <span class="block text-sm text-gray-500">
                                {{ \Carbon\Carbon::parse($event->date)->format('F j, Y - g:i A') }}
                            </span>
                            <span class="block text-sm text-gray-500">
                                {{ $event->location }}
                            </span>
                        </div>
                        <button class="bg-violet-400 text-white px-4 py-2 rounded hover:bg-violet-500 transition-colors">
                            Sign Up
                        </button>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-span-full text-center py-8">
                <p class="text-gray-600 dark:text-gray-400">No available news at the moment.</p>
            </div>
            @endforelse
        </div>
    </div>

    <!-- Previous Events Section -->
    <div>
        <h2 class="text-3xl font-bold mb-8 text-gray-900 dark:text-white">Previous News</h2>
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse($previousNews as $event)
            <div class="bg-white dark:bg-gray-800 rounded-lg overflow-hidden shadow opacity-75">
                @if($event->image)
                    <img src="{{ asset('storage/' . $event->image) }}" alt="{{ $event->title }}" 
                         class="w-full aspect-video object-cover">
                @else
                    <div class="bg-violet-400 aspect-video flex items-center justify-center text-white">
                        <span class="text-lg">{{ $event->title }}</span>
                    </div>
                @endif
                <div class="p-6">
                    <h3 class="text-xl font-semibold mb-2 text-gray-900 dark:text-white">{{ $event->title }}</h3>
                    <p class="text-gray-600 dark:text-gray-400 mb-4">{{ Str::limit($event->description, 100) }}</p>
                    <div class="space-y-1">
                        <span class="block text-sm text-gray-500">
                            {{ \Carbon\Carbon::parse($event->date)->format('F j, Y - g:i A') }}
                        </span>
                        <span class="block text-sm text-gray-500">
                            {{ $event->location }}
                        </span>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-span-full text-center py-8">
                <p class="text-gray-600 dark:text-gray-400">No previous news to show.</p>
            </div>
            @endforelse
        </div>
    </div>
</div>
@endsection