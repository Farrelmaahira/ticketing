@extends('layouts.dashboard')

@section('container')
<h1>
    ini dashboard admin
</h1>
<form action="{{url('/auth/logout')}}" method="post">
    @csrf
    <input class="btn btn-danger" type="submit" value="Logout">
</form>

<a href="/dashboard/category"><h2>Create Category</h2></a>
<a href="/review"><h2>Review Reports</h2></a>

@endsection