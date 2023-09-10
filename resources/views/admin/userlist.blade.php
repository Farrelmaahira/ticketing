@extends('layouts.dashboard')

@section('container')
@if ($message = Session::get('msg'))
<div class="alert alert-danger alert-block">
    <strong>{{ $message }}</strong>
</div>
@endif
<div class="row d-flex justify-content-center align-items-center  mb-5">
    <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <h3>List Pengguna</h3>
    <div class="table-review">
        <table class="table" style="text-align: center;">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Pengguna</th>
                    <th scope="col">Email Pengguna</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody style="color:black;">
                <?php $no = 1 ?>
                @foreach ($data as $user)
                <tr>
                    <th scope="row">{{ $no++ }}</th>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <form action="/dashboard/user/{{ $user->id }}" method="POST">
                            @csrf
                            @method('delete')
                            <a href="/dashboard/user/{{ $user->id }}" class="btn btn-info">Edit</a>
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    </div>
</div>

@endsection