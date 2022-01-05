<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

/**
 * Class Utilizador
 *
 * @property string $utilizador_id
 * @property bool|null $activo
 * @property string|null $authority
 * @property Carbon|null $data_alteracao
 * @property Carbon|null $data_criacao
 * @property int|null $no_tentativas_login
 * @property string|null $nome
 * @property string|null $password
 * @property string|null $username
 * @property string|null $funcionario_id
 * @property string|null $utilizador_criacao
 * @property int|null $telefone
 *
 * @property Utilizador|null $utilizador
 * @property RhFuncionario|null $rh_funcionario
 * @property Collection|AnoEconomico[] $ano_economicos
 * @property Collection|Cliente[] $clientes
 * @property Collection|Contador[] $contadors
 * @property Collection|ContadorGeral[] $contador_gerals
 * @property Collection|Corte[] $cortes
 * @property Collection|FinFactura[] $fin_facturas
 * @property Collection|FinLeitura[] $fin_leituras
 * @property Collection|FinMontanteRubricaConfig[] $fin_montante_rubrica_configs
 * @property Collection|FinPagamentoRubrica[] $fin_pagamento_rubricas
 * @property Collection|FinRecibo[] $fin_recibos
 * @property Collection|FinRubrica[] $fin_rubricas
 * @property Collection|FinRubricaConfig[] $fin_rubrica_configs
 * @property Collection|FinRubricaMultaConfig[] $fin_rubrica_multa_configs
 * @property Collection|Funcionalidade[] $funcionalidades
 * @property Collection|LeituraGeral[] $leitura_gerals
 * @property Collection|Perfil[] $perfils
 * @property Collection|PeriflVsFuncionalidade[] $perifl_vs_funcionalidades
 * @property Collection|RhFuncionario[] $rh_funcionarios
 * @property Collection|Suspensao[] $suspensaos
 * @property Collection|TipoContrato[] $tipo_contratos
 * @property Collection|Utilizador[] $utilizadors
 * @property Collection|Zona[] $zonas
 *
 * @package App\Models
 */
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

	protected $table = 'utilizador';
	protected $primaryKey = 'utilizador_id';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'activo' => 'bool',
		'no_tentativas_login' => 'int',
		'telefone' => 'int'
	];

	protected $dates = [
		'data_alteracao',
		'data_criacao'
	];

	protected $hidden = [
		'password'
	];

	protected $fillable = [
		'activo',
		'authority',
		'data_alteracao',
		'data_criacao',
		'no_tentativas_login',
		'nome',
		'password',
		'username',
		'funcionario_id',
		'utilizador_criacao',
		'telefone'
	];

	public function utilizador()
	{
		return $this->belongsTo(Utilizador::class, 'utilizador_criacao');
	}

	public function rh_funcionario()
	{
		return $this->belongsTo(RhFuncionario::class, 'funcionario_id');
	}

	public function ano_economicos()
	{
		return $this->hasMany(AnoEconomico::class, 'utilizador_criacao');
	}

	public function clientes()
	{
		return $this->hasMany(Cliente::class, 'utilizador_alteracao');
	}

	public function contadors()
	{
		return $this->hasMany(Contador::class, 'utilizador_alteracao');
	}

	public function contador_gerals()
	{
		return $this->hasMany(ContadorGeral::class, 'utilizador_alteracao');
	}

	public function cortes()
	{
		return $this->hasMany(Corte::class, 'utilizador_alteracao');
	}

	public function fin_facturas()
	{
		return $this->hasMany(FinFactura::class, 'utilizador_alteracao');
	}

	public function fin_leituras()
	{
		return $this->hasMany(FinLeitura::class, 'utilizador_alteracao');
	}

	public function fin_montante_rubrica_configs()
	{
		return $this->hasMany(FinMontanteRubricaConfig::class, 'utilizador_alteracao');
	}

	public function fin_pagamento_rubricas()
	{
		return $this->hasMany(FinPagamentoRubrica::class, 'utilizador_alteracao');
	}

	public function fin_recibos()
	{
		return $this->hasMany(FinRecibo::class, 'utilizador_alteracao');
	}

	public function fin_rubricas()
	{
		return $this->hasMany(FinRubrica::class, 'utilizador_criacao');
	}

	public function fin_rubrica_configs()
	{
		return $this->hasMany(FinRubricaConfig::class, 'utilizador_criacao');
	}

	public function fin_rubrica_multa_configs()
	{
		return $this->hasMany(FinRubricaMultaConfig::class, 'utilizador_criacao');
	}

	public function funcionalidades()
	{
		return $this->hasMany(Funcionalidade::class, 'utilizador_criacao');
	}

	public function leitura_gerals()
	{
		return $this->hasMany(LeituraGeral::class, 'utilizador_alteracao');
	}

	public function perfils()
	{
		return $this->belongsToMany(Perfil::class, 'utilizador_vs_perfil')
					->withPivot('activo', 'data_alteracao', 'data_criacao', 'utilizador_criacao');
	}

	public function perifl_vs_funcionalidades()
	{
		return $this->hasMany(PeriflVsFuncionalidade::class, 'utilizador_criacao');
	}

	public function rh_funcionarios()
	{
		return $this->hasMany(RhFuncionario::class, 'utilizador_criacao');
	}

	public function suspensaos()
	{
		return $this->hasMany(Suspensao::class, 'utilizador_alteracao');
	}

	public function tipo_contratos()
	{
		return $this->hasMany(TipoContrato::class, 'utilizador_alteracao');
	}

	public function utilizadors()
	{
		return $this->hasMany(Utilizador::class, 'utilizador_criacao');
	}

    public function linkReadings()
	{
		return $this->hasMany(LinkReading::class, 'id_utilizador');
	}

	public function zonas()
	{
		return $this->hasMany(Zona::class, 'utilizador_criacao');
	}
}
