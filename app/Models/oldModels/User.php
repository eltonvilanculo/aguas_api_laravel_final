<?php
namespace App\Models\OldModels;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */

    protected $table='utilizador';
    public $incrementing = false;
    protected $fillable = [

        'password',
        'username',
        'functionario_id',
        'utilizador_criacao',
        'telefone',
        'utilizador_id'

    ];



    public $timestamps = false;
}
