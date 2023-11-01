@extends('backend.layout')
@section('title2')
    Master
@endsection
@section('title')
    Supplier
@endsection
@section('content')
<div class="row">
  <div class="col-lg-8 col-md-10 mx-auto">
    <div class="card card-warning card-outline">
      @include('alert.error')
      <div class="card-header">
        <h3 class="card-title">
          Create Supplier
        </h3>
      </div>
      <div class="card-body">
        <form method="post" action="{{ route('supplier.update', $suppliers->kd_supplier)}}">
            @csrf
            {{ method_field('PUT')}}
            <div class="form-group">
              <input type="text" class="form-control form-control-border" id="nama_supplier" name="nama_supplier" placeholder="Nama Supplier" value="{{$suppliers->nama_supplier}}">
            </div>
            <div class="form-group">
              <textarea class="form-control form-control-border" rows="3" id="alamat_supplier" name="alamat_supplier" placeholder="Alamat Supplier">{{$suppliers->alamat_supplier}}</textarea>
            </div>
            <div class="text-right">
              <button type="reset" class="btn btn-danger">Cancel</button>
              <a href="{{route('supplier.index')}} " class="btn btn-warning">Back</a>
              <button type="submit" name="tombol" class="btn btn-success">Update</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection