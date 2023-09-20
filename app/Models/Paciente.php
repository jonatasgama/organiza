<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Paciente extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'sobrenome', 'dt_nascimento', 'telefone', 'email', 'cep', 'cidade', 'endereco', 'bairro', 'complemento', 'primeira_sessao_id'];

    public function primeiraSessao(): HasOne
    /**
     * Get the user associated with the Paciente
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    {
        return $this->hasOne(PrimeiraSessao::class, 'primeira_sessao_id', 'id');
    }
}
