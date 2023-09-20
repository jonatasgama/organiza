<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PrimeiraSessaoController extends Controller
{
    public function store(Request $req)
    {
        $regras = [
            'forma_pagamento' => 'required|min:3'
        ];

        $feedback = [
                'forma_pagamento.min' => 'O campo tratamento precisa de no mínimo 3 caracteres',
                'required' => 'O campo :attribute deve ser preenchido'
        ];

        $req->validate($regras, $feedback);

        $resultado = Pagamento::create($req->all());

        $msg = $resultado == true ? 'Registro cadastrado com sucesso.' : 'Ocorreu algum erro, registro não cadastrado.';
        $alert = $resultado == true ? 'success' : 'danger';
        return view('cadastra_pagamento', [ 'msg' => $msg, 'alert' => $alert, 'funcao' => 'Cadastrar' ]);
    }
}
