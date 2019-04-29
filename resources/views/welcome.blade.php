@extends('layouts.app')
@section('title','Bienvenidos')

@section('body-class','landing-page sidebar-collapse')

@section('content')
<link href="{{ asset('css/paper-kit.css?v=2.1.0')}}" rel="stylesheet"/>
<div class="page-header section-dark" style="background-image: linear-gradient(
    rgba(0, 0, 0, 0.3),
    rgba(0, 0, 0, 0.3)
  ), url('{{asset('/img/bg3.jpg')}}')">
    <div class="filter"></div>
    <div class="content-center">
        <div class="container">
            <div class="title-brand">
                <div class="presentation-title"><img src="{{asset('/img/paginaP.png')}}" alt=""></div>
            </div>
        </div>
    </div>
    <div class="moving-clouds" style="background-image: url('{{asset('/img/movimiento.png')}}'); ">
    </div>
  </div>


@endsection
