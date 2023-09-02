@extends('layouts.main')

@section('container')
<h2>Tambahkan Category</h2>
<a href="/dashboard/admin" class="btn btn-danger">Kembali</a>

@if ($message = Session::get('msg'))
    <div class="alert alert-success alert-block">
        <strong>{{ $message }}</strong>
    </div>
@endif

@if ($message = Session::get('exist'))
    <div class="alert alert-danger alert-block">
        <strong>{{ $message }}</strong>
    </div>
@endif

<form action="{{url('/dashboard/category')}}" method="post">
    @csrf
    <input type="text" name="name" id="" placeholder="Masukkan Nama Category">
    <input type="submit" value="Submit">
</form>
@endsection
