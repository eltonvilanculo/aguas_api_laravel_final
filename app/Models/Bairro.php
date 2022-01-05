<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Bairro
 * 
 * @property string $bairro_id
 * @property bool|null $activo
 * @property Carbon|null $data_alteracao
 * @property Carbon|null $data_criacao
 * @property string|null $designacao
 * @property string|null $localidade_id
 * 
 * @property Localidade|null $localidade
 * @property Collection|Cliente[] $clientes
 *
 * @package App\Models
 */
class Bairro extends Model
{
	protected $table = 'bairro';
	protected $primaryKey = 'bairro_id';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'activo' => 'bool'
	];

	protected $dates = [
		'data_alteracao',
		'data_criacao'
	];

	protected $fillable = [
		'activo',
		'data_alteracao',
		'data_criacao',
		'designacao',
		'localidade_id'
	];

	public function localidade()
	{
		return $this->belongsTo(Localidade::class);
	}

	public function clientes()
	{
		return $this->hasMany(Cliente::class);
	}
}
