<?php

namespace App\Models\OldModels;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    protected $table='cliente';


    public function zone()
    {
        return $this->belongsTo(Zone::class,);
    }
}
