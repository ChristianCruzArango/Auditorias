<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;



class EquipoAuditor extends Controller
{
    public function index(Request $request )
    {
        if ($request->auditor != null ){

            $audit=$request->auditor;
            $auditor=User::Documento($audit)->get();
            $validardor= $auditor->first();

            if (isset($validardor)){
                $this->document($auditor,$request);
                $auditr=$request->session()->get('carritoAuditor');

                return view('admin.equipos.index',compact('auditr'));
            }

            $auditr=null;
            return view('admin.equipos.index',compact('auditr'));

        }else{
             $auditr=null;
               return view('admin.equipos.index',compact('auditr'));
         }

    }


    public function document($auditor,$request){
        $data= Array();
        foreach ($auditor as $key => $value) {
            $data[]=array(
            "id"=>$id=$value->id,
            "documento"=>$name=$value->documento,
            "nombre"=>$price=$value->name,

            );
        }
            $request->session()->push('carritoAuditor', $data);
            $request->session()->save();
    }

    public function destroy( Request $request){
        $auditr=$request->session()->get('carritoAuditor');
        unset($auditr[$request->cart_session_id]);
        $request->session()->put('carritoAuditor', $auditr);
        return view('admin.equipos.index',compact('auditr'));
    }
}
