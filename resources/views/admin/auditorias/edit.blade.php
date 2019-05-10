@extends('layouts.app')

@section('title','Editar Caterìa')


@section('body-class','profile-page sidebar-collapse')

@section('content')
<div class="page-header header-filter" data-parallax="true" style="background-image: url('{{asset('/img/profile_city.jpg')}}')">
</div>
<div class="main main-raised ">
    <div class="row">
        <div class="col-md-8 ml-auto mr-auto">
                <h2 class="text-center title">Editar Auditoría</h2>
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
                    <form enctype="multipart/form-data" action="{{url('/admin/auditorias/'.$auditoria->id.'/edit')}}" method="POST">
                        @csrf
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="bmd-label-floating">Objetivo</label>
                                <input type="text" class="form-control" name="objetivo" value="{{$auditoria->objetivo}}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="bmd-label-floating">Alcance</label>
                                <input type="text" class="form-control" name="alcance" value="{{$auditoria->alcance}}">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="bmd-label-floating">Criterio</label>
                                <input type="text" class="form-control" name="criterio" value="{{$auditoria->criterio}}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="bmd-label-floating">Recursos</label>
                                <input type="text" class="form-control" name="recursos" value="{{$auditoria->recursos}}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="bmd-label-floating">Riesgos</label>
                                <input type="text" class="form-control" name="riesgos" value="{{$auditoria->riesgos}}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="bmd-label-floating">Fecha Inicio</label>
                                <input type="date" class="form-control" name="fecha_inicio" id="fecha_inicio" value="{{$auditoria->fechaInicio}}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="bmd-label-floating">Fecha Final</label>
                                <input type="date" class="form-control" name="fecha_final" id="fecha_final" value="{{$auditoria->fechaFinal}}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 ml-auto mr-auto text-center">
                            <button class="btn btn-primary btn-raised">
                                Registrar Auditoría
                            </button>
                            <a href="{{ url('/admin/auditorias') }}" class="btn btn-warning">Cancelar</a>
                        </div>
                    </div>
                </form>
        </div>
    </div>
</div>

@endsection
