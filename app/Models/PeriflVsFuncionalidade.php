<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class PeriflVsFuncionalidade
 * 
 * @property string $funcionalidade_id
 * @property string $perfil_id
 * @property bool|null $activo
 * @property Carbon|null $data_alteracao
 * @property Carbon|null $data_criacao
 * @property string|null $utilizador_criacao
 * 
 * @property Utilizador|null $utilizador
 * @property Perfil $perfil
 * @property Funcionalidade $funcionalidade
 *
 * @package App\Models
 */
class PeriflVsFuncionalidade extends Model
{
	protected $table = 'perifl_vs_funcionalidade';
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
		return $this->belongsTo(Utilizador::class, 'utilizador_criacao');
	}

	public function perfil()
	{
		return $this->belongsTo(Perfil::class);
	}

	public function funcionalidade()
	{
		return $this->belongsTo(Funcionalidade::class);
	}
}
