<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paciente;
use App\Models\Consulta;

class RegistroSessaoController extends Controller
{
    
    public function index(Request $req){

        return view('registro_sessao'); 

    }

    public function sessao(Request $req, $id_consulta, $id_paciente){

        $paciente = Paciente::find($id_paciente);
        $consulta = Consulta::find($id_consulta);

        return view('registro_sessao', ['consulta' => $consulta, 'paciente' => $paciente ]); 

    }    

}
