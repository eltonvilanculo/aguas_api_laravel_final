<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class FinLeitura
 *
 * @property string $leitura_id
 * @property bool|null $activo
 * @property float|null $consumo
 * @property Carbon|null $data_alteracao
 * @property Carbon|null $data_criacao
 * @property float|null $leitura_acutal
 * @property float|null $leitura_anterior
 * @property int|null $mes
 * @property int|null $ano_economico
 * @property string|null $contador_id
 * @property string|null $utilizador_alteracao
 * @property string|null $utilizador_criacao
 *
 * @property Utilizador|null $utilizador
 * @property Contador|null $contador
 * @property Collection|FinFactura[] $fin_facturas
 *
 * @package App\Models
 */
class FinLeitura extends Model
{
	protected $table = 'fin_leitura';
	protected $primaryKey = 'leitura_id';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'activo' => 'bool',
		'consumo' => 'float',
		'leitura_acutal' => 'float',
		'leitura_anterior' => 'float',
		'mes' => 'int',
		'ano_economico' => 'int'
	];

	protected $dates = [
		'data_alteracao',
		'data_criacao'
	];

	protected $fillable = [
        'leitura_id',
		'activo',
		'consumo',
		'data_alteracao',
		'data_criacao',
		'leitura_acutal',
		'leitura_anterior',
		'mes',
		'ano_economico',
		'contador_id',
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

	public function contador()
	{
		return $this->belongsTo(Contador::class,'contador_id'
    );
	}

	public function fin_facturas()
	{
		return $this->hasMany(FinFactura::class, 'leitura_id');

	}


}
