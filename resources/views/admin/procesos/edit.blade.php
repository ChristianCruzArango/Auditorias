@extends('layouts.app')

@section('title','Editar Proceso')


@section('body-class','profile-page sidebar-collapse')

@section('content')
<div class="page-header header-filter" data-parallax="true" style="background-image: url('{{asset('/img/profile_city.jpg')}}')">
</div>
<div class="main main-raised ">
    <div class="row">
        <div class="col-md-8 ml-auto mr-auto">
                <h2 class="text-center title">Editar Proceso</h2>
                <h4 class="text-center description"></h4>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @if (session('notification'))
                        <div class="alert alert-success">
                            {{ session('notification') }}
                        </div>
                    @endif
                <form enctype="multipart/form-data" action="{{url('/admin/procesos/'.$proceso->id.'/edit')}}" method="POST">
                        @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="bmd-label-floating">Nombre del Proceso</label>
                                <input type="text" class="form-control" name="name" value="{{$proceso->nombre}}">
                            </div>
                        </div>
                    </div>
                    <textarea class="form-control" placeholder="Descripción del Proceso" rows="5" name="description">{{ old('description', $proceso->descripcion) }}</textarea>
                    <div class="row">
                        <div class="col-md-4 ml-auto mr-auto text-center">
                            <button class="btn btn-primary btn-raised">
                                Guardar
                            </button>
                        </div>
                        <div class="col-md-4 ml-auto mr-auto text-center">
                                <a href="{{url('/admin/procesos')}}" class="btn btn-warning btn-raised">Cancelar</a>
                        </div>

                    </div>
                </form>
        </div>
    </div>
</div>

@endsection
