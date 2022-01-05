<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Corte
 * 
 * @property string $corte_id
 * @property bool|null $activo
 * @property Carbon|null $data_alteracao
 * @property Carbon|null $data_criacao
 * @property int|null $ano_economico
 * @property string|null $cliente_id
 * @property string|null $mes_inicio
 * @property string|null $mes_termino
 * @property string|null $utilizador_alteracao
 * @property string|null $utilizador_criacao
 * 
 * @property Utilizador|null $utilizador
 * @property Cliente|null $cliente
 * @property FinRubricaConfig|null $fin_rubrica_config
 *
 * @package App\Models
 */
class Corte extends Model
{
	protected $table = 'corte';
	protected $primaryKey = 'corte_id';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'activo' => 'bool',
		'ano_economico' => 'int'
	];

	protected $dates = [
		'data_alteracao',
		'data_criacao'
	];

	protected $fillable = [
		'activo',
		'data_alteracao',
		'data_criacao',
		'ano_economico',
		'cliente_id',
		'mes_inicio',
		'mes_termino',
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

	public function fin_rubrica_config()
	{
		return $this->belongsTo(FinRubricaConfig::class, 'mes_termino');
	}
}
