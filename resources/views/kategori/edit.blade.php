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
          Edit Kategori
        </h3>
      </div>
      <div class="card-body">
        <form method="post" action="{{ route('kategori.update',$kategoris->kd_kategori)}}" enctype="multipart/form-data">
          @csrf
          {{ method_field('PUT') }}
            <div class="form-group">
              <input type="text" class="form-control form-control-border" id="kategori" name="kategori" placeholder="Nama kategori" value="{{$kategoris->kategori}}">
            </div>

            <div class="form-group">
              <input type="file" name="gambar_kategori" id="gambar_kategori"  class="form-control" >
            </div>

            <div class="form-group">
              <img id="img_view" class="img-thumbnail" src="{{ asset('upload/'.$kategoris->gambar_kategori)}}" width="100px">
            </div>
            <div class="text-right">
              <button type="reset" class="btn btn-danger">Cancel</button>
              <a href="{{route('kategori.index')}} " class="btn btn-warning">Back</a>
              <button type="submit" name="tombol" class="btn btn-success">Update</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
@push('js_image')
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="{{ asset('assets/js/custom.js')}}"></script>
@endpush