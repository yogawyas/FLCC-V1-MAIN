@extends('layouts.app')

@section('content')
<h1>Admin Login</h1>
<form method="POST" action="{{ route('admin.login') }}">
    @csrf
    <label for="email">Admin Email:</label>
    <input type="email" name="email" id="email" required>
    
    <label for="password">Password:</label>
    <input type="password" name="password" id="password" required>
    
    <button type="submit">Admin Login</button>
</form>
@endsection