<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ContadorGeral
 * 
 * @property string $contador_id
 * @property bool|null $activo
 * @property Carbon|null $data_alteracao
 * @property Carbon|null $data_criacao
 * @property float|null $leitura_actual
 * @property string|null $marca
 * @property int|null $mes_inicial
 * @property int|null $ano_economico_inicial
 * @property string|null $utilizador_alteracao
 * @property string|null $utilizador_criacao
 * @property string|null $zona_id
 * 
 * @property Utilizador|null $utilizador
 * @property AnoEconomico|null $ano_economico
 * @property Zona|null $zona
 * @property Collection|LeituraGeral[] $leitura_gerals
 *
 * @package App\Models
 */
class ContadorGeral extends Model
{
	protected $table = 'contador_geral';
	protected $primaryKey = 'contador_id';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'activo' => 'bool',
		'leitura_actual' => 'float',
		'mes_inicial' => 'int',
		'ano_economico_inicial' => 'int'
	];

	protected $dates = [
		'data_alteracao',
		'data_criacao'
	];

	protected $fillable = [
		'activo',
		'data_alteracao',
		'data_criacao',
		'leitura_actual',
		'marca',
		'mes_inicial',
		'ano_economico_inicial',
		'utilizador_alteracao',
		'utilizador_criacao',
		'zona_id'
	];

	public function utilizador()
	{
		return $this->belongsTo(Utilizador::class, 'utilizador_alteracao');
	}

	public function ano_economico()
	{
		return $this->belongsTo(AnoEconomico::class, 'ano_economico_inicial');
	}

	public function zona()
	{
		return $this->belongsTo(Zona::class);
	}

	public function leitura_gerals()
	{
		return $this->hasMany(LeituraGeral::class, 'contador_id');
	}
}
