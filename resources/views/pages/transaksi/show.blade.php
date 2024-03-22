@extends('layouts.dashboard')

@section('contents')
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h5>Data Pesanan</h5>
                </div>
                @if (session()->has('success-checkout'))
                    <div class="alert alert-success fw-bold text-white px-3 pt-3 m-4">
                        <i class="fa fa-circle-check fa-lg"></i> {{ session()->get('success-checkout') }}
                    </div>
                @endif
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
                    <form role="form">
                        @csrf
                        <div class="my-3">
                            <label for="total">Total Harga</label>
                            <input type="text" class="form-control form-control-lg" aria-label="Total" name="total"
                                value="{{ $total }}" readonly>
                        </div>
                        <div class="my-3">
                            <label for=" bayar">Bayar</label>
                            <input type="text" class="form-control form-control-lg" placeholder="Bayar"
                                aria-label="Bayar" name="bayar" id="bayar" value="{{ $transaksi->bayar }}" readonly>
                        </div>
                        <div class="my-3">
                            <label for="kembalian">Kembalian</label>
                            <input type="text" class="form-control form-control-lg" aria-label="Kembalian"
                                name="kembalian"
                                value="{{ $transaksi->bayar - $total >= 0 ? $transaksi->bayar - $total : '-' }}"
                                id="kembalian" readonly>
                        </div>
                        <div class="text-center">
                            <a href="{{ route('receipt', $transaksi->id) }}"
                                class="btn btn-lg btn-success btn-lg w-100 mt-4 mb-0"><i
                                    class="fa fa-receipt me-2"></i>Cetak Struk</a>
                            <a href="{{ route('transaksi.index') }}"
                                class="btn btn-lg btn-primary btn-lg w-100 mt-4 mb-0">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script>
        document.getElementById('bayar').addEventListener('input', function() {
            var bayar = parseFloat(document.getElementById('bayar').value);
            var total = parseFloat('{{ $total }}');
            var kembalian = bayar - total;
            if (!isNaN(kembalian) && kembalian >= 0) {
                document.getElementById('kembalian').value = kembalian;
            } else {
                document.getElementById('kembalian').value = 'Uang yang dibayarkan kurang';
            }
        });
    </script>
@endpush
