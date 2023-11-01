@extends('backend.layout')
@section('title2')
    Master
@endsection
@section('title')
    User
@endsection
@section('content')
<div class="row">
  <div class="col-lg-8 col-md-10 mx-auto">
    <div class="card card-primary card-outline">
      @include('alert.error')
      <div class="card-header">
        <h3 class="card-title py-2">
          Show User
        </h3>
        <div class="card-tools">
          <a href="{{ route('user.index')}}" class="btn btn-warning"><i class="fa fa-arrow-left"></i>  Back</a>
        </div>
      </div>
      <div class="card-body">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                  <div class="input-group input-group-outline my-3">
                    <h6>Nama</h6>
                    <div class="input-group input-group-outline">
                      <h5>{{$users->name}}</h5>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="input-group input-group-outline my-3">
                    <h6>Username</h6>
                    <div class="input-group input-group-outline">
                      <h5>{{$users->username}}</h5>
                    </div>
                  </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="input-group input-group-outline my-3">
                    <h6>Email</h6>
                    <div class="input-group input-group-outline">
                        <h5>{{$users->email}}</h5>
                    </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="input-group input-group-outline my-3">
                    <h6>Level</h6>
                    <div class="input-group input-group-outline">
                        <h5>{{$users->level}}</h5>
                    </div>
                    </div>
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection


