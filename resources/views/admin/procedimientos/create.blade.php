@extends('layouts.app')
@section('title','Registrar Procedimientos')


@section('body-class','profile-page sidebar-collapse')

@section('content')
<div class="page-header header-filter" data-parallax="true" style="background-image: url('{{asset('/img/profile_city.jpg')}}')">
</div>
<div class="main main-raised ">
    <div class="row">
        <div class="col-md-8 ml-auto mr-auto">
                <h2 class="text-center title">Registrar Procedimientos</h2>
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
                <form method="post" action="{{ url('/admin/procedimientos') }}" enctype="multipart/form-data">
                        @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="bmd-label-floating">Nombre del Procedimientos</label>
                                <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="bmd-label-floating">Proceso</label>
                                <select class="form-control" name="proceso_id">
                                        <option value="0">General</option>
                                        @foreach ($proceso as $pro)
                                            <option value="{{ $pro->id }}">{{ $pro->nombre }}</option>
                                        @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <textarea class="form-control" placeholder="Descripción del procedimiento" rows="5" name="description">{{ old('description') }}</textarea>

                    <div class="row">
                        <div class="col-md-4 ml-auto mr-auto text-center">
                            <button class="btn btn-primary btn-raised">
                                Registrar Procedimiento
                            </button>
                            <a href="{{ url('/admin/procedimientos') }}" class="btn btn-warning">Cancelar</a>
                        </div>
                    </div>
                </form>
        </div>
    </div>
</div>

@endsection
