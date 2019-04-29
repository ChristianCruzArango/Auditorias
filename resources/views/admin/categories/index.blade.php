@extends('layouts.app')

@section('title','Auditoría | Categorìas')

@section('body-class','profile-page sidebar-collapse')

@section('content')
<div class="page-header header-filter" data-parallax="true" style="background-image: url('{{asset('/img/profile_city.jpg')}}')">
</div>
    <div class="main main-raised">
        <div class="container">

            <div class="section text-center">
                <h2 class="title">Listado de Categorías</h2>
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
                            <a href="{{url('/admin/categories/create')}}" class="btn btn-primary btn-round">Nueva Catogoría</a>
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
                                    @foreach ($categories as $key => $categorie)
                                        <tr>
                                            <td>{{ $categorie->id }}</td>
                                            <td>{{ $categorie->nombre }}</td>

                                            <td>
                                                {{ $categorie->descripcion }}
                                            </td>

                                            <td class="td-actions text-center">
                                                <form action="{{url('/admin/categories/'.$categorie->id)}}" method="POST" >
                                                    @csrf
                                                    @method('DELETE')
                                                        <a href="{{url('/admin/categories/'.$categorie->id.'/edit')}}" type="button" rel="tooltip" title="Editar Categoria" class="btn btn-success btn-simple btn-xs">
                                                            <i class="fa fa-edit"></i>
                                                        </a>
                                                    <button type="submit" rel="tooltip" title="Eliminar Categoria" class="btn btn-danger btn-simple btn-xs">
                                                        <i class="fa fa-times"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                        </table>
                     </div>
                     {{$categories->links()}}
                </div>
            </div>

        </div>
    </div>

@endsection
