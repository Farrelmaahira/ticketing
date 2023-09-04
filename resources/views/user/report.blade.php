@extends('layouts.main')

@section('container')


<div class="vh-100" style="background-color: #508bfc;">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="myCard card m-auto" style="width: 30rem;">
                    <div class="card-body">
                        <form action="{{ url('/dashboard/report') }}" method="post">
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
                                <h6>Tulis Laporan Anda</h6>
                                <textarea name="description" class="form-control" placeholder="Tulis laporan anda" id="floatingTextarea2" style="height: 100px"></textarea>
                            </div>
                            <input class="btn btn-success mt-2" type="submit" value="Submit">
                            <a href="{{ URL::previous() }}" class="btn btn-danger mt-2">Go Back</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection