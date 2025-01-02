@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Ministry</h1>
        
        <!-- Form untuk edit ministry -->
        <form action="{{ route('ministries.edit', $ministry->id) }}" method="POST">
            @csrf
            @method('PUT')  <!-- Jika Anda menggunakan metode PUT untuk update -->

            <div class="mb-3">
                <label for="name" class="form-label">Ministry Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $ministry->name) }}">
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description">{{ old('description', $ministry->description) }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
