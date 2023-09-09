@extends('layouts.dashboard')

@section('container')
@if ($message = Session::get('msg'))
<div class="alert alert-danger alert-block">
    <strong>{{ $message }}</strong>
</div>
@endif
<div class="table-review">
    <h3>List Laporan</h3>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Judul</th>
                <th scope="col">Kategori</th>
                <th scope="col">Pelapor</th>
                <th scope="col">Laporan</th>
                <th scope="col">Foto</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1 ?>
            @foreach ($data as $rep)
            <tr>
                <th scope="row">{{ $no++ }}</th>
                <td>{{ $rep->title }}</td>
                <td>{{ $rep->category->name }}</td>
                <td>{{ $rep->user->name }}</td>
                <td>{{ $rep->description }}</td>
                <td><img src="{{ asset('images/' . $rep->image) }}" alt="No Image" width="100" height="100"></td>
                <td>
                    <a href="/dashboard/report/{{ $rep->id }}"><button type="button" class="btn btn-success mb-1">Details</button></a>
                    <form action="/dashboard/report/{{ $rep->id }}" method="POST">
                        @csrf
                        @method('delete')
                        <a href="/dashboard/report/edit/{{ $rep->id }}"><button type="button" class="btn btn-info">Edit</button></a>
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection