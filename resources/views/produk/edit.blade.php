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
          Edit Produk
        </h3>
      </div>
      <div class="card-body">
        <form method="post" action="{{ route('produk.update',$produks->kd_produk)}}" enctype="multipart/form-data">
          @csrf
          {{ method_field('PUT') }}
          <div class="form-group">
            <input type="text" class="form-control form-control-border" id="nama_produk" name="nama_produk" placeholder="Nama Produk" value="{{$produks->nama_produk}}">
          </div>
          <div class="form-group">
            <select class="custom-select form-control-border" id="kd_kategori" name="kd_kategori">
              @foreach ($kategoris as $kat)
                <option value="{{ $kat->kd_kategori}}" @if ($produks->kd_kategori == $kat->kd_kategori)
                  Selected
                @endif>{{ $kat->kategori}}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <input type="text" class="form-control form-control-border" id="harga" name="harga" placeholder="Harga Produk" value="{{$produks->harga}}">
          </div>
          <div class="form-group">
            <input type="file" class="form-control form-control-border" id="gambar_produk " name="gambar_produk">
          </div>
          <div class="form-group">
            <img id="imgView" class="img-thumbnail" src="{{ asset('upload/'.$produks->gambar_produk)}}" width="100px">
          </div>
            <div class="text-right">
              <button type="reset" class="btn btn-danger">Cancel</button>
              <a href="{{route('produk.index')}} " class="btn btn-warning">Back</a>
              <button type="submit" name="tombol" class="btn btn-success">Update</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
@push('js')
  {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}
  <script src="{{ asset('asset/js/custom.js')}}"></script>
@endpush