@extends('layouts.main')

@section('container')
@if ($errors->any())
   @foreach ($errors->all() as $error)
      {{$error}} 
   @endforeach 
@endif
<div class="vh-100" style="background-color: #508bfc;">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="card shadow-2-strong" style="border-radius: 6px;">
                    <div class="card-body p-5 text-center">
                    
                    <img src="{{ URL::asset('img/cy.jfif') }}" class="img-thumbnail mb-3" alt="..." width="100" height="100">
                    <h3 class="mb-5">Masuk</h3>

                    <form action="{{url('/auth/login')}}" method="POST">   
                        @csrf
                        <div class="form-outline mb-4">
                            <input name="email" type="email" id="typeEmailX-2" class="form-control form-control-lg" required placeholder="Email" />
                        </div>
            
                        <div class="form-outline mb-4">
                            <input name="password" type="password" id="typePasswordX-2" class="form-control form-control-lg" required placeholder="Password"/>
                        </div>
            
                        <button class="btn btn-primary btn-lg btn-block" type="submit" style="border-radius: 4px">Masuk</button>
                    </form>
                    
                    <div class="col-12">
                        <br>
                        <p class="small mb-0">Belum punya akun?
                        <a href="/register">Daftar disini</a></p>
                    </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection