@extends('layouts.app')
@section('title','Registrar Categorìa')


@section('body-class','profile-page sidebar-collapse')

@section('content')
<div class="page-header header-filter" data-parallax="true" style="background-image: url('{{asset('/img/profile_city.jpg')}}')">
</div>
<div class="main main-raised ">
    <div class="row">
        <div class="col-md-8 ml-auto mr-auto">
                <h2 class="text-center title">Registrar Categorìa</h2>
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
                <form method="post" action="{{ url('/admin/categories') }}" enctype="multipart/form-data">
                        @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="bmd-label-floating">Nombre Categorìa</label>
                                <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                            </div>
                        </div>
                    </div>
                    <textarea class="form-control" placeholder="Descripción de la categoría" rows="5" name="description">{{ old('description') }}</textarea>

                    <div class="row">
                        <div class="col-md-4 ml-auto mr-auto text-center">
                            <button class="btn btn-primary btn-raised">
                                Registrar Producto
                            </button>
                            <a href="{{ url('/admin/categories') }}" class="btn btn-warning">Cancelar</a>
                        </div>
                    </div>
                </form>
        </div>
    </div>
</div>

@endsection
