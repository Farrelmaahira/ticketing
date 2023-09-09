@extends('layouts.dashboard')

@section('container')

@foreach ($data as $item)

    <div style="background-color: rgba(0, 0, 0, 0.1);
                padding: 2vh;
                color: black;
                borer-radius: 3px;
                border-radius: 3px;
                ">
        <div id="navigate">
            <a href="/dashboard/report" class="btn btn-danger">Go Back</a>
            <a href="" class="btn btn-info  "> Print To PDF </a>
        </div>
        <div class="content">
            <h2 class="d-flex justify-content-center"><b>Judul Laporan</b></h2>
            <h3 class="singleHead">{{ $item->title }}</h3>
            <div class="img d-flex justify-content-center">
                <img src="{{ asset('images/' . $item->image) }}" alt="No Image" class="border border-dark" width="300" style="height: auto; border-radius: 2px;">
            </div>
            <div class="description d-flex justify-content-center mt-2">
                <p>{{ $item->description }}</p>
            </div>
        </div>
        <div class="d-flex justify-content-center">
            <form action="/dashboard/report/{{ $item->id }}" method="POST">
                @csrf
                @method('delete')
                <a href="/dashboard/report/edit/{{ $item->id }}"><button type="button" class="btn btn-info">Edit</button></a>
                <button type="submit" class="btn btn-danger">Hapus</button>
            </form>
        </div>
    </div>

@endforeach

@endsection