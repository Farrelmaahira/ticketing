@extends('layouts.dashboard')

@section('container')

<div class="welcome">
    <h2>Welcome, {{ Auth::user()->name }}</h2>
</div>

@endsection