<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Empresa
 * 
 * @property string $empresa_id
 * @property bool|null $activo
 * @property Carbon|null $data_alteracao
 * @property Carbon|null $data_criacao
 * @property string|null $email
 * @property string|null $endereco
 * @property mediumblob|null $logotipo
 * @property string|null $nome
 * @property int|null $nuit
 * @property int|null $telefone
 * @property int|null $telefone2
 * @property string|null $provincia_id
 * 
 * @property Provincium|null $provincium
 *
 * @package App\Models
 */
class Empresa extends Model
{
	protected $table = 'empresa';
	protected $primaryKey = 'empresa_id';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'activo' => 'bool',
		'logotipo' => 'mediumblob',
		'nuit' => 'int',
		'telefone' => 'int',
		'telefone2' => 'int'
	];

	protected $dates = [
		'data_alteracao',
		'data_criacao'
	];

	protected $fillable = [
		'activo',
		'data_alteracao',
		'data_criacao',
		'email',
		'endereco',
		'logotipo',
		'nome',
		'nuit',
		'telefone',
		'telefone2',
		'provincia_id'
	];

	public function provincium()
	{
		return $this->belongsTo(Provincium::class, 'provincia_id');
	}
}
