<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TipoContrato
 * 
 * @property string $tipo_contrato_id
 * @property bool|null $activo
 * @property Carbon|null $data_alteracao
 * @property Carbon|null $data_criacao
 * @property string|null $designacao
 * @property float|null $montante_consumo_minimo
 * @property float|null $preco_unitario
 * @property float|null $taxa_reeligacao
 * @property string|null $utilizador_alteracao
 * @property string|null $utilizador_criacao
 * 
 * @property Utilizador|null $utilizador
 * @property Collection|Cliente[] $clientes
 *
 * @package App\Models
 */
class TipoContrato extends Model
{
	protected $table = 'tipo_contrato';
	protected $primaryKey = 'tipo_contrato_id';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'activo' => 'bool',
		'montante_consumo_minimo' => 'float',
		'preco_unitario' => 'float',
		'taxa_reeligacao' => 'float'
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
		'montante_consumo_minimo',
		'preco_unitario',
		'taxa_reeligacao',
		'utilizador_alteracao',
		'utilizador_criacao'
	];

	public function utilizador()
	{
		return $this->belongsTo(Utilizador::class, 'utilizador_alteracao');
	}

	public function clientes()
	{
		return $this->hasMany(Cliente::class);
	}
}
