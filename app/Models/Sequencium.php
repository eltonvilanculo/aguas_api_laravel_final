<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Sequencium
 * 
 * @property int $sequencia_id
 * @property string|null $designacao
 * @property int $no_sequencia
 * @property int $tipo_sequencia
 * @property int|null $ano_economico
 * 
 *
 * @package App\Models
 */
class Sequencium extends Model
{
	protected $table = 'sequencia';
	protected $primaryKey = 'sequencia_id';
	public $timestamps = false;

	protected $casts = [
		'no_sequencia' => 'int',
		'tipo_sequencia' => 'int',
		'ano_economico' => 'int'
	];

	protected $fillable = [
		'designacao',
		'no_sequencia',
		'tipo_sequencia',
		'ano_economico'
	];

	public function ano_economico()
	{
		return $this->belongsTo(AnoEconomico::class, 'ano_economico');
	}
}
