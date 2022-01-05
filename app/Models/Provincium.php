<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Provincium
 * 
 * @property string $provincia_id
 * @property bool|null $activo
 * @property string|null $codigo_manual
 * @property Carbon|null $data_alteracao
 * @property Carbon|null $data_criacao
 * @property string $designacao
 * 
 * @property Collection|Distrito[] $distritos
 * @property Collection|Empresa[] $empresas
 *
 * @package App\Models
 */
class Provincium extends Model
{
	protected $table = 'provincia';
	protected $primaryKey = 'provincia_id';
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
		'codigo_manual',
		'data_alteracao',
		'data_criacao',
		'designacao'
	];

	public function distritos()
	{
		return $this->hasMany(Distrito::class, 'provincia_id');
	}

	public function empresas()
	{
		return $this->hasMany(Empresa::class, 'provincia_id');
	}
}
