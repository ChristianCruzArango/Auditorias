<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Auditoria;

class AuditoriaController extends Controller
{
    public function index()
    {
    	$auditoria = Auditoria::orderBy('objetivo')->paginate(10);
    	return view('admin.auditorias.index', compact('auditoria'));
    }

    public function create()
    {
    	return view('admin.auditorias.create');
    }

    public function store(Request $request)
    {
        $auditoria = new Auditoria();
        $auditoria->objetivo = $request->input('objetivo');
        $auditoria->alcance = $request->input('alcance');
        $auditoria->criterio = $request->input('criterio');
        $auditoria->recursos = $request->input('recursos');
        $auditoria->riesgos = $request->input('riesgos');
        $auditoria->fechaInicio = $request->input('fecha_inicio');
        $auditoria->fechaFinal = $request->input('fecha_final');
        $auditoria->save(); // INSERT

        $notification = 'Se creo la auditoría correctamente!';
        return back()->with(compact('notification'));
    }


    public function edit($id)
    {
        $auditoria=Auditoria::find($id);
        return view('admin.auditorias.edit',compact('auditoria'));
    }

    public function update(Request $request, $id)
    {
        $auditoria = Auditoria::find($id);
        $auditoria->objetivo = $request->input('objetivo');
        $auditoria->alcance = $request->input('alcance');
        $auditoria->criterio = $request->input('criterio');
        $auditoria->recursos = $request->input('recursos');
        $auditoria->riesgos = $request->input('riesgos');
        $auditoria->fechaInicio = $request->input('fecha_inicio');
        $auditoria->fechaFinal = $request->input('fecha_final');
        $auditoria->save(); // INSERT

        $notification = 'Se Actualizó la auditoría  correctamente!';
        return back()->with(compact('notification'));
    }




    public function destroy($id)
    {
        $auditoria=Auditoria::find($id);
        try {
			$auditoria->delete();
            $notification = 'Se elimino la auditoría correctamente!';
    	    return back()->with(compact('notification'));
		} catch (\Exception $exception) {
			$notification = 'La auditoría no se puede borrar !';
    	    return back()->with(compact('notification'));
		}

    }
}
