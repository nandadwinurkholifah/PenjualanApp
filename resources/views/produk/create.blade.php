@extends('backend.layout')
@section('title2')
    Master
@endsection
@section('title')
    Produk
@endsection
@section('content')
<div class="row">
  <div class="col-lg-8 col-md-10 mx-auto">
    <div class="card card-warning card-outline">
      @include('alert.error')
      <div class="card-header">
        <h3 class="card-title">
          Create Produk
        </h3>
      </div>
      <div class="card-body">
        <form method="post" action="{{ route('produk.store')}}" enctype="multipart/form-data">
          @csrf
            <div class="form-group">
              <input type="text" class="form-control form-control-border" id="nama_produk" name="nama_produk" placeholder="Nama Produk" value="{{old('nama_produk')}}">
            </div>
            <div class="form-group">
              <select class="custom-select form-control-border" id="kd_kategori" name="kd_kategori">
                @foreach ($kategoris as $kat)
                  <option value="{{ $kat->kd_kategori}}">{{ $kat->kategori}}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <input type="text" class="form-control form-control-border" id="harga" name="harga" placeholder="Harga Produk" value="{{old('harga')}}">
            </div>
            <div class="form-group">
              <input type="file" class="form-control form-control-border" id="gambar_produk " name="gambar_produk">
            </div>
            <div class="text-right">
              <button type="reset" class="btn btn-danger">Cancel</button>
              <a href="{{route('produk.index')}} " class="btn btn-warning">Back</a>
              <button type="submit" name="tombol" class="btn btn-success">Create</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection