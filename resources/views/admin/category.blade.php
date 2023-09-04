@extends('layouts.dashboard')

@section('container')

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

<div class="row d-flex justify-content-center align-items-center h-100 mb-5">
    <div class="col-12 col-md-8 col-lg-6 col-xl-5">
    <div class="card shadow-2-strong" style="border-radius: 6px">
        <div class="card-body p-5 text-center">

        <h3 class="mb-5">Daftarkan Kategori</h3>
        
        <form action="{{url('/dashboard/category')}}" method="POST">
            @csrf

        <div class="form-outline mb-4">
            <input
            name="name"
            type="text"
            id="typeTextX-2"
            class="form-control form-control-lg"
            required
            placeholder="Masukkan Nama Category"
            />
        </div>

        <button class="btn btn-primary btn-lg btn-block" type="submit" style="border-radius: 4px">
            Daftar
        </button>
        </form>
        </div>
    </div>
    </div>
</div>



@endsection
