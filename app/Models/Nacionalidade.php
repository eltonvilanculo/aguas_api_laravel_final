<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Nacionalidade
 * 
 * @property int $nacionalidade_id
 * @property bool|null $activo
 * @property string|null $codigo_pais
 * @property Carbon|null $data_alteracao
 * @property Carbon|null $data_criacao
 * @property string|null $designacao
 * @property string|null $indicativo_telefonico
 *
 * @package App\Models
 */
class Nacionalidade extends Model
{
	protected $table = 'nacionalidade';
	protected $primaryKey = 'nacionalidade_id';
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
		'codigo_pais',
		'data_alteracao',
		'data_criacao',
		'designacao',
		'indicativo_telefonico'
	];
}
