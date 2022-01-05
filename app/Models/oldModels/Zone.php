<?php

namespace App\Models\OldModels;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Zone extends Model
{
    use HasFactory;

    protected $table='zona';
    public $incrementing = false;


    public function clients(){

        // chave estrangeira no Client ,  chave primaria na zona
        return $this->hasMany(Client::class,'zona_id','zona_id');
    }
}
