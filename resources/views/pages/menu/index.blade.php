@extends('layouts.dashboard')

@section('contents')
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0 container align-items-center">
                    <div class="row">
                        <div class="col col-12 col-md-6">
                            <h5 class="">Tabel Data Menu</h5>
                        </div>
                        <div class="col col-12 col-md-6">
                            <form action="{{ route('menu.index') }}" method="get" class="justify-content-end d-flex">
                                <div class="me-2">
                                    <input type="text" class="form-control" placeholder="Cari menu.." name="search">
                                </div>
                                <button class="btn btn-primary"><i class="fa fa-search"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
                @if (session()->has('insert-data-success'))
                    <div class="alert alert-success fw-bold text-white px-3 pt-3 m-4">
                        <i class="fa fa-circle-check fa-lg"></i> {{ session()->get('insert-data-success') }}
                    </div>
                @endif
                @if (session()->has('update-data-success'))
                    <div class="alert alert-warning fw-bold text-white px-3 pt-3 m-4">
                        <i class="fa fa-circle-check fa-lg"></i> {{ session()->get('update-data-success') }}
                    </div>
                @endif
                @if (session()->has('delete-data-success'))
                    <div class="alert alert-danger fw-bold text-white px-3 pt-3 m-4">
                        <i class="fa fa-circle-check fa-lg"></i> {{ session()->get('delete-data-success') }}
                    </div>
                @endif
                @if (session()->has('restore-data-success'))
                    <div class="alert alert-primary fw-bold text-white px-3 pt-3 m-4">
                        <i class="fa fa-circle-check fa-lg"></i> {{ session()->get('restore-data-success') }}
                    </div>
                @endif
                <a href="{{ route('menu.create') }}" class="btn btn-success mx-4 mt-4">Tambah Menu Baru</a>
                <a href="{{ route('deleted-menu') }}" class="btn btn-primary mx-4">Data Menu Yang Terhapus</a>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-2">
                            <thead>
                                <tr>
                                    <th
                                        class="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7">
                                        #
                                    </th>
                                    <th
                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2 w-50">
                                        Nama</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Harga</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @foreach ($data as $item)
                                    <tr>
                                        <td class="text-center">
                                            {{ $no++ }}
                                        </td>
                                        <td class="">
                                            <p class="text-sm font-weight-bold mb-0">{{ $item->nama_menu }}</p>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span class="badge bg-gradient-success">Rp. {{ $item->harga }}
                                                ,-</span>
                                        </td>
                                        <td class="align-middle text-center pt-4">
                                            <a href="{{ route('menu.edit', $item->id) }}"
                                                class="btn btn-sm btn-warning">Ubah</a>
                                            <a href="" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                                data-bs-target="#deleteModal{{ $item->id }}">Hapus</a>

                                        </td>
                                    </tr>
                                    <div class="modal fade" id="deleteModal{{ $item->id }}" tabindex="-1"
                                        aria-labelledby="deleteModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-body">
                                                    <div class="d-flex justify-content-center align-items-center"
                                                        style="height: 250px">
                                                        <i class="fa-solid fa-exclamation fa-bounce fa-2xl h-75"
                                                            style="color: #ea2e2e;"></i>
                                                    </div>

                                                    <div class="text-center">
                                                        <h4>Yakin mau dihapus?</h4>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Ngga jadi</button>
                                                    <form action="{{ route('menu.destroy', $item->id) }}" method="POST">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit" class="btn btn-danger">Yakin</button>
                                                    </form>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
