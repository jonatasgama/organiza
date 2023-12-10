<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Avaliacao;

class AvaliacaoController extends Controller
{

    public function store(Request $req){

        $resultado = Avaliacao::updateOrCreate(
            [ 'paciente_id' => $req->paciente_id ],
            [ 
                'familia_avalicao_1_a_5' => $req->familia_avalicao_1_a_5,
                'familia_gostaria_de_alcancar' => $req->familia_gostaria_de_alcancar,
                'familia_dificuldades' => $req->familia_dificuldades,
                'familia_diferente' => $req->familia_diferente,
                'saude_avaliacao_1_a_5' => $req->saude_avaliacao_1_a_5,
                'saude_gostaria_de_alcancar' => $req->saude_gostaria_de_alcancar,
                'saude_dificuldades' => $req->saude_dificuldades,
                'saude_diferente' => $req->saude_diferente,
                'profissional_avaliacao_1_a_5' => $req->profissional_avaliacao_1_a_5,
                'profissional_gostaria_de_alcancar' => $req->profissional_gostaria_de_alcancar,
                'profissional_dificuldades' => $req->profissional_dificuldades,
                'profissional_diferente' => $req->profissional_diferente,
                'lazer_avaliacao_1_a_5' => $req->lazer_avaliacao_1_a_5,
                'lazer_gostaria_de_alcancar' => $req->lazer_gostaria_de_alcancar,
                'lazer_dificuldades' => $req->lazer_dificuldades,
                'lazer_diferente' => $req->lazer_diferente,
                'financeiro_avaliacao_1_a_5' => $req->financeiro_avaliacao_1_a_5,
                'financeiro_gostaria_de_alcancar' => $req->financeiro_gostaria_de_alcancar,
                'financeiro_dificuldades' => $req->financeiro_dificuldades,
                'financeiro_diferente' => $req->financeiro_diferente,
                'afetiva_avaliacao_1_a_5' => $req->afetiva_avaliacao_1_a_5,
                'afetiva_gostaria_de_alcancar' => $req->afetiva_gostaria_de_alcancar,
                'afetiva_dificuldades' => $req->afetiva_dificuldades,
                'afetiva_diferente' => $req->afetiva_diferente,
                'academia_avaliacao_1_a_5' => $req->academia_avaliacao_1_a_5,
                'academia_gostaria_de_alcancar' => $req->academia_gostaria_de_alcancar,
                'academia_dificuldades' => $req->academia_dificuldades,
                'academia_diferente' => $req->academia_diferente,
                'espiritualidade_avaliacao_1_a_5' => $req->espiritualidade_avaliacao_1_a_5,
                'espiritualidade_gostaria_de_alcancar' => $req->espiritualidade_gostaria_de_alcancar,
                'espiritualidade_dificuldades' => $req->espiritualidade_dificuldades,
                'espiritualidade_diferente' => $req->espiritualidade_diferente,
                'social_avaliacao_1_a_5' => $req->social_avaliacao_1_a_5,
                'social_gostaria_de_alcancar' => $req->social_gostaria_de_alcancar,
                'social_dificuldades' => $req->social_dificuldades,
                'social_diferente' => $req->social_diferente,
                'justica_social_avaliacao_1_a_5' => $req->justica_social_avaliacao_1_a_5,
                'justica_social_gostaria_de_alcancar' => $req->justica_social_gostaria_de_alcancar,
                'justica_social_dificuldades' => $req->justica_social_dificuldades,
                'justica_social_diferente' => $req->justica_social_diferente,
                'autoconceito_avaliacao_1_a_5' => $req->autoconceito_avaliacao_1_a_5,
                'autoconceito_gostaria_de_alcancar' => $req->autoconceito_gostaria_de_alcancar,
                'autoconceito_dificuldades' => $req->autoconceito_dificuldades,
                'autoconceito_diferente' => $req->autoconceito_diferente
            ]
        );    

        $msg = $resultado == true ? 'Registro cadastrado com sucesso.' : 'Ocorreu algum erro, registro não cadastrado.';
        $alert = $resultado == true ? 'success' : 'danger';
        return redirect()->route('paciente.show', [ $req->paciente_id ])->with('msg', $msg)->with('alert', $alert);

    }

}
