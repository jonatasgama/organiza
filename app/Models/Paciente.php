<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'sobrenome', 'dt_nascimento', 'telefone', 'email', 'cep', 'cidade', 'endereco', 'bairro', 'complemento'];
}
