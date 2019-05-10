<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Proceso;

class ProcesosController extends Controller
{
    public function index()
    {
    	$procesos = Proceso::orderBy('nombre')->paginate(10);
    	return view('admin.procesos.index', compact('procesos'));
    }

    public function create()
    {
    	return view('admin.procesos.create');
    }

    public function edit(Proceso $proceso)
    {
        return view('admin.procesos.edit',compact('proceso'));
    }


    public function update(Request $request, $id)
    {
        $proceso = Proceso::find($id);
        $proceso->nombre = $request->input('name');
        $proceso->descripcion = $request->input('description');
        $proceso->save(); // UPDATE

        $notification = 'Se Actualizó el proceso correctamente!';
        return back()->with(compact('notification'));
    }

    public function store(Request $request)
    {
        $proceso = new Proceso();
        $proceso->nombre = $request->input('name');
        $proceso->descripcion = $request->input('description');
        $proceso->save(); // INSERT

        $notification = 'Se creo el proceso correctamente!';
        return back()->with(compact('notification'));
    }

    public function destroy(Proceso $proceso)
    {
        try {
			$proceso->delete();
            $notification = 'Se elimino el proceso correctamente!';
    	    return back()->with(compact('notification'));
		} catch (\Exception $exception) {
			$notification = 'El proceso no se puede borrar por que tiene anexos!';
    	    return back()->with(compact('notification'));
		}

    }
}
