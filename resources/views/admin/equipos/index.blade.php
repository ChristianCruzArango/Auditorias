@extends('layouts.app')
@section('title','Auditoría | Equipos Auditores')

@section('body-class','profile-page sidebar-collapse')

@section('content')
<div class="page-header header-filter" data-parallax="true" style="background-image: url('{{asset('/img/profile_city.jpg')}}');height: 125px;">
</div>
    <div class="main main-raised ">
        <div class="row">
            <div class="col-md-8 ml-auto mr-auto">
                <h4 class="text-center description"></h4>
                @if (session('notification'))
                    <div class="alert alert-info">
                        {{ session('notification') }}
                    </div>
                @endif
                    <div class="card-body">
                        <ul class="nav nav-pills nav-pills-icons" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" href="#dashboard-1" role="tab" data-toggle="tab">
                                    <i class="material-icons">wc</i>
                                    Equipos de Auditorias
                                </a>
                            </li>
                        </ul>
                            <div class="tab-content tab-space">
                                <div class="tab-pane active" id="dashboard-1">
                                    <div class="row">
                                        <div class="col-md-4">
                                                <div class="form-group">
                                                        <input type="text" placeholder="Nombre del equipo de auditores" class="form-control" name="equipo" id="equipo" required>
                                                </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <form class="form-inline" method="get" action="{{ url('/admin/equipos') }}">
                                                    <input type="text" placeholder="Documento del Auditor" class="form-control" name="auditor" id="auditor">
                                                    <button class="btn btn-primary btn-just-icon" type="submit">
                                                            <i class="material-icons">search</i>
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                        <table class="table" >
                                            <thead>
                                                <tr>
                                                    <th class="text-center">#</th>
                                                    <th class="text-center">Documento</th>
                                                    <th class="text-center">Nombre</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                    @if ($auditr  !=null)
                                                    @foreach($auditr as $indice => $audit)
                                                        <tr>
                                                            <td><input type="hidden" name="idarticulo[]" id="idarticulo[]" value="{{ $audit[0]["id"] }}">{{ $audit[0]["id"] }}</td>
                                                            <td>
                                                                <div class="col-md-6 offset-md-4">
                                                                        <input type="hidden" name="precioProductos[]" id="precioProductos[]" value="{{ $audit[0]["documento"] }}">
                                                                        {{ $audit[0]["documento"] }}
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="col-md-6 offset-md-4">
                                                                    <input type="hidden" name="descuentoProductos[]" id="descuentoProductos[]" value="{{ $audit[0]["nombre"] }}">
                                                                    {{ $audit[0]["nombre"] }}
                                                                </div>
                                                            </td>
                                                            <td>
                                                                    <form action="{{url('/admin/auditores/')}}" method="POST" >
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <input type="hidden" name="cart_session_id" value="{{ $indice }}">
                                                                        <button type="submit" rel="tooltip" title="Eliminar Auditor" class="btn btn-danger btn-simple btn-xs">
                                                                            <i class="fa fa-times"></i>
                                                                        </button>
                                                                    </form>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                @endif

                                            </tbody>
                                        </table>
                                        <div class="modal-footer col-md-8 offset-md-2">
                                            <button class="btn btn-success btn-round btn-submit" id="ajaxSubmitVariante" style="width: 105%;"  >
                                                    Guardar
                                            </button>
                                    </div>
                                </div>
                            </div>
                    </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
     <script src="{{ asset('js/interno/sales.js') }}"></script>
    <script src="{{ asset('js/interno/impresion.js') }}"></script>
@endsection
