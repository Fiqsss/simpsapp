@extends('layout.app')
@section('content')
<div class="produk-wrapper d-flex">
    @include('components.sidebar')
    <div class="content w-100 m-5">
        <div class="row">
            <div class="col-md-12">
                <img width="150" src="{{ asset('storage/userimg/' . $user->userimg) }}" alt="">
                <h2 class="mt-4">{{ $user->name }}</h2>
            </div>
            <div class="col-md-12 d-flex mt-3">
                <div class="kandidat w-100 me-3">
                    <label for="">Nama Kandidat</label>
                    <input placeholder="@ {{ $user->name }}" readonly class="form-control w-100 mt-2" type="text">
                </div>
                <div class="posisi-kandidat w-100 ms-3">
                    <label for="">Posisi Kandidat</label>
                    <input placeholder="</> {{ $user->posisi }}" readonly class="form-control w-100 mt-2" type="text">
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
