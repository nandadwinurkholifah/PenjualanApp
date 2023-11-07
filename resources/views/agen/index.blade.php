@extends('backend.layout')
@section('title2')
    Master
@endsection
@section('title')
    Agen
@endsection
@section('content')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
crossorigin=""/>
<!-- Make sure you put this AFTER Leaflet's CSS -->
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
crossorigin=""></script>
    <div class="card">
      <div class="card-header">
        <h3 class="card-title mt-2">Data Agen</h3>
      </div>
      <div class="card-body p-0">
        <table class="table table-striped projects mt-2">
            <thead>
                <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">Nama Toko</th>
                    <th class="text-center">Nama Pemilik</th>
                    <th class="text-center">Alamat</th>
                    <th class="text-center">Lat</th>
                    <th class="text-center">Long</th>
                    <th class="text-center">Gambar Toko</th>
                </tr>
            </thead>
            <tbody>
              @foreach ($agen as $data )
               <tr>
                <td>
                  <div class="align-middle text-center text-md">
                    <h6 class="mb-0 text-md">{{$loop->iteration + ($agen->perpage() * ($agen->currentPage() - 1)) }}</h6>
                  </div>
                </td>
                <td class="align-middle text-center text-md">
                  <h6 class="mb-0 text-md">{{ $data->nama_toko}} </h6>
                </td>
                <td class="align-middle text-center text-md">
                  <h6 class="mb-0 text-md">{{ $data->nama_pemilik}} </h6>
                </td>
                <td class="align-middle text-center text-md">
                  <h6 class="mb-0 text-md">{{ $data->alamat}}</h6>
                </td>
                <td class="align-middle text-center text-md">
                    <h6 class="mb-0 text-md">{{ $data->latitude}} </h6>
                </td>
                <td class="align-middle text-center text-md">
                    <h6 class="mb-0 text-md">{{ $data->longitude}} </h6>
                </td>
                <td class="align-middle text-center text-md">
                  <img class="img-thumbnail" width="100px" src="{{ asset('upload/'.$data->gambar_toko)}}">
                </td>
               </tr>
              @endforeach 
            </tbody>
        </table>
        <div class="mx-auto pb-10 w-4/5 mt-3">
          {{$agen->links()}}
          <div id="map" style="width:100%; height:400px;">
              <script>
                  
                  var locations = <?php echo $hasil_lat_long; ?>;
                  var map = L.map('map').setView([{{ $lokasi->latitude }}, {{ $lokasi->longitude }}], 18);
                  mapLink = '<a href="http://openstreetmap.org">OpenStreetMap</a>';
                  L.tileLayer(
                      'http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                      attribution: '&copy; ' + mapLink + ' Contributors',
                      maxZoom: 18,
                      }).addTo(map);
  
                  for (var i = 0; i < locations.length; i++) {
                      marker = new L.marker([locations[i][1],locations[i][2]])
                          .bindPopup(locations[i][0])
                          .addTo(map);
                  }
              </script>
          </div>
        </div>
      </div> 
    </div>
@endsection

