@extends('backend.layout')
@section('title2')
    Master
@endsection
@section('title')
    Kategori
@endsection
@section('content')
<div class="row">
  <div class="col-lg-8 col-md-10 mx-auto">
    <div class="card card-warning card-outline">
      @include('alert.error')
      <div class="card-header">
        <h3 class="card-title">
          Create Kategori
        </h3>
      </div>
      <div class="card-body">
        <form method="post" action="{{ route('kategori.store')}}" enctype="multipart/form-data">
          @csrf
            <div class="form-group">
              <input type="text" class="form-control form-control-border" id="kategori" name="kategori" placeholder="Nama kategori" value="{{old('kategori')}}">
            </div>
            <div class="form-group">
              <input type="file" class="form-control form-control-border" id="gambar_kategori " name="gambar_kategori">
            </div>
            <div class="text-right">
              <button type="reset" class="btn btn-danger">Cancel</button>
              <a href="{{route('kategori.index')}} " class="btn btn-warning">Back</a>
              <button type="submit" name="tombol" class="btn btn-success">Create</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection