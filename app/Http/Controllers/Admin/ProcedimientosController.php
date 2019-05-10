<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Procedimiento;
use App\Proceso;


class ProcedimientosController extends Controller
{
    public function index()
    {
    	$procedimientos = Procedimiento::orderBy('nombre')->paginate(10);
    	return view('admin.procedimientos.index', compact('procedimientos'));
    }

    public function create()
    {
        $proceso=Proceso::orderBy('nombre','DESC')->get();
    	return view('admin.procedimientos.create',compact('proceso'));
    }

    public function store(Request $request)
    {
        $procedimientos = new Procedimiento();
        $procedimientos->procesos_id = $request->input('proceso_id');
        $procedimientos->nombre = $request->input('name');
        $procedimientos->descripcion = $request->input('description');
        $procedimientos->save(); // INSERT

        $notification = 'Se creo el procedimiento correctamente!';
        return back()->with(compact('notification'));
    }

    public function edit($id){
        $procedimiento=Procedimiento::find($id);
        $procesos= Proceso::orderBy('nombre', 'DESC')->get();
        return view('admin.procedimientos.edit', compact('procedimiento','procesos'));
    }

    public function update(Request $request, $id)
    {
        $procedimiento = Procedimiento::find($id);
        $procedimiento->procesos_id = $request->input('proceso_id');
        $procedimiento->nombre = $request->input('name');
        $procedimiento->descripcion = $request->input('description');
        $procedimiento->save(); // UPDATE

        $notification = 'Se Actualizó el procedimiento correctamente!';
        return back()->with(compact('notification'));
    }

    public function destroy(Procedimiento $procedimiento)
    {
        try {
			$procedimiento->delete();
            $notification = 'Se elimino el procedimiento correctamente!';
    	    return back()->with(compact('notification'));
		} catch (\Exception $exception) {
			$notification = 'El procedimiento no se puede borrar por que tiene anexos!';
    	    return back()->with(compact('notification'));
		}

    }


}
