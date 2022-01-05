<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Cliente
 *
 * @property string $cliente_id
 * @property bool|null $activo
 * @property Carbon|null $data_alteracao
 * @property Carbon|null $data_criacao
 * @property string|null $endereco
 * @property string|null $nome
 * @property int|null $nuit
 * @property int|null $telefone
 * @property int|null $telefone2
 * @property string|null $bairro_id
 * @property string|null $tipo_contrato_id
 * @property string|null $utilizador_alteracao
 * @property string|null $utilizador_criacao
 * @property int|null $mes_inicial
 * @property int|null $ano_economico_inicial
 * @property int|null $no_cliente
 * @property string|null $zona_id
 * @property float|null $saldo
 * @property int|null $status_contrato
 * @property string|null $observacao
 * @property bool|null $isento_de_multas
 *
 * @property Utilizador|null $utilizador
 * @property AnoEconomico|null $ano_economico
 * @property Zona|null $zona
 * @property TipoContrato|null $tipo_contrato
 * @property Bairro|null $bairro
 * @property Collection|Contador[] $contadors
 * @property Collection|Corte[] $cortes
 * @property Collection|FinFactura[] $fin_facturas
 * @property Collection|FinPagamentoRubrica[] $fin_pagamento_rubricas
 * @property Collection|Suspensao[] $suspensaos
 *
 * @package App\Models
 */
class Cliente extends Model
{
	protected $table = 'cliente';
	protected $primaryKey = 'cliente_id';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'activo' => 'bool',
		'nuit' => 'int',
		'telefone' => 'int',
		'telefone2' => 'int',
		'mes_inicial' => 'int',
		'ano_economico_inicial' => 'int',
		'no_cliente' => 'int',
		'saldo' => 'float',
		'status_contrato' => 'int',
		'isento_de_multas' => 'bool'
	];

	protected $dates = [
		'data_alteracao',
		'data_criacao'
	];

	protected $fillable = [
		'activo',
		'data_alteracao',
		'data_criacao',
		'endereco',
		'nome',
		'nuit',
		'telefone',
		'telefone2',
		'bairro_id',
		'tipo_contrato_id',
		'utilizador_alteracao',
		'utilizador_criacao',
		'mes_inicial',
		'ano_economico_inicial',
		'no_cliente',
		'zona_id',
		'saldo',
		'status_contrato',
		'observacao',
		'isento_de_multas'
	];

	public function utilizador()
	{
		return $this->belongsTo(Utilizador::class, 'utilizador_alteracao');
	}

	public function ano_economico()
	{
		return $this->belongsTo(AnoEconomico::class, 'ano_economico_inicial');
	}

	public function zona()
	{
		return $this->belongsTo(Zona::class,'zona_id');
	}

	public function tipo_contrato()
	{
		return $this->belongsTo(TipoContrato::class);
	}

	public function bairro()
	{
		return $this->belongsTo(Bairro::class);
	}

	public function contadors()
	{
		return $this->hasMany(Contador::class,'contador_id');
	}

	public function cortes()
	{
		return $this->hasMany(Corte::class);
	}

	public function fin_facturas()
	{
		return $this->hasMany(FinFactura::class);
	}

	public function fin_pagamento_rubricas()
	{
		return $this->hasMany(FinPagamentoRubrica::class);
	}

	public function suspensaos()
	{
		return $this->hasMany(Suspensao::class);
	}
}
