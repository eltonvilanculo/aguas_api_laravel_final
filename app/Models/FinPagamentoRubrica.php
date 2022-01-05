<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class FinPagamentoRubrica
 * 
 * @property string $pagamento_rubrica_id
 * @property bool|null $activo
 * @property Carbon|null $data_alteracao
 * @property Carbon|null $data_criacao
 * @property Carbon|null $data_pagamento
 * @property string|null $designacao
 * @property int|null $metodo_pagamento
 * @property float|null $montanteTotal
 * @property float|null $montante_unitario
 * @property string|null $observacao
 * @property int $quantidade
 * @property int|null $ano_economico
 * @property string|null $cliente_id
 * @property string|null $recibo_id
 * @property string|null $rubrica_id
 * @property string|null $utilizador_alteracao
 * @property string|null $utilizador_criacao
 * 
 * @property Utilizador|null $utilizador
 * @property Cliente|null $cliente
 * @property FinRubrica|null $fin_rubrica
 * @property FinRecibo|null $fin_recibo
 *
 * @package App\Models
 */
class FinPagamentoRubrica extends Model
{
	protected $table = 'fin_pagamento_rubrica';
	protected $primaryKey = 'pagamento_rubrica_id';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'activo' => 'bool',
		'metodo_pagamento' => 'int',
		'montanteTotal' => 'float',
		'montante_unitario' => 'float',
		'quantidade' => 'int',
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
		'designacao',
		'metodo_pagamento',
		'montanteTotal',
		'montante_unitario',
		'observacao',
		'quantidade',
		'ano_economico',
		'cliente_id',
		'recibo_id',
		'rubrica_id',
		'utilizador_alteracao',
		'utilizador_criacao'
	];

	public function utilizador()
	{
		return $this->belongsTo(Utilizador::class, 'utilizador_alteracao');
	}

	public function ano_economico()
	{
		return $this->belongsTo(AnoEconomico::class, 'ano_economico');
	}

	public function cliente()
	{
		return $this->belongsTo(Cliente::class);
	}

	public function fin_rubrica()
	{
		return $this->belongsTo(FinRubrica::class, 'rubrica_id');
	}

	public function fin_recibo()
	{
		return $this->belongsTo(FinRecibo::class, 'recibo_id');
	}
}
