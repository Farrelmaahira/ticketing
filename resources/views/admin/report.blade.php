@extends('layouts.dashboard')

@section('container')
<div class="table-review">
    <h3>List Laporan</h3>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Kategori</th>
                <th scope="col">Pelapor</th>
                <th scope="col">Laporan</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1 ?>
            @foreach ($report as $rep)
            <tr>
                <th scope="row">{{ $no++ }}</th>
                <td>{{ $rep->category->name }}</td>
                <td>{{ $rep->user->name }}</td>
                <td>{{ $rep->description }}</td>
                <td>
                    <a href="/dashboard/report/{{ $rep->id }}"><button type="button" class="btn btn-info">Edit</button></a>
                    <button type="button" class="btn btn-danger">Hapus</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection