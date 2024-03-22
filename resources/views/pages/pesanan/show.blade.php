@extends('layouts.dashboard')

@section('contents')
    <div class="row">
        <div class="col-12">
            <div class="card py-4">
                <div class="card-header pb-0">
                    <h5>Data Pesanan {{ $pelanggan->nama_pelanggan }}</h5>
                </div>
                @if ($pelanggan->status != 'PAID')
                    <a href="{{ route('pesanan-for', $id_pelanggan) }}" class="btn btn-success m-4">Tambah Pesanan</a>
                @endif
                <a href="{{ route('pesanan.index') }}" class="btn btn-primary m-4">Kembali</a>
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
                                        Menu</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Jumlah</th>
                                    @if ($pelanggan->status != 'PAID')
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Aksi</th>
                                    @endif

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
                                            <p class="text-sm font-weight-bold mb-0">{{ $item->menu->nama_menu }}</p>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span class="badge bg-gradient-success">{{ $item->jumlah }}
                                            </span>
                                        </td>
                                        @if ($item->menu->deleted_at == null)
                                            @if ($pelanggan->status != 'PAID')
                                                <td class="align-middle text-center pt-4">
                                                    <a href="" class="btn btn-sm btn-warning" data-bs-toggle="modal"
                                                        data-bs-target="#editPesanan{{ $item->id }}">Edit</a>
                                                    <a href="" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                                        data-bs-target="#deleteModal{{ $item->id }}">Delete</a>

                                                </td>
                                            @endif
                                        @endif
                                        @if ($item->menu->deleted_at != null)
                                            <td class="align-middle text-center pt-4">
                                                <p class="text-danger text-sm">Tidak bisa melakukan aksi, karena data asli
                                                    dihapus. <br>Pulihkan data agar dapat melakukan aksi</p>
                                            </td>
                                        @endif

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
                                                        <h4>Are you sure want to delete this?</h4>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>
                                                    <form action="{{ route('delete-pesanan', [$item->id, $id_pelanggan]) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit" class="btn btn-danger">Delete</button>
                                                    </form>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal fade" id="editPesanan{{ $item->id }}" tabindex="-1"
                                        aria-labelledby="editPesananLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <form action="{{ route('edit-pesanan', [$item->id, $id_pelanggan]) }}"
                                                    method="POST">
                                                    @csrf
                                                    <div class="modal-body">
                                                        <div class="text-center">
                                                            <h4 class="my-4">{{ $item->menu->nama_menu }}</h4>
                                                            <div class="d-flex">
                                                                <label for="jumlah" class="">Qty.</label>
                                                            </div>
                                                            <input type="number" class="form-control" name="jumlah"
                                                                value="{{ $item->jumlah }}">
                                                            <input type="text" value="{{ $item->id }}"
                                                                class="form-control" name="id_menu" hidden>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-success"><i
                                                                class="fa-solid fa-white fa-md fa-cart-plus"></i></button>
                                                    </div>
                                                </form>
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
