<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class RhFuncionario
 * 
 * @property string $funcionario_id
 * @property bool|null $activo
 * @property string|null $apelido
 * @property Carbon|null $data_alteracao
 * @property Carbon|null $data_criacao
 * @property Carbon|null $data_nasc
 * @property Carbon|null $data_nascimento
 * @property int|null $genero
 * @property string|null $nome
 * @property string|null $utilizador_criacao
 * 
 * @property Utilizador|null $utilizador
 * @property Collection|Utilizador[] $utilizadors
 *
 * @package App\Models
 */
class RhFuncionario extends Model
{
	protected $table = 'rh_funcionario';
	protected $primaryKey = 'funcionario_id';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'activo' => 'bool',
		'genero' => 'int'
	];

	protected $dates = [
		'data_alteracao',
		'data_criacao',
		'data_nasc',
		'data_nascimento'
	];

	protected $fillable = [
		'activo',
		'apelido',
		'data_alteracao',
		'data_criacao',
		'data_nasc',
		'data_nascimento',
		'genero',
		'nome',
		'utilizador_criacao'
	];

	public function utilizador()
	{
		return $this->belongsTo(Utilizador::class, 'utilizador_criacao');
	}

	public function utilizadors()
	{
		return $this->hasMany(Utilizador::class, 'funcionario_id');
	}
}
