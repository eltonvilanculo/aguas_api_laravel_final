<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreLeituraRequest;
use App\Http\Resources\LeiturasResource;
use App\Models\Cliente;
use App\Models\Contador;
use App\Models\FinFactura;
use App\Models\FinLeitura;
use App\Models\LinkReading;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LinkReadingController extends Controller
{
    //
    public function index(Request $request)
    {
        try {

            $user = collect(auth()->user());
            
            $zonas = LinkReading::where(
                'id_utilizador', $user['utilizador_id']
            )
            ->where('status',0)
            ->pluck('id_zona')->unique();
            $clientes = Cliente::whereIn(
                'zona_id',$zonas
            )->pluck('cliente_id');

            $contadores =  Contador::whereIn(
                'cliente_id',$clientes
            )->pluck('contador_id');
           $leituras =  FinLeitura::whereIn(
                'contador_id', $contadores)
                ->whereYear(
                    'data_criacao' ,'=',2019
                )
                ->whereMonth(
                    'data_criacao' ,'=', now()->month
                )->with(['contador',
                'contador.cliente'])->get();

            return response()->json(['response'=>['message'=>true, 'data'=> // $leituras
             LeiturasResource::collection(collect($leituras))
             ]],200);
        } catch (\Throwable $th) {
            return response()->json(['response'=>['message'=>false, 'data'=>null ,'exception'=>$th->getMessage()]],500);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLeituraRequest $request,String $leituraId)
    {
        try {

           $leituranaoActual = FinLeitura::where('leitura_id',$leituraId)->first();
           $leituranaoActual->leitura_acutal = $request->leitura_acutal;
           $leituranaoActual->consumo  =  $leituranaoActual->leitura_acutal - $leituranaoActual->leitura_anterior;
           $leituranaoActual->utilizador_alteracao = auth()->user()->utilizador_id;
           $leituranaoActual->save();

           $novaLeitura = $leituranaoActual;

           $novaLeitura->leitura_id = "LFCL0001". FinLeitura::count();
           $novaLeitura->leitura_anterior =  $leituranaoActual->leitura_acutal;
           $novaLeitura->leitura_acutal = 0;
           $novaLeitura->data_criacao = now();
           $novaLeitura->utilizador_criacao =  auth()->user()->utilizador_id;
           $novaLeitura->utilizador_alteracao = null;
           $novaLeitura->consumo  = 0;

           return FinLeitura::create($novaLeitura->toArray());

        } catch (\Throwable $th) {
            throw $th;
        }
    }

}
