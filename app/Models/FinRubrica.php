<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class FinRubrica
 * 
 * @property string $rubrica_id
 * @property bool|null $activo
 * @property Carbon|null $data_alteracao
 * @property Carbon|null $data_criacao
 * @property string|null $designacao
 * @property string|null $utilizador_criacao
 * 
 * @property Utilizador|null $utilizador
 * @property Collection|FinMontanteRubricaConfig[] $fin_montante_rubrica_configs
 * @property Collection|FinPagamentoRubrica[] $fin_pagamento_rubricas
 *
 * @package App\Models
 */
class FinRubrica extends Model
{
	protected $table = 'fin_rubrica';
	protected $primaryKey = 'rubrica_id';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'activo' => 'bool'
	];

	protected $dates = [
		'data_alteracao',
		'data_criacao'
	];

	protected $fillable = [
		'activo',
		'data_alteracao',
		'data_criacao',
		'designacao',
		'utilizador_criacao'
	];

	public function utilizador()
	{
		return $this->belongsTo(Utilizador::class, 'utilizador_criacao');
	}

	public function fin_montante_rubrica_configs()
	{
		return $this->hasMany(FinMontanteRubricaConfig::class, 'rubrica_id');
	}

	public function fin_pagamento_rubricas()
	{
		return $this->hasMany(FinPagamentoRubrica::class, 'rubrica_id');
	}
}
