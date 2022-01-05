<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Perfil
 * 
 * @property string $perfil_id
 * @property bool|null $activo
 * @property Carbon|null $data_alteracao
 * @property Carbon|null $data_criacao
 * @property string|null $designacao
 * @property string|null $utilizador_criacao
 * 
 * @property Utilizador|null $utilizador
 * @property Collection|PeriflVsFuncionalidade[] $perifl_vs_funcionalidades
 * @property Collection|Utilizador[] $utilizadors
 *
 * @package App\Models
 */
class Perfil extends Model
{
	protected $table = 'perfil';
	protected $primaryKey = 'perfil_id';
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
		'utilizador_criacao'
	];

	public function utilizador()
	{
		return $this->belongsTo(Utilizador::class, 'utilizador_criacao');
	}

	public function perifl_vs_funcionalidades()
	{
		return $this->hasMany(PeriflVsFuncionalidade::class);
	}

	public function utilizadors()
	{
		return $this->belongsToMany(Utilizador::class, 'utilizador_vs_perfil')
					->withPivot('activo', 'data_alteracao', 'data_criacao', 'utilizador_criacao');
	}
}
