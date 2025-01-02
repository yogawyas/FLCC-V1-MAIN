


@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Add New Ministry</h1>

    <form action="{{ route('ministries.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Ministry Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <button type="submit" class="btn btn-success">Save</button>
        <a href="{{ route('ministries.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection