@extends('backend.layout')
@section('title2')
    Master
@endsection
@section('title')
    Transaksi Masuk
@endsection
@section('content')
<div class="row">
  <div class="col-lg-8 col-md-10 mx-auto">
    <div class="card card-warning card-outline">
      @include('alert.error')
      <div class="card-header">
        <h3 class="card-title">
          Create Transaksi Masuk
        </h3>
      </div>
      <div class="card-body">
        <form method="post" action="{{ route('transaksi_masuk.store')}}" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <select class="custom-select form-control-border" id="kd_produk" name="kd_produk">
              @foreach ($produks as $pro)
                <option value="{{ $pro->kd_produk}}">{{ $pro->nama_produk}}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <select class="custom-select form-control-border" id="kd_supplier" name="kd_supplier">
              @foreach ($suppliers as $sup)
                <option value="{{ $sup->kd_supplier}}">{{ $sup->nama_supplier}}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
              <div class="input-group date" id="reservationdate" data-target-input="nearest">
                  <input type="text" id="tgl_transaksi" name="tgl_transaksi" class="form-control form-control-border datetimepicker-input" data-target="#reservationdate" value="{{ old('tgl_transaksi')}}"/>
                  <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                      <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                  </div>
              </div>
          </div>
          <div class="form-group">
            <input type="number" class="form-control form-control-border" id="jumlah" name="jumlah" placeholder="Jumlah" value="{{ old('jumlah')}}">
          </div>
            <div class="form-group">
              <input type="number" class="form-control form-control-border" id="harga" name="harga" placeholder="Harga Produk" value="{{ old('harga')}}">
            </div>
            <div class="text-right">
              <button type="reset" class="btn btn-danger">Cancel</button>
              <a href="{{route('transaksi_masuk.index')}} " class="btn btn-warning">Back</a>
              <button type="submit" name="tombol" class="btn btn-success">Create</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection