@extends('layouts.app')

@section('title','Auditoría | Procedimientos')

@section('body-class','profile-page sidebar-collapse')

@section('content')
<div class="page-header header-filter" data-parallax="true" style="background-image: url('{{asset('/img/profile_city.jpg')}}')">
</div>
    <div class="main main-raised">
        <div class="container">

            <div class="section text-center">
                <h2 class="title">Listado de Procedimientos</h2>
                <div class="team">
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
                    <div class="row">
                        <div class="col-md-4 ml-auto mr-auto text-center">
                            <a href="{{url('/admin/procedimientos/create')}}" class="btn btn-primary btn-round">Nuevo Procedimiento</a>
                        </div>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th >Proceso</th>
                                        <th class="col-md-5 text-center">Nombre</th>
                                        <th>Descripción</th>
                                        <th class="text-center">Opciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($procedimientos as $key => $procedimiento)
                                        <tr>
                                            <td>{{ $procedimiento->id }}</td>
                                            <td>{{ $procedimiento->procesos_id }}</td>
                                            <td>{{ $procedimiento->nombre }}</td>

                                            <td>
                                                {{ $procedimiento->descripcion }}
                                            </td>

                                            <td class="td-actions text-center">
                                                <form action="{{url('/admin/procedimientos/'.$procedimiento->id)}}" method="POST" >
                                                    @csrf
                                                    @method('DELETE')
                                                        <a href="{{url('/admin/procedimientos/'.$procedimiento->id.'/edit')}}" type="button" rel="tooltip" title="Editar Procedimiento" class="btn btn-success btn-simple btn-xs">
                                                            <i class="fa fa-edit"></i>
                                                        </a>
                                                    <button type="submit" rel="tooltip" title="Eliminar Procedimiento" class="btn btn-danger btn-simple btn-xs">
                                                        <i class="fa fa-times"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                        </table>
                     </div>
                     {{$procedimientos->links()}}
                </div>
            </div>

        </div>
    </div>

@endsection
