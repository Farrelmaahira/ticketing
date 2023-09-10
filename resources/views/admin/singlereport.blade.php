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
            <a href="" class="btn btn-success  "> Print To PDF </a>
        </div>
        <div class="content">
            <h3 class="singleHead"><b>{{ $item->title }}</b></h3>
            <p class="d-flex justify-content-center">Pelapor : {{ $item->user->name }}</p>
            @if ($item->image == 0)
                <div class="img c"> </div>
            @else
                <div class="img d-flex justify-content-center">
                    <img src="{{ asset('images/' . $item->image) }}" alt="No Image" class="border border-dark" width="300" style="height: auto; border-radius: 2px;">
                </div>
            @endif
            <div class="description d-flex justify-content-center mt-2">
                <h5 class="mt-2 mx-5">{{ $item->description }}</h5>
            </div>
            <p class="description d-flex justify-content-center">Dilaporkan Pada Tanggal : {{ $item->created_at }}</p>
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