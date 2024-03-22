@extends('layouts.dashboard')

@section('contents')
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h5>Masukkan data pemesanan</h5>
                </div>
                <div class="card-body px-4 py-4">
                    <form role="form" method="POST" action="{{ route('customer.store') }}">
                        @csrf
                        <div class="mb-3">
                            <input type="text" class="form-control form-control-lg" placeholder="Nama Customer"
                                aria-label="Nama Customer" name="nama_pelanggan" required>
                        </div>
                        <div class="mb-3">
                            <select class="form-select" aria-label="Default select example" name="no_meja">
                                <option selected>Pilih No Meja</option>
                                @forelse ($meja as $item)
                                    <option value="{{ $item->id }}">{{ $item->no_meja }}</option>
                                @empty
                                    <option selected value="{{ null }}">Tidak ada meja tersedia</option>
                                @endforelse
                            </select>
                        </div>
                        <div class="mb-3">
                            <select class="form-select" aria-label="Default select example" name="jenis_kelamin">
                                <option selected>Jenis Kelamin</option>
                                <option value="LAKI-LAKI">LAKI-LAKI</option>
                                <option value="PEREMPUAN">PEREMPUAN</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control form-control-lg" placeholder="No Telp"
                                aria-label="No Telp" name="no_hp">
                        </div>
                        <div class="mb-3">
                            <textarea class="form-control form-control-lg" placeholder="Alamat" aria-label="Alamat" name="alamat">
                            </textarea>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-lg btn-success btn-lg w-100 mt-4 mb-0">Submit</button>
                            <a href="{{ route('menu.index') }}"
                                class="btn btn-lg btn-primary btn-lg w-100 mt-4 mb-0">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
