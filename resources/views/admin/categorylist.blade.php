@extends('layouts.dashboard')

@section('container')
<div class="row d-flex justify-content-center align-items-center h-100 mb-5">
    <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <h3>List Kategori</h3>
        <div class="table-review">
            <table class="table" style="text-align: center">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Kategori</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1 ?>
                    @foreach ($data as $kat)
                    <tr>
                        <th scope="row">{{ $no++ }}</th>
                        <td>{{ $kat->name }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection