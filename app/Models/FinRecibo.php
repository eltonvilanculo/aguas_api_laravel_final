<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class FinRecibo
 * 
 * @property string $recibo_id
 * @property bool|null $activo
 * @property Carbon|null $data_alteracao
 * @property Carbon|null $data_criacao
 * @property Carbon|null $data_pagamento
 * @property float|null $montante
 * @property int|null $no_recibo
 * @property string|null $utilizador_alteracao
 * @property string|null $utilizador_criacao
 * @property string|null $finalidade
 * @property int|null $ano_economico
 * 
 * @property Utilizador|null $utilizador
 * @property Collection|FinFactura[] $fin_facturas
 * @property Collection|FinPagamentoRubrica[] $fin_pagamento_rubricas
 *
 * @package App\Models
 */
class FinRecibo extends Model
{
	protected $table = 'fin_recibo';
	protected $primaryKey = 'recibo_id';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'activo' => 'bool',
		'montante' => 'float',
		'no_recibo' => 'int',
		'ano_economico' => 'int'
	];

	protected $dates = [
		'data_alteracao',
		'data_criacao',
		'data_pagamento'
	];

	protected $fillable = [
		'activo',
		'data_alteracao',
		'data_criacao',
		'data_pagamento',
		'montante',
		'no_recibo',
		'utilizador_alteracao',
		'utilizador_criacao',
		'finalidade',
		'ano_economico'
	];

	public function utilizador()
	{
		return $this->belongsTo(Utilizador::class, 'utilizador_alteracao');
	}

	public function ano_economico()
	{
		return $this->belongsTo(AnoEconomico::class, 'ano_economico');
	}

	public function fin_facturas()
	{
		return $this->hasMany(FinFactura::class, 'recibo_id');
	}

	public function fin_pagamento_rubricas()
	{
		return $this->hasMany(FinPagamentoRubrica::class, 'recibo_id');
	}
}
