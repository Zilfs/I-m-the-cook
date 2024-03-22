<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        table,
        th,
        td {
            border: 1px solid black;
            border-collapse: collapse;
            align-items: center;
            justify-content: center;
            text-align: center
        }
    </style>
</head>

<body>
    <h2>Laporan Data Transaksi</h2>
    <table>
        <thead>
            <tr>
                <th style="width: 100px">
                    #
                </th>
                <th style="width: 300px">
                    Tanggal / waktu</th>
                <th style="width: 300px">
                    Pendapatan</th>
            </tr>
        </thead>
        <tbody>
            @php
                $no = 1;
            @endphp
            @foreach ($data as $item)
                <tr>
                    <td>
                        {{ $no++ }}
                    </td>
                    <td class="">
                        {{ $item->created_at }}
                    </td>
                    <td class="">
                        Rp. {{ $item->total }}, -
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <h3>Total Pendapatan: Rp. {{ $total_pendapatan }}, -</h3>
</body>

</html>
