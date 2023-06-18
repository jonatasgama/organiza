<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Consulta extends Model
{
    use HasFactory;

    protected $fillable = ['paciente_id', 'tratamento_id', 'pagamento_id', 'inicio_consulta', 'fim_consulta', 'pagamento'];
    
    public function paciente(): BelongsTo
    {
        return $this->belongsTo(Paciente::class);
    }
}
