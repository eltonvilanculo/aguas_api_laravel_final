<?php

namespace App\Models\OldModels;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LinkReading extends Model
{
    use HasFactory;

    protected $fillable = [

        'id_zona',
        'id_utilizador',
        'status'

    ];

    public function zone()
    {
        return $this->belongsTo(Zone::class,'id_zona','zona_id');
    }


    public function user(){
        return $this->belongsTo(User::class,'id_utilizador','utilizador_id');
    }


}
