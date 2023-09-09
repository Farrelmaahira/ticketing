@extends('layouts.main')

@section('container')


<div class="vh-100" style="background-color: #508bfc;">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="myCard card m-auto" style="width: 30rem;">
                    <div class="card-body">
                        <form action="{{ url('/dashboard/report') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @if ($message = Session::get('success'))
                            <div class="alert alert-success alert-block">
                                <strong>{{ $message }}</strong>
                            </div>
                            @endif
                            <h6>Pilih Kategori Laporan</h6>
                            <select name="category_id" class="form-select mb-2" aria-label="Default select example">
                                @foreach ($data as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            <div class="form-floating">
                                <div class="form-group">
                                    <label for="user">Judul Laporan Anda</label>
                                    <input type="text" id="formGroupExampleInput" class="form-control mb-2" name="title" id="" placeholder="Judul Laporan Anda *">
                                </div>
                                <div class="form-group">
                                    <h6>Tulis Isi Laporan Anda</h6>
                                    <textarea name="description" class="form-control mb-2" placeholder="Isi Laporan Anda *" id="floatingTextarea2" style="height: 100px" required></textarea>
                                    <h6>Upload Foto (Optional)</h6>
                                    <input type="file" name="image" id="">
                                </div>
                            </div>
                            <input class="btn btn-success mt-2" type="submit" value="Submit">
                            <a href="/" class="btn btn-danger mt-2">Go Back</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection