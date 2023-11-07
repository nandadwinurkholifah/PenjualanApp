@extends('backend.layout')
@section('title2')
    Master
@endsection
@section('title')
    Report Penjualan
@endsection
@section('content')
    <div class="card">
      <div class="card-header">
        <h3 class="card-title mt-2">Data Penjualan</h3>
        <div class="card-tools">
          <div class="d-flex justify-content-between align-items-center ">
              <a class="btn btn-danger ml-2" href="{{ route('cetak_pdf') }}"><i class="fa-solid fa-file-pdf"></i> PDF</a>
              <a class="btn btn-success ml-2" href="{{ route('cetak_excel') }}"><i class="fa-solid fa-file-excel"></i> Excel</a>
          </div>
      </div>
      </div>
      <div class="card-body p-0">
        <table class="table table-striped projects mt-2">
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
                    <h6 class="mb-0 text-md">{{$loop->iteration + ($penjualan->perpage() * ($penjualan->currentPage() - 1)) }}</h6>
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
        </table>
        <div class="mx-auto pb-10 w-4/5 mt-3">
          {{$penjualan->links()}}
        </div>
      </div> 
    </div>
@endsection

