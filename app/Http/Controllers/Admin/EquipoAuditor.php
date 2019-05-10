<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Auditoria;



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

                $auditorias= Auditoria::orderBy('objetivo', 'DESC')->get();
                return view('admin.equipos.index',compact('auditr','auditorias'));
            }

            $auditr=null;
            $auditorias= Auditoria::orderBy('objetivo', 'DESC')->get();

            return view('admin.equipos.index',compact('auditr','auditorias'));

        }else{
             $auditr=null;
             $auditorias= Auditoria::orderBy('objetivo', 'DESC')->get();

             return view('admin.equipos.index',compact('auditr','auditorias'));
         }

    }

    public function store(Request $request){
    dd($request);

        $data= Array();
        $arrayId = explode(",", $request->input('idArti'));
        $arrayP = explode(",", $request->input('precio'));
        $arrayC = explode(",", $request->input('cantidad'));
        $arrayD = explode(",", $request->input('descuento'));
        $data[]=array(
            "idarticulo"=>$arrayId,
            "precio"=>$arrayP,
            "cantidad"=>$arrayC,
            "descuento"=>$arrayD
        );

        $cli=$request->input('client');


        if($cli === null){
            $cliente= null;
        }else{
            $client=Client::ClientName($cli)->get();
            foreach ($client as $key => $cli) {
                $cliente=$cli->id;
            }
        }

        foreach ($data as $key => $value) {

            $longitud = count($value["idarticulo"]);

            for($i=0; $i<$longitud; $i++){
                $sales = new Sales();

                $sales->product_id  = $value["idarticulo"][$i];
                $sales->price = $value["precio"][$i];
                $sales->quantity = $value["cantidad"][$i];
                $sales->descuento = $value["descuento"][$i];
                $sales->id_client  = $cliente;
                $sales->forma_pago = $request->input('forma_pago');

                $sales->save();
            }
        }

        if ($sales){
             $request->session()->forget('carrito');
            return view('admin.ticket.info',compact('request'));
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
        $auditorias= Auditoria::orderBy('objetivo', 'DESC')->get();
        return view('admin.equipos.index',compact('auditr','auditorias'));
    }
}
