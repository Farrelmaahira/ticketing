@extends('layouts.dashboard')

@section('container')

@if ($message = Session::get('msg'))
<div class="alert alert-success alert-block">
    <strong>{{ $message }}</strong>
</div>
@endif
<div class="row d-flex justify-content-center align-items-center mb-5">
    <div class="col-12 col-md-8 col-lg-6 col-xl-5">
    <div class="card shadow-2-strong" style="border-radius: 6px">
        <div class="card-body p-5 text-center">

        <h3 class="mb-5">Edit Akun Pengguna</h3>

        @foreach ($data as $user)

        <form action="/dashboard/user/{{ $user->id }}" method="POST">
            @csrf
            @method('put')
        <div class="form-outline mb-4">
            <input
            name="email"
            type="email"
            id="typeEmailX-2"
            class="form-control form-control-lg"
            required
            placeholder="Email"
            value="{{ $user->email }}"
            />
        </div>

        <div class="form-outline mb-4">
            <input
            name="name"
            type="text"
            id="typeTextX-2"
            class="form-control form-control-lg"
            required
            placeholder="Username"
            value="{{ $user->name }}"
            />
        </div>

        <div class="form-outline mb-4">
            <input
            name="password"
            type="password"
            id="typePasswordX-2"
            class="form-control form-control-lg"
            required
            placeholder="Password"
            value="{{ $user->password }}"
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