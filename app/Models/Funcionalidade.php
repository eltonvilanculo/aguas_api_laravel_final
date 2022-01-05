<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Funcionalidade
 * 
 * @property string $funcionalidade_id
 * @property bool|null $activo
 * @property Carbon|null $data_alteracao
 * @property Carbon|null $data_criacao
 * @property string|null $designacao
 * @property string|null $utilizador_criacao
 * @property string|null $menu_id
 * 
 * @property Utilizador|null $utilizador
 * @property Collection|PeriflVsFuncionalidade[] $perifl_vs_funcionalidades
 *
 * @package App\Models
 */
class Funcionalidade extends Model
{
	protected $table = 'funcionalidade';
	protected $primaryKey = 'funcionalidade_id';
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
		'utilizador_criacao',
		'menu_id'
	];

	public function utilizador()
	{
		return $this->belongsTo(Utilizador::class, 'utilizador_criacao');
	}

	public function perifl_vs_funcionalidades()
	{
		return $this->hasMany(PeriflVsFuncionalidade::class);
	}
}
