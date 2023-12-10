<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paciente;
use App\Models\Consulta;
use App\Models\RegistroSessao;

class RegistroSessaoController extends Controller
{
    
    public function index(Request $req){

        return view('registro_sessao'); 

    }

    public function sessao(Request $req, $consulta_id, $paciente_id){

        $paciente = Paciente::find($paciente_id);
        $consulta = Consulta::find($consulta_id);
        $registrosessao = RegistroSessao::where('consulta_id', $consulta_id)->first();
        return view('registro_sessao', ['consulta' => $consulta, 'paciente' => $paciente, 'registrosessao' => $registrosessao ]); 

    }    

    public function store(Request $req){

        $resultado = RegistroSessao::updateOrCreate(
            [ 'paciente_id' => $req->paciente_id, 'consulta_id' => $req->consulta_id],
            [ 
                'rotina' => $req->rotina,
                'sono' => $req->sono,
                'alimentacao' => $req->alimentacao,
                'atividade_fisica' => $req->atividade_fisica,
                'intestino' => $req->intestino,
                'ansiedade' => $req->ansiedade,
                'tristeza' => $req->tristeza,
                'alegria' => $req->alegria,
                'motivacao' => $req->motivacao,
                'autoestima' => $req->autoestima,
                'agenda' => $req->agenda,
                'ponte' => $req->ponte,
                'atividades_semana' => $req->atividades_semana,
                'ajuda' => $req->ajuda,
                'proxima_sessao' => $req->proxima_sessao,
                'feedback' => $req->feedback,
                'aprendizagem' => $req->aprendizagem,
                'observacao' => $req->observacao,
                'problemas' => $req->problemas,
                'resolucoes' => $req->resolucoes
            ]
        );    
        $registrosessao = $resultado;
        $msg = $resultado == true ? 'Registro cadastrado com sucesso.' : 'Ocorreu algum erro, registro não cadastrado.';
        $alert = $resultado == true ? 'success' : 'danger';
        return redirect()->route('registrosessao', [$req->consulta_id, $req->paciente_id ])->with('msg', $msg)->with('alert', $alert);

    }

}
