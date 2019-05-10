<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Categoria;

class CategoryController extends Controller
{
    public function index()
    {
    	$categories = Categoria::orderBy('nombre')->paginate(10);
    	return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
    	return view('admin.categories.create');
    }

    public function edit(Categoria $category)
    {
        return view('admin.categories.edit',compact('category'));
    }

    public function store(Request $request)
    {
        $categoria = new Categoria();
        $categoria->nombre = $request->input('name');
        $categoria->descripcion = $request->input('description');
        $categoria->save(); // INSERT

        $notification = 'Se creo la categorìa correctamente!';
        return back()->with(compact('notification'));
    }

    public function update(Request $request, $id)
    {
        $categoria = Categoria::find($id);
        $categoria->nombre = $request->input('name');
        $categoria->descripcion = $request->input('description');
        $categoria->save(); // UPDATE

        $notification = 'Se Actualizó la categorìa correctamente!';
        return back()->with(compact('notification'));
    }


    public function destroy(Categoria $category)
    {
        try {
			$category->delete();
            $notification = 'Se elimino la categoría correctamente!';
    	    return back()->with(compact('notification'));
		} catch (\Exception $exception) {
			$notification = 'La categoría no se puede borrar por que tiene anexos!';
    	    return back()->with(compact('notification'));
		}

    }
}
