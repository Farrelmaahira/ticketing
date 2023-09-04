@extends('layouts.dashboard')

@section('container')

<div class="row d-flex justify-content-center align-items-center h-100 mb-5">
    <div class="col-12 col-md-8 col-lg-6 col-xl-5">
    <div class="card shadow-2-strong" style="border-radius: 6px">
        <div class="card-body p-5 text-center">

        <h3 class="mb-5">Edit Akun Pengguna</h3>
        @if ($message = Session::get('msg'))
            <div class="alert alert-success alert-block">
                <strong>{{ $message }}</strong>
            </div>
        @endif
        @foreach ($data as $user)

        <form action="/dashboard/category/{{ $user->id }}" method="POST">
            @csrf
            @method('put')

            <div class="form-outline mb-4">
                <input
                name="name"
                type="text"
                id="typeTextX-2"
                class="form-control form-control-lg"
                required
                placeholder="Masukkan Nama Category"
                value="{{ $user->name }}"
                />
            </div>

        <button class="btn btn-primary btn-lg btn-block" type="submit" style="border-radius: 4px">
            Daftar
        </button>
        </form>
                    
        @endforeach
        </div>
    </div>
    </div>
</div>

@endsection