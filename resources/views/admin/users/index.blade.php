@extends('layouts.app')

@section('title','Auditoría | Usuarios')

@section('body-class','profile-page sidebar-collapse')

@section('content')
<div class="page-header header-filter" data-parallax="true" style="background-image: url('{{asset('/img/profile_city.jpg')}}')">
</div>
    <div class="main main-raised">
        <div class="container">

            <div class="section text-center">
                <h2 class="title">Listado de Usuarios</h2>
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
                            <a href="{{url('/admin/users/create')}}" class="btn btn-primary btn-round">Nuevo Usuario</a>
                        </div>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th class="col-md-3 text-center">Nombre</th>
                                        <th>Documento</th>
                                        <th>Rol</th>
                                        <th class="text-center">Email</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $key => $user)
                                        <tr>
                                            <td>{{ $user->id }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->documento }}</td>
                                            <td>{{ $user->role_id }}</td>
                                            <td>{{ $user->email }}</td>

                                            <td class="td-actions text-center">
                                                <form action="{{url('/admin/users/'.$user->id)}}" method="POST" >
                                                    @csrf
                                                    @method('DELETE')
                                                        <a href="{{url('/admin/users/'.$user->id.'/edit')}}" type="button" rel="tooltip" title="Editar Usuario" class="btn btn-success btn-simple btn-xs">
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
                     {{$users->links()}}
                </div>
            </div>

        </div>
    </div>

@endsection
