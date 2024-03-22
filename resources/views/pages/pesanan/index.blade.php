@extends('layouts.dashboard')

@section('contents')
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h5>Tabel Data Pesanan</h5>
                </div>
                @if (session()->has('delete-data-success'))
                    <div class="alert alert-danger fw-bold text-white px-3 pt-3 m-4">
                        <i class="fa fa-circle-check fa-lg"></i> {{ session()->get('delete-data-success') }}
                    </div>
                @endif
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
                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2 w-25">
                                        Nama</th>
                                    <th class="text-center text-secondary text-xxs font-weight-bolder opacity-7 ps-2 w-25">
                                        Status</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @forelse ($data as $item)
                                    <tr>
                                        <td class="text-center">
                                            {{ $no++ }}
                                        </td>
                                        <td class="">
                                            <p class="text-sm font-weight-bold mb-0">{{ $item->nama_pelanggan }}</p>
                                        </td>
                                        <td class="align-middle text-center pt-4">
                                            @if ($item->status == 'PAID')
                                                <button disabled class="btn btn-sm btn-secondary">PAID</button>
                                            @endif
                                        </td>
                                        <td class="align-middle text-center pt-4">
                                            <a href="{{ route('pesanan.show', $item->id) }}"
                                                class="btn btn-sm btn-primary">View</a>
                                            <a href="" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                                data-bs-target="#deleteModal{{ $item->id }}">Hapus</a>
                                        </td>
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
                                                        <form action="{{ route('customer.destroy', $item->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('delete')
                                                            <button type="submit" class="btn btn-danger">Yakin</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </tr>
                                @empty
                                    <tr>
                                        <td class="text-danger fw-bold">
                                            Belum ada pesanan masuk
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
