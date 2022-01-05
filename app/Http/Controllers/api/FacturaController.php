<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\FacturaRequest;
use App\Models\Contador;
use App\Models\FinFactura;
use App\Models\FinLeitura;
use Illuminate\Http\Request;

class FacturaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return FinLeitura::where('leitura_acutal','>',0.0)
        ->orderBy('data_alteracao', 'desc')
        ->paginate(10);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FacturaRequest $request)
    {
        $leitura = FinLeitura::where('leitura_id',$request->leitura_id)->first();

        $validate = Contador::where('cliente_id', $request->cliente_id)->where(
            'contador_id',$leitura->contador_id
        )->count();
        
        if($validate > 0){
            return FinFactura::create(
                [
                    'fin_factura_id'=> 'FACL000120' . FinFactura::count(),
                    'activo' => true,
                    'data_alteracao' => now(),
                    'data_criacao' =>  now(),
                    'data_limite' => $request->data_limite,
                    'montante' => $request->montante,
                    'cliente_id' => $request->cliente_id,
                    'leitura_id' => $request->leitura_id,
                    'utilizador_alteracao' => auth()->user()->utilizador_id,
                    'utilizador_criacao' => auth()->user()->utilizador_id,
                    'data_pagamento' => $request->data_pagamento,
                    'designacao' => $request->designacao,
                    'metodo_pagamento' => 1,
                    'recibo_id' => 2019000001
                ]
            );
        }else{
            return response()->json(['response'=>['message'=>false, 'data'=>null ,'exception'=> " Por favor verifique que o contador pertence ao cliente correspondente!"]],500);
        }


    }


}
