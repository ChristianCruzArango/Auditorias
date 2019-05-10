@extends('layouts.app')

@section('title','Auditoría | Procesos')

@section('body-class','profile-page sidebar-collapse')

@section('content')
<div class="page-header header-filter" data-parallax="true" style="background-image: url('{{asset('/img/profile_city.jpg')}}')">
</div>
    <div class="main main-raised">
        <div class="container">

            <div class="section text-center">
                <h2 class="title">Listado de Procesos</h2>
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
                            <a href="{{url('/admin/procesos/create')}}" class="btn btn-primary btn-round">Nuevo Proceso</a>
                        </div>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="col-md-2 text-center">ID</th>
                                        <th class="col-md-5 text-center">Nombre</th>
                                        <th>Descripción</th>
                                        <th class="text-center">Opciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($procesos as $key => $proceso)
                                        <tr>
                                            <td>{{ $proceso->id }}</td>
                                            <td>{{ $proceso->nombre }}</td>

                                            <td>
                                                {{ $proceso->descripcion }}
                                            </td>

                                            <td class="td-actions text-center">
                                                <form action="{{url('/admin/procesos/'.$proceso->id)}}" method="POST" >
                                                    @csrf
                                                    @method('DELETE')
                                                        <a href="{{url('/admin/procesos/'.$proceso->id.'/edit')}}" type="button" rel="tooltip" title="Editar Proceso" class="btn btn-success btn-simple btn-xs">
                                                            <i class="fa fa-edit"></i>
                                                        </a>
                                                    <button type="submit" rel="tooltip" title="Eliminar Proceso" class="btn btn-danger btn-simple btn-xs">
                                                        <i class="fa fa-times"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                        </table>
                     </div>
                     {{$procesos->links()}}
                </div>
            </div>

        </div>
    </div>

@endsection
