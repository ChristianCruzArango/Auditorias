@extends('layouts.app')

@section('title','Auditoría | Auditorias')

@section('body-class','profile-page sidebar-collapse')

@section('content')
<div class="page-header header-filter" data-parallax="true" style="background-image: url('{{asset('/img/profile_city.jpg')}}')">
</div>
    <div class="main main-raised">
        <div class="container">

            <div class="section text-center">
                <h2 class="title">Listado de Auditorias</h2>
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
                            <a href="{{url('/admin/auditorias/create')}}" class="btn btn-primary btn-round">Nueva Auditoría</a>
                        </div>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Objetivo</th>
                                        <th>Alcance</th>
                                        <th>Criterio</th>
                                        <th>Recursos</th>
                                        <th>Riesgos</th>
                                        <th>Fecha Inicio</th>
                                        <th>Fecha Final</th>
                                        <th class="text-center">Opciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($auditoria as $key => $audit)
                                        <tr>
                                            <td>{{ $audit->id }}</td>
                                            <td>{{ $audit->objetivo }}</td>
                                            <td>{{ $audit->alcance }}</td>
                                            <td>{{ $audit->criterio }}</td>
                                            <td>{{ $audit->recursos }}</td>
                                            <td>{{ $audit->riesgos }}</td>
                                            <td>{{ $audit->fechaInicio }}</td>
                                            <td>{{ $audit->fechaFinal }}</td>

                                            <td class="td-actions text-center">
                                                <form action="{{url('/admin/auditorias/'.$audit->id)}}" method="POST" >
                                                    @csrf
                                                    @method('DELETE')
                                                        <a href="{{url('/admin/auditorias/'.$audit->id.'/edit')}}" type="button" rel="tooltip" title="Editar Usuario" class="btn btn-success btn-simple btn-xs">
                                                            <i class="fa fa-edit"></i>
                                                        </a>
                                                    <button type="submit" rel="tooltip" title="Eliminar Usuarios" class="btn btn-danger btn-simple btn-xs">
                                                        <i class="fa fa-times"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                        </table>
                     </div>
                     {{$auditoria->links()}}
                </div>
            </div>

        </div>
    </div>

@endsection
