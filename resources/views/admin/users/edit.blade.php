@extends('layouts.app')

@section('title','Editar Usuario')


@section('body-class','profile-page sidebar-collapse')

@section('content')
<div class="page-header header-filter" data-parallax="true" style="background-image: url('{{asset('/img/profile_city.jpg')}}')">
</div>
<div class="main main-raised ">
    <div class="row">
        <div class="col-md-8 ml-auto mr-auto">
                <h2 class="text-center title">Editar Usuario</h2>
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

                <form enctype="multipart/form-data" action="{{url('/admin/users/'.$user->id.'/edit')}}" method="POST">
                    @csrf
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="bmd-label-floating">Documento</label>
                            <input type="number" class="form-control" name="documento" value="{{$user->documento}}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="bmd-label-floating">Role</label>
                            <select class="form-control" name="role_id">
                                    <option value="0">General</option>
                                    @foreach ($roles as $role)
                                    <option value="{{ $role->id }}" @if($role->id == old('role_id', $user->role_id)) selected @endif>
                                        {{ $role->name }}
                                    </option>
                                    @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="bmd-label-floating">Nombre</label>
                            <input type="text" class="form-control" name="name" value="{{$user->name}}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="bmd-label-floating">UserName</label>
                            <input type="text" class="form-control" name="surname" value="{{$user->surname}}">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="bmd-label-floating">Dirección</label>
                            <input type="text" class="form-control" name="direccion" value="{{$user->direccion}}">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="bmd-label-floating">Teléfono</label>
                            <input type="number" class="form-control" name="telefono" value="{{$user->phone}}">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="bmd-label-floating">Correo</label>
                            <input type="email" class="form-control" name="mail" value="{{$user->email}}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="bmd-label-floating">Cargo</label>
                            <input type="text" class="form-control" name="cargo" value="{{$user->cargo}}">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="bmd-label-floating">Profesión</label>
                            <input type="text" class="form-control" name="profesion" value="{{$user->profesion}}">
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
