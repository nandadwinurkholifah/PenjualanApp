<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('pdf.css') }}" type="text/css"> 
</head>
<body>
    <h3 style="text-align: center">REPORT PENJUALAN</h3>
    <div class="margin-top">
        <table class="w-full">
            <tr>
                <td class="w-half">
                    <h5 style="margin-left: 38rem;">Tanggal Cetak : </h5>
                    <h5 style="margin-left: 37rem;">{{$tgl_cetak}} </h5>
                </td>
            </tr>
        </table>
    </div>
 
    <div class="margin-top">
        <table class="products">
            <tr>
                <th>No</th>
                <th>Nama Produk</th>
                <th>Jumlah</th>
                <th>Harga</th>
                <th>Tanggal</th>
                <th>Agen</th>
            </tr>
            @foreach($penjualan as $item)
                <tr class="items">
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->produk->nama_produk }}</td>
                    <td>{{ $item->jumlah }}</td>
                    <td>@rupiah($item->harga)</td>
                    <td>{{ $item->transaksi->tgl_penjualan }}</td>
                    <td>{{ $item->transaksi->agen->nama_toko }}</td>
                </tr>
            @endforeach
        </table>
    </div>
</body>
</html>