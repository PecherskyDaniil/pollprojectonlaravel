@extends('baselayout')
@section('content')
    <div class="goodstatus">{{$goodstatus}}</div>
    <div class="badstatus">{{$badstatus}}</div>
    @section('status')
    @show
@endsection
