<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Distrito
 * 
 * @property string $distrito_id
 * @property bool|null $activo
 * @property Carbon|null $data_alteracao
 * @property Carbon|null $data_criacao
 * @property string $designacao
 * @property string $provincia_id
 * 
 * @property Provincium $provincium
 * @property Collection|PostoAdministrativo[] $posto_administrativos
 *
 * @package App\Models
 */
class Distrito extends Model
{
	protected $table = 'distrito';
	protected $primaryKey = 'distrito_id';
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
		'provincia_id'
	];

	public function provincium()
	{
		return $this->belongsTo(Provincium::class, 'provincia_id');
	}

	public function posto_administrativos()
	{
		return $this->hasMany(PostoAdministrativo::class);
	}
}
