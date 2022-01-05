<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Contador
 *
 * @property string $contador_id
 * @property bool|null $activo
 * @property Carbon|null $data_alteracao
 * @property Carbon|null $data_criacao
 * @property string|null $marca
 * @property bool|null $no_incognito
 * @property float|null $no_metros_cubicos
 * @property string $cliente_id
 * @property string|null $utilizador_alteracao
 * @property string|null $utilizador_criacao
 *
 * @property Utilizador|null $utilizador
 * @property Cliente $cliente
 * @property Collection|FinLeitura[] $fin_leituras
 *
 * @package App\Models
 */
class Contador extends Model
{
	protected $table = 'contador';
	protected $primaryKey = 'contador_id';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'activo' => 'bool',
		'no_incognito' => 'bool',
		'no_metros_cubicos' => 'float'
	];

	protected $dates = [
		'data_alteracao',
		'data_criacao'
	];

	protected $fillable = [
		'activo',
		'data_alteracao',
		'data_criacao',
		'marca',
		'no_incognito',
		'no_metros_cubicos',
		'cliente_id',
		'utilizador_alteracao',
		'utilizador_criacao'
	];

	public function utilizador()
	{
		return $this->belongsTo(Utilizador::class, 'utilizador_alteracao');
	}

	public function cliente()
	{
		return $this->belongsTo(Cliente::class,'cliente_id');
	}

	public function fin_leituras()
	{
		return $this->hasMany(FinLeitura::class);
	}
}
