@extends('layouts.dashboard')

@section('container')

<div class="welcome">
    <h2>Welcome, <b>{{ Auth::user()->name }}</b></h2>
    <hr>
</div>
<h3 class="text-center">Data Terbaru</h3>
<div class="newWrapper">
    <div class="latest d-flex justify-content-between">
        <div class="latReport" style="padding: 10px">
            <table class="table">
                <tr>
                    <th>Laporan</th>
                    <th>Pelapor</th>
                </tr>
                @foreach ($latReport as $rep)
                <tr>
                    <td>{{ $rep->description }}</td>
                    <td>{{ $rep->user->name }}</td>
                </tr>
                @endforeach
                <tr>
                    <td>
                        <small><a href="/dashboard/report">view more...</a></small>
                    </td>
                </tr>
            </table>
        </div>
        <div class="latCategory" style="padding: 10px">
            <table class="table">
                <tr>
                    <th>Kategori</th>
                </tr>
                @foreach ($latCategory as $rep)
                <tr>
                    <td>{{ $rep->name }}</td>
                </tr>
                @endforeach
                <tr>
                    <td>
                        <small><a href="/dashboard/category">view more...</a></small>
                    </td>
                </tr>
            </table>
        </div>
        <div class="latUser" style="padding: 10px">
            <table class="table">
                <tr>
                    <th>Nama User</th>
                    <th>Email User</th>
                </tr>
                @foreach ($latUser as $rep)
                <tr>
                    <td>{{ $rep->name }}</td>
                    <td>{{ $rep->email }}</td>
                </tr>
                @endforeach
                <tr>
                    <td>
                        <small><a href="/dashboard/user">view more...</a></small>
                    </td>
                </tr>
            </table>
        </div>
    </div>
    .
</div>

@endsection