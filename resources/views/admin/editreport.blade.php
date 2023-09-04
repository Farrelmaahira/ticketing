@extends('layouts.dashboard')

@section('container')
@foreach ($data as $item)
<div class="row d-flex justify-content-center align-items-center h-100">
    <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="myCard card m-auto" style="width: 30rem;">
            <div class="card-body">
                <form action="{{ url('/dashboard/report') }}" method="post">
                    @csrf
                    <h6>Pilih Kategori Laporan</h6>
                    <select name="category_id" class="form-select mb-2" aria-label="Default select example">
                        @foreach ($data as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                    <div class="form-floating">
                        <h6>Tulis Laporan Anda</h6>
                        <textarea name="description" class="form-control" placeholder="Tulis laporan anda" id="floatingTextarea2" style="height: 100px" value="{{ $item->description }}"></textarea>
                    </div>
                    <input class="btn btn-success mt-2" type="submit" value="Submit">
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection