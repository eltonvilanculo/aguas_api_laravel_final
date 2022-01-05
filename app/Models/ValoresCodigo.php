<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ValoresCodigo
 * 
 * @property int $valor_codigo_id
 * @property bool|null $activo
 * @property Carbon|null $data_alteracao
 * @property Carbon|null $data_criacao
 * @property string|null $designacao
 * @property int|null $valor_codigo
 * @property int|null $tipo_codigo_id
 * 
 * @property TiposCodigo|null $tipos_codigo
 *
 * @package App\Models
 */
class ValoresCodigo extends Model
{
	protected $table = 'valores_codigo';
	protected $primaryKey = 'valor_codigo_id';
	public $timestamps = false;

	protected $casts = [
		'activo' => 'bool',
		'valor_codigo' => 'int',
		'tipo_codigo_id' => 'int'
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
		'valor_codigo',
		'tipo_codigo_id'
	];

	public function tipos_codigo()
	{
		return $this->belongsTo(TiposCodigo::class, 'tipo_codigo_id');
	}
}
