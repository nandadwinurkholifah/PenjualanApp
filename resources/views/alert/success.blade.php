@if(session('status')) 
<div class="alert alert-success alert-dismissible text-white fade show" role="alert">
    <strong>{{session('status')}} </strong>
  </div>
@endif()