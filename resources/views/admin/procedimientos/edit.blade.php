@extends('layouts.app')

@section('title','Editar Procedimiento')


@section('body-class','profile-page sidebar-collapse')

@section('content')
<div class="page-header header-filter" data-parallax="true" style="background-image: url('{{asset('/img/profile_city.jpg')}}')">
</div>
<div class="main main-raised ">
    <div class="row">
        <div class="col-md-8 ml-auto mr-auto">
                <h2 class="text-center title">Editar Procedimiento</h2>
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
                <form enctype="multipart/form-data" action="{{url('/admin/procedimientos/'.$procedimiento->id.'/edit')}}" method="POST">
                        @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="bmd-label-floating">Nombre del Procedimiento</label>
                                <input type="text" class="form-control" name="name" value="{{$procedimiento->nombre}}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="bmd-label-floating">Procesos</label>
                                <select class="form-control" name="proceso_id">
                                        <option value="0">General</option>
                                        @foreach ($procesos as $pro)
                                        <option value="{{ $pro->id }}" @if($pro->id == old('proceso_id', $procedimiento->procesos_id)) selected @endif>
                                            {{ $pro->nombre }}
                                        </option>
                                        @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <textarea class="form-control" placeholder="Descripción del procedimiento" rows="5" name="description">{{ old('description', $procedimiento->descripcion) }}</textarea>
                    <div class="row">
                        <div class="col-md-4 ml-auto mr-auto text-center">
                            <button class="btn btn-primary btn-raised">
                                Guardar
                            </button>
                        </div>
                        <div class="col-md-4 ml-auto mr-auto text-center">
                                <a href="{{url('/admin/procedimientos')}}" class="btn btn-warning btn-raised">Cancelar</a>
                        </div>

                    </div>
                </form>
        </div>
    </div>
</div>

@endsection
