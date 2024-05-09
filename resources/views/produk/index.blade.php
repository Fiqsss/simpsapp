@extends('layout.app')
@section('content')
    <div class="produk-wrapper d-flex">
        @include('components.sidebar')
        @if ($produks->isEmpty())
            <div class="content w-100 m-5">
                <div class="search-wrapper">
                    <h3>Daftar Produk</h1>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="search my-4 d-flex">
                                <form class="d-flex" method="GET" action="{{ route('produk.index') }}">
                                    <input type="text" name="keyword" class="form-control w-100" placeholder="Cari Barang">
                                </form>
                                <div class="dropdown mx-3 ">
                                    <a class="btn btn-white dropdown-toggle border-1 border-dark shadow-sm" href="#"
                                        role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        {{ $kategori_select ? $kategori_select->nama_kategori : 'Semua' }}
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="{{ route('produk.index') }}">Semua</a></li>
                                        @foreach ($kategoris as $data)
                                            <li>
                                                <a class="dropdown-item"
                                                    href="{{ route('produk.index', ['kategori' => $data->id]) }}">{{ $data->nama_kategori }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <div class="fitures-wrapper">
                                <a href="{{ route('produk.export', ['keyword' => request('keyword'), 'kategori' => request('kategori')]) }}"
                                    class="btn btn-success">
                                    <img class="mb-1" style="width: 1rem; height: 1rem"
                                        src="{{ asset('assets/img/components/MicrosoftExcelLogo.png') }}" alt="">
                                    Export
                                    Excel</a>
                                <a href="/produk/create" class="btn btn-danger"><img
                                        src="{{ asset('assets/img/components/PlusCircle.png') }}" alt=""> Tambah
                                    Produk</a>
                            </div>
                        </div>
                </div>
                <table class="table table-borderless shadow-sm">
                    <thead>
                        <tr style="background-color:#F9F9F9 !important" class="table-active">
                            <th>No</th>
                            <th scope="col">Image</th>
                            <th scope="col">Nama Produk</th>
                            <th scope="col">Kategori Produk</th>
                            <th scope="col">Harga Beli (Rp)</th>
                            <th scope="col">Harga Jual (Rp)</th>
                            <th scope="col">Stock Produk</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="">
                        <tr class="text-center w-100">
                            <td colspan="8">
                                <h3>Tidak ada data produk</h3>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        @else
            <div class="content w-100 m-5">
                <div class="search-wrapper">
                    <h3>Daftar Produk</h1>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="search my-4 d-flex">
                                <form class="d-flex" method="GET" action="{{ route('produk.index') }}">
                                    {{-- @csrf --}}
                                    <input type="text" name="keyword" class="form-control w-100"
                                        placeholder="Cari Barang">

                                </form>
                                <div class="dropdown mx-3 ">
                                    <a class="btn btn-white dropdown-toggle border-1 border-dark shadow-sm" href="#"
                                        role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        {{ $kategori_select ? $kategori_select->nama_kategori : 'Semua' }}
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="{{ route('produk.index') }}">Semua</a></li>
                                        @foreach ($kategoris as $data)
                                            <li>
                                                <a class="dropdown-item"
                                                    href="{{ route('produk.index', ['kategori' => $data->id]) }}">{{ $data->nama_kategori }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <div class="fitures-wrapper">
                                <a href="{{ route('produk.export', ['keyword' => request('keyword'), 'kategori' => request('kategori')]) }}"
                                    class="btn btn-success">
                                    <img class="mb-1" style="width: 1rem; height: 1rem"
                                        src="{{ asset('assets/img/components/MicrosoftExcelLogo.png') }}" alt="">
                                    Export
                                    Excel</a>
                                <a href="/produk/create" class="btn btn-danger"><img class="mb-1"
                                        style="width: 1rem; height: 1rem"
                                        src="{{ asset('assets/img/components/PlusCircle.png') }}" alt=""> Tambah
                                    Produk</a>
                            </div>
                        </div>
                </div>
                <table class="table table-borderless shadow-sm">
                    <thead>
                        <tr style="background-color:#F9F9F9 !important" class="table-active">
                            <th>No</th>
                            <th scope="col">Image</th>
                            <th scope="col">Nama Produk</th>
                            <th scope="col">Kategori Produk</th>
                            <th scope="col">Harga Beli (Rp)</th>
                            <th scope="col">Harga Jual (Rp)</th>
                            <th scope="col">Stock Produk</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="">
                        @foreach ($produks as $key => $data)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td class="text-center " style="width: 100px;"><img class="img-fluid w-50"
                                        src="{{ asset('storage/fotoproduk/' . $data->image_path) }}" alt="">
                                </td>
                                <td>{{ $data->nama_produk }}</td>
                                <td>{{ $data->kategori->nama_kategori }}</td>
                                <td>Rp.{{ number_format($data->harga_beli, 0, ',', '.') }}</td>
                                <td>Rp.{{ number_format($data->harga_jual, 0, ',', '.') }}</td>
                                <td>{{ $data->stok }}</td>
                                <td>
                                    <a href="{{ route('produk.edit', $data->id) }}" class="btn btn-sm"><img
                                            src="{{ asset('assets/img/components/edit.png') }}" alt=""></a>
                                    <a class="btn btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#delete{{ $data->id }}"><img
                                            src="{{ asset('assets/img/components/delete.png') }}" alt=""></a>
                                </td>
                                @include('produk.deleteproduk')
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $produks->withQueryString()->links('pagination::bootstrap-5') }}
            </div>
        @endif
    </div>
@endsection

@push('js')
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
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const sidebar = document.querySelector('.sidebar');
            const toggleButton = document.querySelector('.sidebar .header button');

            toggleButton.addEventListener('click', function() {
                sidebar.classList.toggle('hidden'); // Togle kelas "hidden" pada sidebar saat tombol diklik
            });
        });
    </script>
@endpush
