<x-app-layout>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="text-center">
            <h1 class="text-4xl font-bold text-violet-500 mb-4">More About Us</h1>
            <p class="text-gray-700 text-lg">
                Welcome to our platform! We are dedicated to providing the best services to our users.
                Learn more about our mission, vision, and the values that drive us to excel every day.
            </p>

            <!-- Tampilkan informasi lebih lanjut -->
            <div class="mt-6">
                <h2 class="text-3xl font-semibold text-gray-800">Our Recent Events</h2>
                <p class="text-gray-600 mt-4">
                    Learn more about our latest events and activities.
                </p>
                <!-- Event list -->
                <div class="mt-6">
                    <ul>
                        <li><a href="{{ route('events') }}" class="text-violet-600 hover:text-violet-800">Upcoming Event 1</a></li>
                        <li><a href="{{ route('events') }}" class="text-violet-600 hover:text-violet-800">Upcoming Event 2</a></li>
                        <li><a href="{{ route('events') }}" class="text-violet-600 hover:text-violet-800">Upcoming Event 3</a></li>
                    </ul>
                </div>
            </div>

            <!-- Ministry Section -->
            <div class="mt-6">
                <h2 class="text-3xl font-semibold text-gray-800">Our Ministry</h2>
                <p class="text-gray-600 mt-4">
                    Explore the different ministries we offer to the community.
                </p>
                <div class="mt-6">
                    <ul>
                        <li><a href="{{ route('ministry') }}" class="text-violet-600 hover:text-violet-800">Ministry 1</a></li>
                        <li><a href="{{ route('ministry') }}" class="text-violet-600 hover:text-violet-800">Ministry 2</a></li>
                        <li><a href="{{ route('ministry') }}" class="text-violet-600 hover:text-violet-800">Ministry 3</a></li>
                    </ul>
                </div>
            </div>

            <!-- News Section -->
            <div class="mt-6">
                <h2 class="text-3xl font-semibold text-gray-800">Latest News</h2>
                <p class="text-gray-600 mt-4">
                    Stay updated with the latest news and announcements from our platform.
                </p>
                <div class="mt-6">
                    <ul>
                        <li><a href="{{ route('news') }}" class="text-violet-600 hover:text-violet-800">News Article 1</a></li>
                        <li><a href="{{ route('news') }}" class="text-violet-600 hover:text-violet-800">News Article 2</a></li>
                        <li><a href="{{ route('news') }}" class="text-violet-600 hover:text-violet-800">News Article 3</a></li>
                    </ul>
                </div>
            </div>

            <!-- Back to Home Button -->
            <div class="mt-8">
                <a href="{{ route('welcome') }}" class="inline-block bg-violet-400 text-white px-8 py-3 rounded-lg hover:bg-violet-500 transition-colors">
                    Back to Main Page
                </a>
            </div>
        </div>
    </div>
</x-app-layout>