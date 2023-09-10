@extends('layouts.dashboard')

@section('container')
@if ($message = Session::get('msg'))
<div class="alert alert-danger alert-block">
    <strong>{{ $message }}</strong>
</div>
@endif
<div class="table-review text-center">
    <h3>List Laporan</h3>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Judul</th>
                <th scope="col">Kategori</th>
                <th scope="col">Pelapor</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody style="color: black">
            <?php $no = 1 ?>
            @foreach ($data as $rep)
            <tr>
                <th scope="row">{{ $no++ }}</th>
                <td>{{ $rep->title }}</td>
                <td>{{ $rep->category->name }}</td>
                <td>{{ $rep->user->name }}</td>
                <td>
                    <a href="/dashboard/report/{{ $rep->id }}"><button type="button" class="btn btn-success mb-1">Detail Laporan</button></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection