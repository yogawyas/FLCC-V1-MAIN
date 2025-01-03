<!-- resources/views/admin/news/edit.blade.php -->
<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h2 class="text-2xl font-bold mb-4">Edit News</h2>

                    <form action="{{ route('admin.news.update', $news) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        
                        <div class="mb-4">
                            <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                            <input type="text" name="title" id="title" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" value="{{ old('title', $news->title) }}" required>
                            @error('title')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="content" class="block text-sm font-medium text-gray-700">Content</label>
                            <textarea name="content" id="content" rows="5" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>{{ old('content', $news->content) }}</textarea>
                            @error('content')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        @if($news->image)
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">Current Image</label>
                            <img src="{{ asset('storage/' . $news->image) }}" alt="Current Image" class="mt-1 h-32 w-auto">
                        </div>
                        @endif

                        <div class="mb-4">
                            <label for="image" class="block text-sm font-medium text-gray-700">New Image</label>
                            <input type="file" name="image" id="image" class="mt-1 block w-full" accept="image/*">
                            @error('image')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="flex items-center">
                                <input type="checkbox" name="is_featured" class="rounded border-gray-300 text-indigo-600 shadow-sm" value="1" {{ old('is_featured', $news->is_featured) ? 'checked' : '' }}>
                                <span class="ml-2 text-sm text-gray-600">Featured News</span>
                            </label>
                        </div>

                        <div class="flex justify-end gap-4">
                            <a href="{{ route('admin.news.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">Cancel</a>
                            <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">Update News</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>