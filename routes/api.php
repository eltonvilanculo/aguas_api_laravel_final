<?php

use App\Http\Controllers\api\AuthController;
use App\Http\Controllers\api\FacturaController;
use App\Http\Controllers\api\LinkReadingController as ApiLinkReadingController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/debug', function(){
    return "Dados";
});

Route::get('/users', [AuthController::class,'index']);

Route::post('/signup', [AuthController::class,'signup']);
Route::post('/login', [AuthController::class,'login']);
Route::get('/login', [AuthController::class,'login']);

Route::get('/connect', [ApiLinkReadingController::class,'index'])->middleware('auth:sanctum');
Route::post('/nova-leitura/{leituraId}', [ApiLinkReadingController::class,'store'])->middleware('auth:sanctum');
Route::get('admin-lista-factura',[FacturaController::class,'index'])->middleware('auth:sanctum');
Route::post('admin-factura-store',[FacturaController::class,'store'])->middleware('auth:sanctum');



// Login basico
//Atribuir , verificar casas de leitura(em zonas)
//Verificar casas de leitura
//Pesquisar casas
//Efecturar leitura em casas
// Verificar leituras feitas
//Verificar agentes(alocados e nao alocados )
