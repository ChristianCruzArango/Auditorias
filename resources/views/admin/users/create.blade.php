@extends('layouts.app')
@section('title','Registrar Usuario')


@section('body-class','profile-page sidebar-collapse')

@section('content')
<div class="page-header header-filter" data-parallax="true" style="background-image: url('{{asset('/img/profile_city.jpg')}}')">
</div>
<div class="main main-raised ">
    <div class="row">
        <div class="col-md-8 ml-auto mr-auto">
                <h2 class="text-center title">Registrar Usuario</h2>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if (session('notification'))
                    <div class="alert alert-success">
                        {{ session('notification') }}
                    </div>
                @endif
                <h4 class="text-center description"></h4>
                <form method="post" action="{{ url('/admin/users') }}" enctype="multipart/form-data">
                        @csrf
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="bmd-label-floating">Documento</label>
                                <input type="number" class="form-control" name="documento" value="{{ old('documento') }}">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="bmd-label-floating">Rol</label>
                                <select class="form-control" name="role_id">
                                        <option value="0">General</option>
                                        @foreach ($role as $rol)
                                            <option value="{{ $rol->id }}">{{ $rol->name }}</option>
                                        @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="bmd-label-floating">Nombre</label>
                                <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="bmd-label-floating">UserName</label>
                                <input type="text" class="form-control" name="surname" value="{{ old('surname') }}">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="bmd-label-floating">Dirección</label>
                                <input type="text" class="form-control" name="direccion" value="{{ old('direccion') }}">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="bmd-label-floating">Teléfono</label>
                                <input type="number" class="form-control" name="telefono" value="{{ old('telefono') }}">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="bmd-label-floating">Correo</label>
                                <input type="email" class="form-control" name="mail" value="{{ old('mail') }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="bmd-label-floating">Cargo</label>
                                <input type="text" class="form-control" name="cargo" value="{{ old('cargo') }}">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="bmd-label-floating">Profesión</label>
                                <input type="text" class="form-control" name="profesion" value="{{ old('profesion') }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="bmd-label-floating">Password</label>
                                <input type="password" class="form-control" name="password" value="{{ old('password') }}">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4 ml-auto mr-auto text-center">
                            <button class="btn btn-primary btn-raised">
                                Registrar Usuario
                            </button>
                            <a href="{{ url('/admin/users') }}" class="btn btn-warning">Cancelar</a>
                        </div>
                    </div>
                </form>
        </div>
    </div>
</div>

@endsection
