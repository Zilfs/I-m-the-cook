<table>
    <thead>
        <tr>
            <th>No.</th>
            <th>ID Pesanan</th>
            <th>ID Menu</th>
            <th>ID Pelanggan</th>
            <th>ID User</th>
            <th>Jumlah</th>
            <th>Time</th>
        </tr>
    </thead>
    <tbody>
        @php
            $no = 1;
        @endphp
        @foreach ($pesanan as $item)
            <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $item->id }}</td>
                <td>{{ $item->id_menu }}</td>
                <td>{{ $item->id_pelanggan }}</td>
                <td>{{ $item->id_user }}</td>
                <td>{{ $item->jumlah }}</td>
                <td>{{ $item->created_at->toDateTimeString() }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
