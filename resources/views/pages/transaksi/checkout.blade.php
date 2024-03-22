@extends('layouts.dashboard')

@section('contents')
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h5>Data Pesanan</h5>
                </div>
                <div class="card-body px-4 py-4">
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
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Harga</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Jumlah</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                    $total = 0;
                                @endphp
                                @foreach ($data as $item)
                                    <tr>
                                        <td class="text-center">
                                            {{ $no++ }}
                                        </td>
                                        <td class="">
                                            <p class="text-sm font-weight-bold mb-0">
                                                {{ $item->menu->nama_menu ?? '' }}</p>
                                        </td>
                                        <td class="">
                                            <p class="text-sm font-weight-bold mb-0">Rp. {{ $item->menu->harga ?? '' }} ,-
                                            </p>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span class="badge bg-gradient-success">{{ $item->jumlah ?? '' }}
                                            </span>
                                        </td>

                                        <td class="align-middle text-center">
                                            <p class="text-sm font-weight-bold mb-0">
                                                {{ $item->menu->harga * $item->jumlah }}</p>
                                        </td>
                                    </tr>
                                    @php
                                        $total += $item->menu->harga * $item->jumlah;
                                    @endphp
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                    <form role="form" method="POST" action="{{ route('checkout', $id_pelanggan) }}">
                        @csrf
                        <div class="my-3">
                            <label for="total">Total Harga</label>
                            <input type="text" class="form-control form-control-lg" aria-label="Total" name="total"
                                value="{{ $total }}" readonly>
                        </div>
                        <div class="my-3">
                            <input type="text" class="form-control form-control-lg" placeholder="Bayar"
                                aria-label="Bayar" name="bayar" required>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-lg btn-success btn-lg w-100 mt-4 mb-0">Submit</button>
                            <a href="{{ route('transaksi.index') }}"
                                class="btn btn-lg btn-primary btn-lg w-100 mt-4 mb-0">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
