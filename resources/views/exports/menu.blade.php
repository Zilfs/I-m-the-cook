<table>
    <thead>
        <tr>
            <th>No.</th>
            <th>ID Menu</th>
            <th>Nama Menu</th>
            <th>Harga</th>
        </tr>
    </thead>
    <tbody>
        @php
            $no = 1;
        @endphp
        @foreach ($menu as $item)
            <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $item->id }}</td>
                <td>{{ $item->nama_menu }}</td>
                <td>{{ $item->harga }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
