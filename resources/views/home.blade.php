@extends('backend.layout')
@section('title2')
    Home
@endsection
@section('title')
    Dashboard
@endsection
@section('content')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<div class="container-fluid">
  <div class="row">
    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-info"><i class="fa-solid fa-shirt"></i></span>
  
        <div class="info-box-content">
          <span class="info-box-text">Produk</span>
        <span class="info-box-number">{{$produk}} </span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-red"><i class="ion ion-ios-list-outline"></i></span>
  
        <div class="info-box-content">
          <span class="info-box-text">Agen</span>
        <span class="info-box-number">{{ $agen}} </span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->
  
    <!-- fix for small devices only -->
    <div class="clearfix visible-sm-block"></div>
  
    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-green"><i class="fa-solid fa-cart-shopping"></i></span>
  
        <div class="info-box-content">
          <span class="info-box-text">Penjualan</span>
        <span class="info-box-number">{{ $transaksi}} </span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>
  
        <div class="info-box-content">
          <span class="info-box-text">Pendapatan</span>
        <span class="info-box-number">@rupiah($pendapatan) </span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    
    <!-- /.col -->
  </div>
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Grafik Penjualan</h3>
        <div class="card-tools">

        </div>
      </div>
      <div class="card-body">
        <canvas id="myChart">

        </canvas>
      </div> 
    </div>
</div>
<script>
  var ctx = document.getElementById("myChart").getContext('2d');
  var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
      labels: @php echo json_encode($nama_produk); @endphp,
      datasets: [{
        label: 'Grafik Penjualan',
        data: @php echo json_encode($jumlah_penjualan); @endphp,
        backgroundColor: 'rgba(255, 99, 132, 0.2)',
        borderColor: 'rgba(255,99,132,1)',
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });
</script>


@endsection
