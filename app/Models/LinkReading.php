<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class LinkReading
 *
 * @property int $id
 * @property string $id_zona
 * @property string $id_utilizador
 * @property int $status
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class LinkReading extends Model
{
	protected $table = 'link_readings';

	protected $casts = [
		'status' => 'int'
	];

	protected $fillable = [
		'id_zona',
		'id_utilizador',
		'status'
	];
    public function zone()
    {
        return $this->belongsTo(Zona::class,'id_zona','zona_id');
    }


    public function user(){
        return $this->belongsTo(User::class,'id_utilizador','utilizador_id');
    }

}
