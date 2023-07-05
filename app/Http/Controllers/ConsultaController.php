<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Consulta;
use App\Models\Tratamento;
use App\Models\Pagamento;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Query\JoinClause;

class ConsultaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $req)
    {
        $consultas = Consulta::with(['paciente'])->get();
        $tratamentos = Tratamento::all();
        $pagamentos = Pagamento::all();
        return view('consultas', ['consultas' => $consultas, 'tratamentos' => $tratamentos, 'pagamentos' => $pagamentos]);
    }

    public function ajaxUpdate(Request $req)
    {
        $consulta = Consulta::find($req->consulta_id);
        $consulta->update($req->all());
    
        return response()->json(['consulta' => $consulta, 'paciente' => $consulta->paciente ]);
    }   

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $req)
    {
        $regras = [
            'inicio_consulta' => 'required',
            'fim_consulta' => 'required',
            'tratamento_id' => 'required',
            'pagamento_id' => 'required',
            'pagamento' => 'required',
            'paciente_id' => 'required'
        ];

        $feedback = [
            'required' => 'O campo :attribute deve ser preenchido'
        ];

        $req->validate($regras, $feedback);

        $resultado = Consulta::create($req->all());

        $msg = $resultado == true ? 'Consulta agendada com sucesso.' : 'Ocorreu algum erro, consulta não agendada.';
        $alert = $resultado == true ? 'success' : 'danger';
        //return view('cadastra_paciente', [ 'msg' => $msg, 'alert' => $alert, 'funcao' => 'Cadastrar' ]);  
        return redirect()->route('paciente.show', [$req->paciente_id])->with('msg', $msg)->with('alert', $alert);        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $req)
    {
        $id = $req->id;
        $resultado = Consulta::find($id);       
        $resultado->update($req->all());

        $msg = $resultado == true ? 'Consulta atualizada com sucesso.' : 'Ocorreu algum erro, consulta não atualizada.';
        $alert = $resultado == true ? 'success' : 'danger';
        return redirect()->route('paciente.show', [$req->paciente_id])->with('msg', $msg)->with('alert', $alert);            
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $req, string $id)
    {
        $deletado = Consulta::find($id)->delete();

        $msg = $deletado == true ? 'Consulta cancelada com sucesso.' : 'Ocorreu algum erro, consulta não cancelada.';
        $alert = $deletado == true ? 'success' : 'danger';
        return redirect()->route('paciente.show', [$req->paciente_id])->with('msg', $msg)->with('alert', $alert); 
    }
}
