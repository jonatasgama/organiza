<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gasto;
use App\Models\Saida;
use App\Models\Financeiro;
use Illuminate\Support\Facades\DB;

class SaidaController extends Controller
{
    public function index(Request $req)
    {
        $saidas = Saida::with(['gasto'])->get();
        return view('lista_saidas', [ 'saidas' => $saida ]); 
    }

    public function create()
    {
        $gastos = Gasto::all();
        return view('cadastra_saida', [ 'gastos' => $gastos ]);
    }    

    public function store(Request $req)
    {
        $valor_unidade = Gasto::find($req->gasto_id);
        $regras = [
            'quantidade' => 'required|min:1',
            'data_saida' => 'required'
        ];

        $feedback = [
            'quantidade.min' => 'O campo :attribute precisa ter no mínimo 1.',
            'required' => 'O campo :attribute deve ser preenchido',
        ];
        
        $req['valor_unidade'] = $valor_unidade->valor;
        $req->validate($regras, $feedback);

        $resultado = Saida::create($req->all());
        //insere informações na tabela de controle financeiro
        $financeiro = Financeiro::create([
            'data_registro' => $req->data_saida,
            'gasto_id' => $req->gasto_id,
            'quantidade' => $req->quantidade,
            'valor_unidade' => $valor_unidade->valor
        ]);        

        $msg = $resultado == true ? 'Item cadastrado com sucesso.' : 'Ocorreu algum erro, item não cadastrado.';
        $alert = $resultado == true ? 'success' : 'danger'; 
        return redirect()->route('saida.create')->with('msg', $msg)->with('alert', $alert);
    }
    
    public function itemPorMes(Request $req){
        $gastos = Gasto::all();
        return view('itens_por_mes', [ 'gastos' => $gastos ]);
    }

    public function pesquisarItemPorMes(Request $req){
        //$itens = Saida::with(['gasto'])->where('gasto_id', $req->gasto_id)->whereBetween('data_saida', [$req->data_inicio, $req->data_fim])->get();
        $gastos = Gasto::all();
        $itens = DB::select("SELECT g.item , monthname(s.data_saida) as mes, SUM(s.quantidade) as quantidade, s.valor_unidade, (SUM(s.quantidade) * s.valor_unidade) as total FROM saidas s INNER JOIN gastos g on g.id = s.gasto_id WHERE s.data_saida BETWEEN :inicio AND :fim AND g.id = :item GROUP BY g.item, mes, s.valor_unidade", [ 'inicio' => $req->data_inicio, 'fim' => $req->data_fim, 'item' => $req->gasto_id ]);
        return view('itens_por_mes', [ 'gastos' => $gastos, 'itens' => $itens ]);
    }

    public function gastosPorMes(Request $req){
        return view('gastos_por_mes');
    }    

    public function pesquisarGastosPorMes(Request $req){
        $itens = DB::select("SELECT g.item , monthname(s.data_saida) as mes, SUM(s.quantidade) as quantidade, s.valor_unidade, (SUM(s.quantidade) * s.valor_unidade) as total FROM saidas s INNER JOIN gastos g on g.id = s.gasto_id WHERE s.data_saida BETWEEN :inicio AND :fim AND g.id = :item GROUP BY g.item, mes, s.valor_unidade", [ 'inicio' => $req->data_inicio, 'fim' => $req->data_fim, 'item' => $req->gasto_id ]);
        return view('gastos_por_mes', [ 'itens' => $itens ]);
    }    
}
