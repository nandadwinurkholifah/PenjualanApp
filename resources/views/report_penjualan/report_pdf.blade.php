<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Report Penjualan</title>
    <link rel="stylesheet" href="{{ asset('pdf.css') }}" type="text/css"> 
</head>
<body>
    <h3 style="text-align: center">REPORT PENJUALAN</h3>
    <div class="margin-top">
        <table class="w-full">
            <tr>
                <td class="w-half">
                    {{-- <div><h4>To:</h4></div>
                    <div>John Doe</div>
                    <div>123 Acme Str.</div> --}}
                </td>
                <td class="w" >
                 <h5 style="margin-left: 16rem;">Tanggal Cetak : </h5>
                 <h5 style="margin-left: 14rem;">{{$tgl_cetak}} </h5>
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
            <tr class="items">
                @foreach($penjualan as $item)
                    <td>
                        {{$loop->iteration}}
                    </td>
                    <td>
                        {{ $item->produk->nama_produk}}
                    </td>
                    <td>
                        {{ $item->jumlah}}
                    </td>
                    <td>
                        @rupiah($item->harga)
                    </td>
                    <td>
                        {{ $item->transaksi->tgl_penjualan}}
                    </td>
                    <td>
                        {{ $item->transaksi->agen->nama_toko}}
                    </td>
                @endforeach
            </tr>
        </table>
    </div>
 
    {{-- <div class="total">
        Total: $129.00 USD
    </div>
 
    <div class="footer margin-top">
        <div>Thank you</div>
        <div>&copy; Laravel Daily</div>
    </div> --}}
    {{-- <table class="table table-striped projects mt-2">
        <thead>
            <tr>
                <th class="text-center">No</th>
                <th class="text-center">Nama Produk</th>
                <th class="text-center">Jumlah</th>
                <th class="text-center">Harga</th>
                <th class="text-center">Tanggal</th>
                <th class="text-center">Agen</th>
            </tr>
        </thead>
        <tbody>
          @foreach ($penjualan as $data )
           <tr>
            <td>
              <div class="align-middle text-center text-md">
                <h6 class="mb-0 text-md">{{$loop->iteration}}</h6>
              </div>
            </td>
            <td class="align-middle text-center text-md">
              <h6 class="mb-0 text-md">{{ $data->produk->nama_produk}} </h6>
            </td>
            <td class="align-middle text-center text-md">
              <h6 class="mb-0 text-md">{{ $data->jumlah}} </h6>
            </td>
            <td class="align-middle text-center text-md">
              <h6 class="mb-0 text-md">@rupiah($data->harga)</h6>
            </td>
            <td class="align-middle text-center text-md">
                <h6 class="mb-0 text-md">{{ $data->transaksi->tgl_penjualan}} </h6>
            </td>
            <td class="align-middle text-center text-md">
                <h6 class="mb-0 text-md">{{ $data->transaksi->agen->nama_toko}} </h6>
            </td>
           </tr>
          @endforeach 
        </tbody>
    </table> --}}
</body>
</html>