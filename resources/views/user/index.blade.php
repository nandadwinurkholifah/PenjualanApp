@extends('backend.layout')
@section('title2')
    Master
@endsection
@section('title')
    User
@endsection
@section('content')
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Data User</h3>
        <div class="card-tools">
            <div class="d-flex justify-content-between align-items-center ">
                <form action="{{ route('user.index') }}" method="get" class="d-flex">
                    <div class="input-group" style="margin-top: 1px;">
                        <div class="form-outline ">
                            <input type="text" id="keyword" name="keyword" value="{{ Request::get('keyword') }}" style="height: 40px" />
                        </div>
                        <button type="submit" class="btn btn-warning">
                            <i class="fa fa-search"></i>
                        </button>
                    </div>
                </form>
                <a class="btn btn-info ml-2" href="{{ route('user.create') }}">Create</a>
            </div>
        </div>
      </div>
      <div class="card-body p-0">
        @if (Request::get('keyword'))
          <div class="container">
            <div class="alert alert-success alert-dismissible text-white fade show" role="alert">
              <span class="alert-text"><strong>Success!</strong> Hasil Pencarian User dengan Keyword : <b>{{Request::get('keyword')}}</b></span>
              <a href="{{ route('user.index') }}" class="btn btn-close">
                <i class="fa-solid fa-xmark"></i>
              </a>
            </div>
          </div>
        @endif
        <div class="container">
          @include('alert.success')
        </div>
        <table class="table table-striped projects" >
            <thead>
                <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">Nama</th>
                    <th class="text-center">Username</th>
                    <th class="text-center">Email</th>
                    <th class="text-center">Level</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
              @foreach ($users as $data )
               <tr>
                <td>
                  <div class="align-middle text-center text-md">
                    <h6 class="mb-0 text-md">{{$loop->iteration + ($users->perpage() * ($users->currentPage() - 1)) }}</h6>
                  </div>
                </td>
                <td class="align-middle text-center text-md">
                  <h6 class="mb-0 text-md">{{ $data->name}} </h6>
                </td>
                <td>
                  <h6 class="align-middle text-center text-md">{{ $data->username}}</h6>
                </td>
                <td class="align-middle text-center text-md">
                  <h6 class="mb-0 text-md">{{ $data->email}}</h6>
                </td>
                <td class="align-middle text-center">
                  <h6 class="mb-0 text-md">{{ $data->level}}</h6>
                </td>
                <td class="align-middle text-center">
                  <form action="{{ route('user.destroy', $data->id)}}" method="post" onsubmit="return confirm('Apakah anda yakin akan menghapus data ini ?') ">
                    @csrf
                    {{method_field('DELETE')}}
                    <a href="{{ route('user.show', $data->id)}}" class="btn btn-success"><i class="fa fa-list"></i></a>
                    <a href="{{ route('user.edit', $data->id)}}" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                  </form>
                </td>
               </tr>
              @endforeach 
            </tbody>
        </table>
      </div> 
      <div class="mx-auto pb-10 w-4/5 mt-3">
        {{$users->links()}}
      </div>
    </div>
@endsection

