<table>
    <thead>
        <tr>
            <th>No.</th>
            <th>ID Transaksi</th>
            <th>ID Pelanggan</th>
            <th>Total</th>
            <th>Bayar</th>
            <th>Time</th>
        </tr>
    </thead>
    <tbody>
        @php
            $no = 1;
        @endphp
        @foreach ($transaksi as $item)
            <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $item->id }}</td>
                <td>{{ $item->id_pelanggan }}</td>
                <td>{{ $item->total }}</td>
                <td>{{ $item->bayar }}</td>
                <td>{{ $item->created_at->toDateTimeString() }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
