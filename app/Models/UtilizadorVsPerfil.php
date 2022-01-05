<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class UtilizadorVsPerfil
 * 
 * @property string $perfil_id
 * @property string $utilizador_id
 * @property bool|null $activo
 * @property Carbon|null $data_alteracao
 * @property Carbon|null $data_criacao
 * @property string|null $utilizador_criacao
 * 
 * @property Utilizador $utilizador
 * @property Perfil $perfil
 *
 * @package App\Models
 */
class UtilizadorVsPerfil extends Model
{
	protected $table = 'utilizador_vs_perfil';
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
		'utilizador_criacao'
	];

	public function utilizador()
	{
		return $this->belongsTo(Utilizador::class);
	}

	public function perfil()
	{
		return $this->belongsTo(Perfil::class);
	}
}
