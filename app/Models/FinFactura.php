<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class FinFactura
 *
 * @property string $fin_factura_id
 * @property bool|null $activo
 * @property Carbon|null $data_alteracao
 * @property Carbon|null $data_criacao
 * @property Carbon|null $data_limite
 * @property float|null $montante
 * @property float|null $montante_multa
 * @property float|null $montanteTotal
 * @property int|null $no_factura
 * @property float|null $percentagem_multa
 * @property int|null $status_pagamento
 * @property string|null $cliente_id
 * @property string|null $leitura_id
 * @property string|null $utilizador_alteracao
 * @property string|null $utilizador_criacao
 * @property Carbon|null $data_pagamento
 * @property string|null $designacao
 * @property int|null $metodo_pagamento
 * @property string|null $recibo_id
 *
 * @property Utilizador|null $utilizador
 * @property Cliente|null $cliente
 * @property FinLeitura|null $fin_leitura
 * @property FinRecibo|null $fin_recibo
 *
 * @package App\Models
 */
class FinFactura extends Model
{
	protected $table = 'fin_factura';
	protected $primaryKey = 'fin_factura_id';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'activo' => 'bool',
		'montante' => 'float',
		'montante_multa' => 'float',
		'montanteTotal' => 'float',
		'no_factura' => 'int',
		'percentagem_multa' => 'float',
		'status_pagamento' => 'int',
		'metodo_pagamento' => 'int'
	];

	protected $dates = [
		'data_alteracao',
		'data_criacao',
		'data_limite',
		'data_pagamento'
	];

	protected $fillable = [
        'fin_factura_id',
		'activo',
		'data_alteracao',
		'data_criacao',
		'data_limite',
		'montante',
		'montante_multa',
		'montanteTotal',
		'no_factura',
		'percentagem_multa',
		'status_pagamento',
		'cliente_id',
		'leitura_id',
		'utilizador_alteracao',
		'utilizador_criacao',
		'data_pagamento',
		'designacao',
		'metodo_pagamento',
		'recibo_id'
	];

	public function utilizador()
	{
		return $this->belongsTo(Utilizador::class, 'utilizador_alteracao');
	}

	public function cliente()
	{
		return $this->belongsTo(Cliente::class);
	}



	public function fin_recibo()
	{
		return $this->belongsTo(FinRecibo::class, 'recibo_id');
	}
}
