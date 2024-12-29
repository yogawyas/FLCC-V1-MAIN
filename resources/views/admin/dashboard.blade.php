@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm rounded-lg">
        <div class="p-6">
            <h2 class="text-2xl font-semibold mb-6">Dashboard Overview</h2>
            
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Total Users Card -->
                <div class="bg-violet-100 rounded-lg p-6 shadow-md">
                    <h3 class="text-lg font-medium text-violet-800">Total Users</h3>
                    <p class="text-3xl font-bold text-violet-600">{{ $stats['total_users'] }}</p>
                </div>
                
                <!-- Active Events Card -->
                <div class="bg-blue-100 rounded-lg p-6 shadow-md">
                    <h3 class="text-lg font-medium text-blue-800">Active Events</h3>
                    <p class="text-3xl font-bold text-blue-600">{{ $stats['total_events'] }}</p>
                </div>
                
                <!-- Ministries Card -->
                <div class="bg-green-100 rounded-lg p-6 shadow-md">
                    <h3 class="text-lg font-medium text-green-800">Ministries</h3>
                    <p class="text-3xl font-bold text-green-600">{{ $stats['total_ministries'] }}</p>
                </div>
                
                <!-- News Articles Card -->
                <div class="bg-yellow-100 rounded-lg p-6 shadow-md">
                    <h3 class="text-lg font-medium text-yellow-800">News Articles</h3>
                    <p class="text-3xl font-bold text-yellow-600">{{ $stats['total_news'] }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection
