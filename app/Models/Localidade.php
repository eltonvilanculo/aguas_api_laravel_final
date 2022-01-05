<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Localidade
 * 
 * @property string $localidade_id
 * @property bool|null $activo
 * @property Carbon|null $data_alteracao
 * @property Carbon|null $data_criacao
 * @property string $designacao
 * @property string|null $posto_administrativo_id
 * 
 * @property PostoAdministrativo|null $posto_administrativo
 * @property Collection|Bairro[] $bairros
 *
 * @package App\Models
 */
class Localidade extends Model
{
	protected $table = 'localidade';
	protected $primaryKey = 'localidade_id';
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
		'posto_administrativo_id'
	];

	public function posto_administrativo()
	{
		return $this->belongsTo(PostoAdministrativo::class);
	}

	public function bairros()
	{
		return $this->hasMany(Bairro::class);
	}
}
