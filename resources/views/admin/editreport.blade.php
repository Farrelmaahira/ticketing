@extends('layouts.dashboard')

@section('container')

<div class="row d-flex justify-content-center align-items-center ">
    <div class="col-12 col-md-8 col-lg-6 col-xl-5 mb-4">
        <div class="myCard card m-auto" style="width: 30rem;">
            <div class="card-body">
                @foreach ($report as $item)
                <form action="/dashboard/report/{{ $item->id }}" method="post">
                    @method('put')
                    @csrf
                    <h6>Pilih Kategori Laporan</h6>
                    <select name="category_id" class="form-select mb-2" aria-label="Default select example">
                        @foreach ($categories as $cat)
                            <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                        @endforeach
                    </select>
                    <div class="form-floating">
                        <h6>Tulis Laporan Anda</h6>
                        <textarea name="description" class="form-control" placeholder="Tulis laporan anda" id="floatingTextarea2" style="height: 100px">{{ $item->description }}</textarea>
                    </div>
                    <input class="btn btn-success mt-2" type="submit" value="Submit">
                </form>
                @endforeach
            </div>
        </div>
    </div>
</div>

@endsection