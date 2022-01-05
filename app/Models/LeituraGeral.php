<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class LeituraGeral
 * 
 * @property string $leitura_geral_id
 * @property bool|null $activo
 * @property float|null $consumo
 * @property Carbon|null $data_alteracao
 * @property Carbon|null $data_criacao
 * @property float|null $leitura_actual
 * @property float|null $leitura_anterior
 * @property int|null $mes
 * @property int|null $ano_economico
 * @property string|null $contador_id
 * @property string|null $utilizador_alteracao
 * @property string|null $utilizador_criacao
 * @property string|null $zona_id
 * 
 * @property Utilizador|null $utilizador
 * @property Zona|null $zona
 * @property ContadorGeral|null $contador_geral
 *
 * @package App\Models
 */
class LeituraGeral extends Model
{
	protected $table = 'leitura_geral';
	protected $primaryKey = 'leitura_geral_id';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'activo' => 'bool',
		'consumo' => 'float',
		'leitura_actual' => 'float',
		'leitura_anterior' => 'float',
		'mes' => 'int',
		'ano_economico' => 'int'
	];

	protected $dates = [
		'data_alteracao',
		'data_criacao'
	];

	protected $fillable = [
		'activo',
		'consumo',
		'data_alteracao',
		'data_criacao',
		'leitura_actual',
		'leitura_anterior',
		'mes',
		'ano_economico',
		'contador_id',
		'utilizador_alteracao',
		'utilizador_criacao',
		'zona_id'
	];

	public function utilizador()
	{
		return $this->belongsTo(Utilizador::class, 'utilizador_alteracao');
	}

	public function zona()
	{
		return $this->belongsTo(Zona::class);
	}

	public function ano_economico()
	{
		return $this->belongsTo(AnoEconomico::class, 'ano_economico');
	}

	public function contador_geral()
	{
		return $this->belongsTo(ContadorGeral::class, 'contador_id');
	}
}
