@extends('layouts.dashboard')

@section('contents')
    <div class="row">
        <div class="col-12 card p-4">
            <a href="{{ route('pesanan.show', $id_pelanggan) }}" class="btn btn-primary">Lihat Pesanan</a>
        </div>
        @foreach ($menu as $item)
            <div class="col-5 card p-4 m-2 d-flex flex-row align-items-center">
                <div class="w-75">
                    <p class="text-sm mb-0 text-uppercase font-weight-bold">{{ $item->nama_menu }}</p>
                    Rp. {{ $item->harga }} ,-
                </div>
                <div class="w-25 justify-content-center">
                    <a href="" data-bs-toggle="modal" data-bs-target="#addPesanan{{ $item->id }}"><i
                            class="fa-solid text-primary fa-2xl fa-square-plus ms-5"></i></a>
                </div>
            </div>
            <div class="modal fade" id="addPesanan{{ $item->id }}" tabindex="-1" aria-labelledby="addPesananLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <form action="{{ route('add-pesanan', $id_pelanggan) }}" method="POST">
                            @csrf
                            <div class="modal-body">
                                <div class="text-center">
                                    <h4 class="my-4">{{ $item->nama_menu }}</h4>
                                    <div class="d-flex">
                                        <label for="jumlah" class="">Qty.</label>
                                    </div>
                                    <input type="number" class="form-control" name="jumlah" min="1">
                                    <input type="text" value="{{ $item->id }}" class="form-control" name="id_menu"
                                        hidden>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-success"><i
                                        class="fa-solid fa-white fa-md fa-cart-plus"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
