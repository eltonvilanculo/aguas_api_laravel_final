<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Zona
 *
 * @property string $zona_id
 * @property bool|null $activo
 * @property Carbon|null $data_alteracao
 * @property Carbon|null $data_criacao
 * @property string|null $designacao
 * @property string|null $utilizador_criacao
 *
 * @property Utilizador|null $utilizador
 * @property Collection|Cliente[] $clientes
 * @property Collection|ContadorGeral[] $contador_gerals
 * @property Collection|LeituraGeral[] $leitura_gerals
 *
 * @package App\Models
 */
class Zona extends Model
{
	protected $table = 'zona';
	protected $primaryKey = 'zona_id';
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

	public function clientes()
	{
		return $this->hasMany(Cliente::class,'cliente_id','zona_id');
	}

	public function contador_gerals()
	{
		return $this->hasMany(ContadorGeral::class);
	}

	public function leitura_gerals()
	{
		return $this->hasMany(LeituraGeral::class);
	}
}
