@extends('layouts.main')

@section('container')
<a href="/dashboard/admin" class="btn btn-danger">Kembali</a>
<div class="table-review">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Kategori</th>
                <th scope="col">Laporan</th>
                <th scope="col">Pelapor</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1 ?>
            @foreach ($report as $rep)
            <tr>
                <th scope="row">{{ $no++ }}</th>
                <td>{{ $rep->category->name }}</td>
                <td>{{ $rep->description }}</td>
                <td>{{ $rep->user->name }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection