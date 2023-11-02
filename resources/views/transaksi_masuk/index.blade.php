@extends('backend.layout')
@section('title2')
    Master
@endsection
@section('title')
    Transaksi Masuk
@endsection
@section('content')
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Data Transaksi Masuk</h3>
        <div class="card-tools">
            <div class="d-flex justify-content-between align-items-center ">
                <a class="btn btn-warning ml-2" href="{{ route('transaksi_masuk.create') }}">Create</a>
            </div>
        </div>
      </div>
      <div class="card-body p-0">
        @if (Request::get('keyword'))
          <div class="container">
            <div class="alert alert-success alert-dismissible text-white fade show" role="alert">
              <span class="alert-text"><strong>Success!</strong> Hasil Pencarian Transaksi Masuk dengan Keyword : <b>{{Request::get('keyword')}}</b></span>
              <a href="{{ route('transaksi_masuk.index') }}" class="btn btn-close">
                <i class="fa-solid fa-xmark"></i>
              </a>
            </div>
          </div>
        @endif
        @if (Request::get('kd_kategori'))
          <div class="container">
            <div class="alert alert-success alert-dismissible text-white fade show" role="alert">
              <span class="alert-text"><strong>Success!</strong> Hasil Pencarian Transaksi Masuk dengan Keyword : <b>{{$nama_kategori}}</b></span>
              <a href="{{ route('transaksi_masuk.index') }}" class="btn btn-close">
                <i class="fa-solid fa-xmark"></i>
              </a>
            </div>
          </div>
        @endif
        <div class="container">
          <form action="{{ route('transaksi_masuk.index') }}" method="get">
            <div class="row align-items-center justify-content-between mt-2">
              <div class="col-4">
                <div class="form-group">
                  <div class="input-group date" id="reservationdate" data-target-input="nearest">
                    <input type="text" name="start_date" class="form-control form-control-border datetimepicker-input" data-target="#reservationdate" placeholder="Start Date"/>
                    <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                    </div>
                  </div>
                </div>
  
              </div>
              <div class="col-4">
                <div class="form-group">
                  <div class="input-group date" id="reservationdate2" data-target-input="nearest">
                    <input type="text" name="end_date" class="form-control form-control-border datetimepicker-input" data-target="#reservationdate2" placeholder="End Date"/>
                    <div class="input-group-append" data-target="#reservationdate2" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-4 mb-3">
                <button type="submit" class="btn btn-primary">
                  <i class="fa fa-search"></i>
                </button>
              </div>
            </div>
          </form>

          @if (Request::get('start_date')!= "" && Request::get('end_date') !="")
          <div class="alert alert-success alert-dismissible text-white fade show" role="alert">
            Hasil Pencarian Transaksi Masuk dari Tanggal : {{$start_date}} s/d {{$end_date}} 
          </div>         
          @endif
          @include('alert.success')

        </div>
        <table class="table table-striped projects" >
            <thead>
                <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">Produk</th>
                    <th class="text-center">Supplier</th>
                    <th class="text-center">Tanggal Transaksi</th>
                    <th class="text-center">Jumlah</th>
                    <th class="text-center">Harga</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
              @foreach ($transaksi_masuks as $data )
               <tr>
                <td>
                  <div class="align-middle text-center text-md">
                    <h6 class="mb-0 text-md">{{$loop->iteration + ($transaksi_masuks->perpage() * ($transaksi_masuks->currentPage() - 1)) }}</h6>
                  </div>
                </td>
                <td class="align-middle text-center text-md">
                  <h6 class="mb-0 text-md">{{ $data->produk->nama_produk}} </h6>
                </td>
                <td class="align-middle text-center text-md">
                  <h6 class="align-middle text-center text-md">{{ $data->supplier->nama_supplier}}</h6>
                </td>
                <td class="align-middle text-center text-md">
                  <h6 class="align-middle text-center text-md">{{ $data->tgl_transaksi}}</h6>
                </td>
                <td class="align-middle text-center text-md">
                  <h6 class="align-middle text-center text-md">{{ $data->jumlah}}</h6>
                </td>
                <td class="align-middle text-center text-md">
                  <h6 class="align-middle text-center text-md">@rupiah ($data->harga)</h6>
                </td>
                <td class="align-middle text-center">
                  <form action="{{ route('transaksi_masuk.destroy', $data->kd_transaksi_masuk)}}" method="post" onsubmit="return confirm('Apakah anda yakin akan menghapus data ini ?') ">
                    @csrf
                    {{method_field('DELETE')}}
                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                  </form>
                </td>
               </tr>
              @endforeach 
            </tbody>
        </table>
      </div> 
      <div class="mx-auto pb-10 w-4/5 mt-3">
        {{$transaksi_masuks->links()}}
      </div>
    </div>
@endsection

