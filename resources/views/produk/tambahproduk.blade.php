@extends('layout.app')
@section('content')
    <div class="produk-wrapper d-flex">
        @include('components.sidebar')
        <livewire:produk.tambahproduk :page=$page :kategoris=$kategoris />
    </div>
@endsection

@push('js')
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="{{ asset('assets/js/custom.js') }}"></script>
    <script>
        @if (session('success'))
            swal.fire(
                'Berhasil!',
                '{{ session('success') }}',
                'success'
            )
        @endif
        @if ($errors->any())
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: '{{ $errors->first() }}',
            });
        @endif
    </script>
@endpush
