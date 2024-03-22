<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <center>
        <h2>Struk Pembayaran</h2>
    </center>
    Tanggal / waktu : {{ $transaksi->created_at }} <br>
    <hr>
    <table>
        @foreach ($pesanan as $item)
            <tr>
                <td style="width: 300px">{{ $item->menu->nama_menu }} <br> Rp. {{ $item->menu->harga }}, -</td>
                <td style="width: 150px">Qty. x {{ $item->jumlah }}</td>
                <td style="width: 150px">Rp. {{ $item->menu->harga * $item->jumlah }}, -</td>
            </tr>
        @endforeach

    </table>
    <hr>
    <h3>Total : Rp. {{ $transaksi->total }}, -</h3>
    Bayar : Rp. {{ $transaksi->bayar }}, - <br>
    Kembalian : Rp. {{ $transaksi->bayar - $transaksi->total >= 0 ? $transaksi->bayar - $transaksi->total : '0' }}, -
</body>

</html>
