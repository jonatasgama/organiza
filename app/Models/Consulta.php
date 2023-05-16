<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consulta extends Model
{
    use HasFactory;

    protected $fillable = ['paciente_id', 'tratamento_id', 'pagamento_id', 'inicio_consulta', 'fim_consulta', 'pagamento'];
}
