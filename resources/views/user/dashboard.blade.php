@extends('layouts.main')

@section('container')

<div class="vh-100" style="background-color: #508bfc;">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="myCard card m-auto" style="width: 24rem;">
                    <div class="card-body">
                        <h5 class="card-title">Selamat Datang di Cyber Counselor Connect</h5>
                        <p class="card-text">Klik "Lapor" untuk melapor dan klik "Keluar" untuk logout</p>
                        <div id="button-place">
                            <a href="/dashboard/report" class="btn btn-success">Lapor</a>
                            <form action="{{url('/auth/logout')}}" method="post">
                                @csrf
                                <input class="btn btn-danger" type="submit" value="Keluar">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection