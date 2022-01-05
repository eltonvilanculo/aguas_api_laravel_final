<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class AnoEconomico
 * 
 * @property int $ano_economico
 * @property bool|null $activo
 * @property Carbon|null $data_alteracao
 * @property Carbon|null $data_criacao
 * @property Carbon|null $data_inicio
 * @property Carbon|null $date_termino
 * @property string|null $utilizador_criacao
 * 
 * @property Utilizador|null $utilizador
 * @property Collection|Cliente[] $clientes
 * @property Collection|ContadorGeral[] $contador_gerals
 * @property Collection|Corte[] $cortes
 * @property Collection|FinLeitura[] $fin_leituras
 * @property Collection|FinPagamentoRubrica[] $fin_pagamento_rubricas
 * @property Collection|FinRecibo[] $fin_recibos
 * @property Collection|FinRubricaConfig[] $fin_rubrica_configs
 * @property Collection|LeituraGeral[] $leitura_gerals
 * @property Collection|Sequencium[] $sequencia
 * @property Collection|Suspensao[] $suspensaos
 *
 * @package App\Models
 */
class AnoEconomico extends Model
{
	protected $table = 'ano_economico';
	protected $primaryKey = 'ano_economico';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'ano_economico' => 'int',
		'activo' => 'bool'
	];

	protected $dates = [
		'data_alteracao',
		'data_criacao',
		'data_inicio',
		'date_termino'
	];

	protected $fillable = [
		'activo',
		'data_alteracao',
		'data_criacao',
		'data_inicio',
		'date_termino',
		'utilizador_criacao'
	];

	public function utilizador()
	{
		return $this->belongsTo(Utilizador::class, 'utilizador_criacao');
	}

	public function clientes()
	{
		return $this->hasMany(Cliente::class, 'ano_economico_inicial');
	}

	public function contador_gerals()
	{
		return $this->hasMany(ContadorGeral::class, 'ano_economico_inicial');
	}

	public function cortes()
	{
		return $this->hasMany(Corte::class, 'ano_economico');
	}

	public function fin_leituras()
	{
		return $this->hasMany(FinLeitura::class, 'ano_economico');
	}

	public function fin_pagamento_rubricas()
	{
		return $this->hasMany(FinPagamentoRubrica::class, 'ano_economico');
	}

	public function fin_recibos()
	{
		return $this->hasMany(FinRecibo::class, 'ano_economico');
	}

	public function fin_rubrica_configs()
	{
		return $this->hasMany(FinRubricaConfig::class, 'ano_economico');
	}

	public function leitura_gerals()
	{
		return $this->hasMany(LeituraGeral::class, 'ano_economico');
	}

	public function sequencia()
	{
		return $this->hasMany(Sequencium::class, 'ano_economico');
	}

	public function suspensaos()
	{
		return $this->hasMany(Suspensao::class, 'ano_economico');
	}
}
