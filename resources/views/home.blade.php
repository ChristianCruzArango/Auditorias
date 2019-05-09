@extends('layouts.app')
@section('title','Auditoría | Dashboard')
@section('body-class','profile-page sidebar-collapse')
    <style>
        #mapid { height: 400px; }
    </style>
@section('content')
<div class="page-header header-filter" data-parallax="true" style="background-image: url('{{asset('/img/bg7.jpg')}}')">
</div>
<div class="main main-raised ">
    <div class="row">
        <div class="col-md-8 ml-auto mr-auto">
                <h2 class="text-center title">Dashboard</h2>
                @if (auth()->user()->role_id == 1)

                    @else





                @endif




        </div>
    </div>
</div>

@endsection




















