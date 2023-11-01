@extends('backend.layout')
@section('title2')
    Master
@endsection
@section('title')
    Produk
@endsection
@section('content')
    <div class="card">
      <div class="card-header">
        <h3 class="card-title mt-2">Data Produk</h3>
        <div class="card-tools">
          <a class="btn btn-info ml-2" href="{{ route('produk.create') }}">Create</a>
        </div>
      </div>
      <div class="card-body p-0">
        @if (Request::get('keyword'))
          <div class="container">
            <div class="alert alert-success alert-dismissible text-white fade show" role="alert">
              <span class="alert-text"><strong>Success!</strong> Hasil Pencarian Produk dengan Keyword : <b>{{Request::get('keyword')}}</b></span>
              <a href="{{ route('produk.index') }}" class="btn btn-close">
                <i class="fa-solid fa-xmark"></i>
              </a>
            </div>
          </div>
        @endif
        <div class="container">
          @include('alert.success')
          <div class="row align-items-center justify-content-between mt-2">
            <div class="col-6">
              <form action="{{ route('produk.index') }}" method="get">
                <div class="input-group">
                  <input type="text" class="form-control form-control-border" id="keyword" name="keyword" value="{{ Request::get('keyword') }}" placeholder="Search by nama produk" style="height: 40px" />
                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-search"></i>
                    </button>
                </div>
            </form>
            </div>
            <div class="col-6">
              <div class="input-group">
                <select class="custom-select form-control-border" id="kd_kategori" name="kd_kategori" aria-placeholder="search by kategori">
                  @foreach ($kategoris as $kat)
                      <option value="{{ $kat->kd_kategori}}">{{ $kat->kategori}}</option>
                  @endforeach
                </select>
                <button type="submit" class="btn btn-primary">
                  <i class="fa fa-search"></i>
                </button>
              </div>
            </div>
          </div>
        </div>
        <table class="table table-striped projects mt-2">
            <thead>
                <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">Nama Produk</th>
                    <th class="text-center">Nama Kategori</th>
                    <th class="text-center">Harga Produk</th>
                    <th class="text-center">Gambar produk</th>
                    <th class="text-center">Stok</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
              @foreach ($produks as $data )
               <tr>
                <td>
                  <div class="align-middle text-center text-md">
                    <h6 class="mb-0 text-md">{{$loop->iteration + ($produks->perpage() * ($produks->currentPage() - 1)) }}</h6>
                  </div>
                </td>
                <td class="align-middle text-center text-md">
                  <h6 class="mb-0 text-md">{{ $data->nama_produk}} </h6>
                </td>
                <td class="align-middle text-center text-md">
                  <h6 class="mb-0 text-md">{{ $data->kategori->kategori}} </h6>
                </td>
                <td class="align-middle text-center text-md">
                  <h6 class="mb-0 text-md">{{ $data->harga}} </h6>
                </td>
                <td class="align-middle text-center text-md">
                  <img class="img-thumbnail" width="100px" src="{{ asset('upload/'.$data->gambar_produk)}}">
                </td>
                <td class="align-middle text-center text-md">
                  <h6 class="mb-0 text-md">{{ $data->stok}} </h6>
                </td>
                <td class="align-middle text-center">
                  <form action="{{ route('produk.destroy', $data->kd_produk)}}" method="post" onsubmit="return confirm('Apakah anda yakin akan menghapus data ini ?') ">
                    @csrf
                    {{method_field('DELETE')}}
                    <a href="{{ route('produk.edit', $data->kd_produk)}}" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                  </form>
                </td>
               </tr>
              @endforeach 
            </tbody>
        </table>
      </div> 
      <div class="mx-auto pb-10 w-4/5 mt-3">
        {{$produks->links()}}
      </div>
    </div>
@endsection

