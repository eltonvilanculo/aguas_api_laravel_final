<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class FinRubricaMultaConfig
 * 
 * @property string $fin_rubrica_multa_config_id
 * @property bool|null $activo
 * @property Carbon|null $data_alteracao
 * @property Carbon|null $data_criacao
 * @property int $intervalo_max
 * @property int $intervalo_min
 * @property float|null $percentagem_acrescida
 * @property string|null $utilizador_criacao
 * 
 * @property Utilizador|null $utilizador
 *
 * @package App\Models
 */
class FinRubricaMultaConfig extends Model
{
	protected $table = 'fin_rubrica_multa_config';
	protected $primaryKey = 'fin_rubrica_multa_config_id';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'activo' => 'bool',
		'intervalo_max' => 'int',
		'intervalo_min' => 'int',
		'percentagem_acrescida' => 'float'
	];

	protected $dates = [
		'data_alteracao',
		'data_criacao'
	];

	protected $fillable = [
		'activo',
		'data_alteracao',
		'data_criacao',
		'intervalo_max',
		'intervalo_min',
		'percentagem_acrescida',
		'utilizador_criacao'
	];

	public function utilizador()
	{
		return $this->belongsTo(Utilizador::class, 'utilizador_criacao');
	}
}
