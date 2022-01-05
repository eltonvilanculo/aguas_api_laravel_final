<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class FinMontanteRubricaConfig
 * 
 * @property string $fin_montante_rubrica_config_id
 * @property bool|null $activo
 * @property Carbon|null $data_alteracao
 * @property Carbon|null $data_criacao
 * @property float|null $montante
 * @property string|null $rubrica_id
 * @property string|null $utilizador_alteracao
 * @property string|null $utilizador_criacao
 * 
 * @property Utilizador|null $utilizador
 * @property FinRubrica|null $fin_rubrica
 *
 * @package App\Models
 */
class FinMontanteRubricaConfig extends Model
{
	protected $table = 'fin_montante_rubrica_config';
	protected $primaryKey = 'fin_montante_rubrica_config_id';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'activo' => 'bool',
		'montante' => 'float'
	];

	protected $dates = [
		'data_alteracao',
		'data_criacao'
	];

	protected $fillable = [
		'activo',
		'data_alteracao',
		'data_criacao',
		'montante',
		'rubrica_id',
		'utilizador_alteracao',
		'utilizador_criacao'
	];

	public function utilizador()
	{
		return $this->belongsTo(Utilizador::class, 'utilizador_alteracao');
	}

	public function fin_rubrica()
	{
		return $this->belongsTo(FinRubrica::class, 'rubrica_id');
	}
}
