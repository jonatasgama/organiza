<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paciente;
use App\Models\PrimeiraSessao;

class PrimeiraSessaoController extends Controller
{
    public function store(Request $req)
    {
        $regras = [
            'data_sessao' => 'date|required',
            'plano_de_saude' => 'required'
        ];

        $feedback = [
                'data_sessao.date' => 'Verifique o formato da data e tente novamente',
                'required' => 'O campo :attribute deve ser preenchido'
        ];

        $req->validate($regras, $feedback);

        $resultado = PrimeiraSessao::updateOrCreate(
            [ 'paciente_id' => $req->paciente_id ],
            [ 
                'data_sessao' => $req->data_sessao,
                'plano_de_saude' => $req->plano_de_saude,
                'p1' => $req->p1,
                'p2' => $req->p2,
                'p3' => $req->p3,
                'p4' => $req->p4,
                'p5' => $req->p5,
                'p6' => $req->p6,
                'p7' => $req->p7,
                'p8' => $req->p8,
                'p9' => $req->p9,
                'p10' => $req->p10,
                'anamnese' => $req->anamnese,
                'hipoteses_diagnostica' => $req->hipoteses_diagnostica,
                'anotacoes_relevantes' => $req->anotacoes_relevantes,
                'metas_terapeuticas' => $req->metas_terapeuticas
            ]
        );

        //estou pegando o ID da primeira sessao e associando ao paciente correspondente
        $paciente = Paciente::updateOrCreate(
            [ 'id' => $req->paciente_id],
            [ 'primeira_sessao_id' => $resultado->id]
        );
       
       
        //$paciente->primeira_sessao_id = $resultado->id;
        //$paciente->save();

        $msg = $resultado == true ? 'Registro cadastrado com sucesso.' : 'Ocorreu algum erro, registro não cadastrado.';
        $alert = $resultado == true ? 'success' : 'danger';
        return redirect()->route('paciente.show', [$req->paciente_id])->with('msg', $msg)->with('alert', $alert);
    }
}
