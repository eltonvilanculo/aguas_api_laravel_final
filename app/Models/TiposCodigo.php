<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TiposCodigo
 * 
 * @property int $tipo_codigo_id
 * @property bool|null $activo
 * @property Carbon|null $data_alteracao
 * @property Carbon|null $data_criacao
 * @property string|null $designacao
 * 
 * @property Collection|ValoresCodigo[] $valores_codigos
 *
 * @package App\Models
 */
class TiposCodigo extends Model
{
	protected $table = 'tipos_codigo';
	protected $primaryKey = 'tipo_codigo_id';
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
		'designacao'
	];

	public function valores_codigos()
	{
		return $this->hasMany(ValoresCodigo::class, 'tipo_codigo_id');
	}
}
