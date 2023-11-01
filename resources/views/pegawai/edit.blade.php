@extends('backend.layout')
@section('title2')
    Master
@endsection
@section('title')
    Pegawai
@endsection
@section('content')
<div class="row">
  <div class="col-lg-8 col-md-10 mx-auto">
    <div class="card card-primary card-outline">
      @include('alert.error')
      <div class="card-header">
        <h3 class="card-title">
          Edit Pegawai
        </h3>
      </div>
      <div class="card-body">
        <form method="post" action="{{ route('pegawai.update', $pegawais->username)}}">
            @csrf
            {{ method_field('PUT')}}
            <div class="form-group">
              <input type="text" class="form-control form-control-border" id="username" name="username" placeholder="Username" value="{{$pegawais->username}}">
            </div>
            <div class="form-group">
              <input type="password" class="form-control form-control-border" id="password" name="password" placeholder="Password" value="">
            </div>
            <div class="form-group">
              <input type="text" class="form-control form-control-border" id="nama_pegawai" name="nama_pegawai" placeholder="Nama Pegawai" value="{{$pegawais->nama_pegawai}}">
            </div>
            <div class="form-group">
              <select class="custom-select form-control-border" id="jk" name="jk">
                <option value="PRIA" 
                  @if ($pegawais->jk == "PRIA") 
                    Selected  
                  @endif>Pria</option>
                  <option value="WANITA"
                  @if ($pegawais->jk == "WANITA") 
                    Selected  
                  @endif>Wanita</option>
              </select>
            </div>
            <div class="form-group">
              <textarea class="form-control form-control-border" rows="3" id="alamat" name="alamat" placeholder="Alamat Pegawai">{{$pegawais->alamat}}</textarea>
            </div>
            <div class="form-group">
              <select class="custom-select form-control-border" id="is_active" name="is_active">
                <option value="1"
                  @if ($pegawais->is_active == 1) 
                    Selected  
                  @endif>Active</option>
                  <option value="0"
                  @if ($pegawais->is_active == 0) 
                    Selected  
                  @endif>No Active</option>
              </select>
            </div>
            <div class="text-right">
                <button type="submit" name="tombol" class="btn btn-success">Update</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection