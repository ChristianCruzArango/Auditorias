<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Role;


class UserController extends Controller
{
    public function index()
    {
    	$users = User::orderBy('name')->paginate(10);
    	return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        $role=Role::orderBy('name','DESC')->get();
    	return view('admin.users.create',compact('role'));
    }

    public function edit($id){
        $user=User::find($id);
        $roles= Role::orderBy('name', 'DESC')->get();
        return view('admin.users.edit', compact('user','roles'));
    }


    public function store(Request $request){
        $user = new User();
        $user->documento = $request->input('documento');
        $user->role_id = $request->input('role_id');
        $user->name = $request->input('name');
        $user->surname = $request->input('surname');
        $user->direccion = $request->input('direccion');
        $user->phone = $request->input('telefono');
        $user->email = $request->input('mail');
        $user->cargo = $request->input('cargo');
        $user->profesion = $request->input('profesion');
        $user->password =bcrypt($request->input('password'));
        $user->save(); // INSERT

        $notification = 'Se creo la categorìa correctamente!';
        return back()->with(compact('notification'));
    }


    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->documento = $request->input('documento');
        $user->role_id = $request->input('role_id');
        $user->name = $request->input('name');
        $user->surname = $request->input('surname');
        $user->direccion = $request->input('direccion');
        $user->phone = $request->input('telefono');
        $user->email = $request->input('mail');
        $user->cargo = $request->input('cargo');
        $user->profesion = $request->input('profesion');
        $user->save(); // UPDATE

        $notification = 'Se Actualizó el usuario correctamente!';
        return back()->with(compact('notification'));
    }


    public function destroy(User $user)
    {
        try {
			$user->delete();
            $notification = 'Se elimino el usuario correctamente!';
    	    return back()->with(compact('notification'));
		} catch (\Exception $exception) {
			$notification = 'No se pudo borrar el usuario seleccionado !';
    	    return back()->with(compact('notification'));
		}

    }
}
