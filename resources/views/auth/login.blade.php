@extends('layout.app')

@section('content')
<div class="container mx-auto bg-white">
    <div style="height: 100vh" class="w-100 d-flex justify-content-center  align-items-center ">
        <div class="login-wrapper row shadow ">
            <div class="col-md-6 d-flex justify-content-center align-items-center ">
                <div class="w-100 px-5">
                    <div class="header-login ">
                        <h4 class="text-center"><i class="fas fa-shopping-bag"></i> SIMS Web App</h4>
                        <h3 class="mt-4 text-center">Masuk atau buat akun <br> untuk memulai</h3>
                    </div>
                    <form class="mt-5 px-5" method="post" action="/login">
                        @csrf
                        <input name="email"
                            class="form-control @error('email') is-invalid
                        @enderror" type="email"
                            placeholder="@ Masukan email anda">
                        @error('email')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <input name="password" class="form-control mt-4 @error('password') is-invalid
                        @enderror" type="password" placeholder="Masukan Password anda">

                        @error('password')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <button class="btn btn-danger text-white w-100 mt-5">Masuk</button>
                    </form>
                </div>
            </div>
            <div class="col-md-6 img-fluid d-flex justify-content-center align-items-center px-0">
                <img class="img-fluid" src="{{ asset('assets/img/components/Frame 98699.png') }}" alt="">
            </div>

        </div>
    </div>
</div>
@endsection
