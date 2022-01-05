<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class PostoAdministrativo
 * 
 * @property string $posto_administrativo_id
 * @property bool|null $activo
 * @property Carbon|null $data_alteracao
 * @property Carbon|null $data_criacao
 * @property string $designacao
 * @property string|null $distrito_id
 * 
 * @property Distrito|null $distrito
 * @property Collection|Localidade[] $localidades
 *
 * @package App\Models
 */
class PostoAdministrativo extends Model
{
	protected $table = 'posto_administrativo';
	protected $primaryKey = 'posto_administrativo_id';
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
		'distrito_id'
	];

	public function distrito()
	{
		return $this->belongsTo(Distrito::class);
	}

	public function localidades()
	{
		return $this->hasMany(Localidade::class);
	}
}
