@extends('backend.layout')
@section('title2')
    Master
@endsection
@section('title')
    Supplier
@endsection
@section('content')
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Data Supplier</h3>
        <div class="card-tools">
            <div class="d-flex justify-content-between align-items-center ">
                <form action="{{ route('supplier.index') }}" method="get" class="d-flex">
                    <div class="input-group" style="margin-top: 1px;">
                        <div class="form-outline ">
                            <input type="text" id="keyword" name="keyword" value="{{ Request::get('keyword') }}" style="height: 40px" />
                        </div>
                        <button type="submit" class="btn btn-primary">
                            <i class="fa fa-search"></i>
                        </button>
                    </div>
                </form>
                <a class="btn btn-warning ml-2" href="{{ route('supplier.create') }}">Create</a>
            </div>
        </div>
      </div>
      <div class="card-body p-0">
        @if (Request::get('keyword'))
          <div class="container">
            <div class="alert alert-success alert-dismissible text-white fade show" role="alert">
              <span class="alert-text"><strong>Success!</strong> Hasil Pencarian Supplier dengan Keyword : <b>{{Request::get('keyword')}}</b></span>
              <a href="{{ route('supplier.index') }}" class="btn btn-close">
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
                    <th class="text-center">Nama Supplier</th>
                    <th class="text-center">Alamat Supplier</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
              @foreach ($suppliers as $data )
               <tr>
                <td>
                  <div class="align-middle text-center text-md">
                    <h6 class="mb-0 text-md">{{$loop->iteration + ($suppliers->perpage() * ($suppliers->currentPage() - 1)) }}</h6>
                  </div>
                </td>
                <td class="align-middle text-center text-md">
                  <h6 class="mb-0 text-md">{{ $data->nama_supplier}} </h6>
                </td>
                <td class="align-middle text-center text-md">
                  <h6 class="align-middle text-center text-md">{{ $data->alamat_supplier}}</h6>
                </td>
                <td class="align-middle text-center">
                  <form action="{{ route('supplier.destroy', $data->kd_supplier)}}" method="post" onsubmit="return confirm('Apakah anda yakin akan menghapus data ini ?') ">
                    @csrf
                    {{method_field('DELETE')}}
                    <a href="{{ route('supplier.edit', $data->kd_supplier)}}" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                  </form>
                </td>
               </tr>
              @endforeach 
            </tbody>
        </table>
      </div> 
      <div class="mx-auto pb-10 w-4/5 mt-3">
        {{$suppliers->links()}}
      </div>
    </div>
@endsection

