<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class FinRubricaConfig
 * 
 * @property string $fin_rubrica_config_id
 * @property bool|null $activo
 * @property Carbon|null $data_alteracao
 * @property Carbon|null $data_criacao
 * @property Carbon|null $data_inicio
 * @property Carbon|null $date_termino
 * @property int|null $mes
 * @property int|null $ano_economico
 * @property string|null $utilizador_criacao
 * @property int|null $dia_inicio
 * @property int|null $dia_termino
 * 
 * @property Utilizador|null $utilizador
 * @property Collection|Corte[] $cortes
 * @property Collection|Suspensao[] $suspensaos
 *
 * @package App\Models
 */
class FinRubricaConfig extends Model
{
	protected $table = 'fin_rubrica_config';
	protected $primaryKey = 'fin_rubrica_config_id';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'activo' => 'bool',
		'mes' => 'int',
		'ano_economico' => 'int',
		'dia_inicio' => 'int',
		'dia_termino' => 'int'
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
		'mes',
		'ano_economico',
		'utilizador_criacao',
		'dia_inicio',
		'dia_termino'
	];

	public function utilizador()
	{
		return $this->belongsTo(Utilizador::class, 'utilizador_criacao');
	}

	public function ano_economico()
	{
		return $this->belongsTo(AnoEconomico::class, 'ano_economico');
	}

	public function cortes()
	{
		return $this->hasMany(Corte::class, 'mes_termino');
	}

	public function suspensaos()
	{
		return $this->hasMany(Suspensao::class, 'mes_termino');
	}
}
