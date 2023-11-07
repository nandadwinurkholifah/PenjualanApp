<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Produk</th>
            <th>Jumlah</th>
            <th>Harga</th>
            <th>Tanggal Transaksi</th>
            <th>Agen</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($transaksi as $data )
            <tr>
                <td>{{ $loop->iteration }} </td>
                <td>{{ $data->produk->nama_produk }} </td>
                <td>{{ $data->jumlah }} </td>
                <td>@rupiah($data->harga) </td>
                <td>{{ $data->transaksi->tgl_penjualan }} </td>
                <td>{{ $data->transaksi->agen->nama_toko }} </td>
            </tr>
        @endforeach
    </tbody>
</table>