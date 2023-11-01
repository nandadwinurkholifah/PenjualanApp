@if($errors->any())
{{-- <ul class="alert alert-danger">
    @foreach($errors->all() as $error)
    <li>{{$error}} </li>
    @endforeach
</ul> --}}
<div class="alert alert-danger text-white" role="alert">
    {{-- <strong>Danger!</strong> This is a danger alert—check it out! --}}
    @foreach($errors->all() as $error)
    <li>{{$error}} </li>
    @endforeach
</div>
@endif