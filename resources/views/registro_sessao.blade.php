@extends('basico')

@section('conteudo')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between">
            <h1 class="h3 mb-0 text-gray-800">Registro de sessão</h1>
        </div>
        <hr>
        @if(session('msg') && session('alert'))
            <div class="alert alert-{{ session('alert') }} alert-dismissible">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                {{ session('msg') }}
            </div>             
        @endif

        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ route('paciente.index') }}">Pacientes</a></li>
              <li class="breadcrumb-item"><a href="{{ route('paciente.show', ['paciente' => $paciente->id]) }}">{{ $paciente->nome." ".$paciente->sobrenome }}</a></li>
              <li class="breadcrumb-item active" aria-current="page">Registro da sessão do dia {{ date("d/m/Y", strtotime($consulta->inicio_consulta)) }}</li>
            </ol>
        </nav>

        <div class="col-lg-12">
            <div class="p-3">
                <form class="user" action="{{ route('registrosessao.store') }}" method="post">
                    @csrf
                    <div class="form-group row">                                                                    
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            Nome:
                            <input type="text" class="form-control" name="nome" id="nome"
                                placeholder="Nome" value="{{ $paciente->nome ?? old('nome') }}" readonly>
                        </div>  
                                                            
                        <div class="col-sm-6">
                            Sobrenome:
                            <input type="text" class="form-control" name="sobrenome" id="sobrenome"
                                placeholder="Sobrenome" value="{{ $paciente->sobrenome ?? old('sobrenome') }}" readonly>
                        </div>
                        
                    </div>

                    <div class="form-group row">                                                                    
                        <div class="col-sm-3 mb-3 mb-sm-0">
                            Data de nascimento:
                            <input type="date" class="form-control" name="dt_nascimento" id="dt_nascimento"
                            value="{{ $paciente->dt_nascimento ?? old('dt_nascimento') }}" readonly>
                        </div>  
                                                            
                        <div class="col-sm-3">
                            Teelfone:
                            <input type="text" class="form-control" name="telefone" id="telefone"
                                placeholder="Telefone com DDD" value="{{ $paciente->telefone ?? old('telefone') }}" readonly>
                        </div>

                        <div class="col-sm-4">
                            E-mail:
                            <input type="email" class="form-control" name="email" id="email"
                                placeholder="E-mail" value="{{ $paciente->email ?? old('email') }}" readonly>
                                {{ $errors->first('email') ?? '' }}
                        </div>                                    
                        
                        <div class="col-sm-2">
                            CEP:
                            <input type="number" class="form-control" name="cep" id="cep"
                                placeholder="CEP" value="{{ $paciente->cep ?? old('cep') }}" readonly>
                        </div>                                   

                    </div>      
                    <input type="hidden" name="consulta_id" value="{{ $consulta->id }}">
                    <input type="hidden" name="paciente_id" value="{{ $paciente->id }}">
                    <h3 class="mt-5">Qualidade</h3>
                    <hr>
                    <div class="form-group row">     
                    
                        <div class="col-sm-3">
                            Rotina:
                            <select class="custom-select" name="rotina">
                                <option value="1" {{ ((isset($registrosessao->rotina) and $registrosessao->rotina == 1) ? 'selected' : '') ?? old('rotina') }}>1</option>
                                <option value="2" {{ ((isset($registrosessao->rotina) and $registrosessao->rotina == 2) ? 'selected' : '') ?? old('rotina') }}>2</option>
                                <option value="3" {{ ((isset($registrosessao->rotina) and $registrosessao->rotina == 3) ? 'selected' : '') ?? old('rotina') }}>3</option>
                                <option value="4" {{ ((isset($registrosessao->rotina) and $registrosessao->rotina == 4) ? 'selected' : '') ?? old('rotina') }}>4</option>
                                <option value="5" {{ ((isset($registrosessao->rotina) and $registrosessao->rotina == 5) ? 'selected' : '') ?? old('rotina') }}>5</option>
                            </select>                            
                        </div>   

                        <div class="col-sm-3">
                            Sono:
                            <select class="custom-select" name="sono">
                                <option value="1" {{ ((isset($registrosessao->sono) and $registrosessao->sono == 1) ? 'selected' : '') ?? old('sono') }}>1</option>
                                <option value="2" {{ ((isset($registrosessao->sono) and $registrosessao->sono == 2) ? 'selected' : '') ?? old('sono') }}>2</option>
                                <option value="3" {{ ((isset($registrosessao->sono) and $registrosessao->sono == 3) ? 'selected' : '') ?? old('sono') }}>3</option>
                                <option value="4" {{ ((isset($registrosessao->sono) and $registrosessao->sono == 4) ? 'selected' : '') ?? old('sono') }}>4</option>
                                <option value="5" {{ ((isset($registrosessao->sono) and $registrosessao->sono == 5) ? 'selected' : '') ?? old('sono') }}>5</option>
                            </select>                             
                        </div>

                        <div class="col-sm-3">                                                
                            Alimentação:
                            <select class="custom-select" name="alimentacao">
                                <option value="1" {{ ((isset($registrosessao->alimentacao) and $registrosessao->alimentacao == 1) ? 'selected' : '') ?? old('alimentacao') }}>1</option>
                                <option value="2" {{ ((isset($registrosessao->alimentacao) and $registrosessao->alimentacao == 2) ? 'selected' : '') ?? old('alimentacao') }}>2</option>
                                <option value="3" {{ ((isset($registrosessao->alimentacao) and $registrosessao->alimentacao == 3) ? 'selected' : '') ?? old('alimentacao') }}>3</option>
                                <option value="4" {{ ((isset($registrosessao->alimentacao) and $registrosessao->alimentacao == 4) ? 'selected' : '') ?? old('alimentacao') }}>4</option>
                                <option value="5" {{ ((isset($registrosessao->alimentacao) and $registrosessao->alimentacao == 5) ? 'selected' : '') ?? old('alimentacao') }}>5</option>
                            </select>
                        </div>  
                        
                        <div class="col-sm-3">                                                
                            Atividade física:
                            <select class="custom-select" name="atividade_fisica">
                                <option value="1" {{ ((isset($registrosessao->atividade_fisica) and $registrosessao->atividade_fisica == 1) ? 'selected' : '') ?? old('atividade_fisica') }}>1</option>
                                <option value="2" {{ ((isset($registrosessao->atividade_fisica) and $registrosessao->atividade_fisica == 2) ? 'selected' : '') ?? old('atividade_fisica') }}>2</option>
                                <option value="3" {{ ((isset($registrosessao->atividade_fisica) and $registrosessao->atividade_fisica == 3) ? 'selected' : '') ?? old('atividade_fisica') }}>3</option>
                                <option value="4" {{ ((isset($registrosessao->atividade_fisica) and $registrosessao->atividade_fisica == 4) ? 'selected' : '') ?? old('atividade_fisica') }}>4</option>
                                <option value="5" {{ ((isset($registrosessao->atividade_fisica) and $registrosessao->atividade_fisica == 5) ? 'selected' : '') ?? old('atividade_fisica') }}>5</option>
                            </select>
                        </div>  
                        
                        <div class="col-sm-3">                                                
                            Intestino:
                            <select class="custom-select" name="intestino">
                                <option value="1" {{ ((isset($registrosessao->intestino) and $registrosessao->intestino == 1) ? 'selected' : '') ?? old('intestino') }}>1</option>
                                <option value="2" {{ ((isset($registrosessao->intestino) and $registrosessao->intestino == 2) ? 'selected' : '') ?? old('intestino') }}>2</option>
                                <option value="3" {{ ((isset($registrosessao->intestino) and $registrosessao->intestino == 3) ? 'selected' : '') ?? old('intestino') }}>3</option>
                                <option value="4" {{ ((isset($registrosessao->intestino) and $registrosessao->intestino == 4) ? 'selected' : '') ?? old('intestino') }}>4</option>
                                <option value="5" {{ ((isset($registrosessao->intestino) and $registrosessao->intestino == 5) ? 'selected' : '') ?? old('intestino') }}>5</option>
                            </select>
                        </div>                        
                        
                    </div>  

                    <h3 class="mt-5">Humor</h3>
                    <hr>

                    <div class="form-group row">     
                    
                        <div class="col-sm-3">
                            Ansiedade:
                            <select class="custom-select" name="ansiedade">
                                <option value="1" {{ ((isset($registrosessao->ansiedade) and $registrosessao->ansiedade == 1) ? 'selected' : '') ?? old('ansiedade') }}>1</option>
                                <option value="2" {{ ((isset($registrosessao->ansiedade) and $registrosessao->ansiedade == 2) ? 'selected' : '') ?? old('ansiedade') }}>2</option>
                                <option value="3" {{ ((isset($registrosessao->ansiedade) and $registrosessao->ansiedade == 3) ? 'selected' : '') ?? old('ansiedade') }}>3</option>
                                <option value="4" {{ ((isset($registrosessao->ansiedade) and $registrosessao->ansiedade == 4) ? 'selected' : '') ?? old('ansiedade') }}>4</option>
                                <option value="5" {{ ((isset($registrosessao->ansiedade) and $registrosessao->ansiedade == 5) ? 'selected' : '') ?? old('ansiedade') }}>5</option>
                            </select>                            
                        </div>   

                        <div class="col-sm-3">
                            Tristeza:
                            <select class="custom-select" name="tristeza">
                                <option value="1" {{ ((isset($registrosessao->tristeza) and $registrosessao->tristeza == 1) ? 'selected' : '') ?? old('tristeza') }}>1</option>
                                <option value="2" {{ ((isset($registrosessao->tristeza) and $registrosessao->tristeza == 2) ? 'selected' : '') ?? old('tristeza') }}>2</option>
                                <option value="3" {{ ((isset($registrosessao->tristeza) and $registrosessao->tristeza == 3) ? 'selected' : '') ?? old('tristeza') }}>3</option>
                                <option value="4" {{ ((isset($registrosessao->tristeza) and $registrosessao->tristeza == 4) ? 'selected' : '') ?? old('tristeza') }}>4</option>
                                <option value="5" {{ ((isset($registrosessao->tristeza) and $registrosessao->tristeza == 5) ? 'selected' : '') ?? old('tristeza') }}>5</option>
                            </select>                             
                        </div>

                        <div class="col-sm-3">                                                
                            Alegria:
                            <select class="custom-select" name="alegria">
                                <option value="1" {{ ((isset($registrosessao->alegria) and $registrosessao->alegria == 1) ? 'selected' : '') ?? old('alegria') }}>1</option>
                                <option value="2" {{ ((isset($registrosessao->alegria) and $registrosessao->alegria == 2) ? 'selected' : '') ?? old('alegria') }}>2</option>
                                <option value="3" {{ ((isset($registrosessao->alegria) and $registrosessao->alegria == 3) ? 'selected' : '') ?? old('alegria') }}>3</option>
                                <option value="4" {{ ((isset($registrosessao->alegria) and $registrosessao->alegria == 4) ? 'selected' : '') ?? old('alegria') }}>4</option>
                                <option value="5" {{ ((isset($registrosessao->alegria) and $registrosessao->alegria == 5) ? 'selected' : '') ?? old('alegria') }}>5</option>
                            </select>
                        </div>  
                        
                        <div class="col-sm-3">                                                
                            Motivação:
                            <select class="custom-select" name="motivacao">
                                <option value="1" {{ ((isset($registrosessao->motivacao) and $registrosessao->motivacao == 1) ? 'selected' : '') ?? old('motivacao') }}>1</option>
                                <option value="2" {{ ((isset($registrosessao->motivacao) and $registrosessao->motivacao == 2) ? 'selected' : '') ?? old('motivacao') }}>2</option>
                                <option value="3" {{ ((isset($registrosessao->motivacao) and $registrosessao->motivacao == 3) ? 'selected' : '') ?? old('motivacao') }}>3</option>
                                <option value="4" {{ ((isset($registrosessao->motivacao) and $registrosessao->motivacao == 4) ? 'selected' : '') ?? old('motivacao') }}>4</option>
                                <option value="5" {{ ((isset($registrosessao->motivacao) and $registrosessao->motivacao == 5) ? 'selected' : '') ?? old('motivacao') }}>5</option>
                            </select>
                        </div>  
                        
                        <div class="col-sm-3">                                                
                            Autoestima:
                            <select class="custom-select" name="autoestima">
                                <option value="1" {{ ((isset($registrosessao->autoestima) and $registrosessao->autoestima == 1) ? 'selected' : '') ?? old('autoestima') }}>1</option>
                                <option value="2" {{ ((isset($registrosessao->autoestima) and $registrosessao->autoestima == 2) ? 'selected' : '') ?? old('autoestima') }}>2</option>
                                <option value="3" {{ ((isset($registrosessao->autoestima) and $registrosessao->autoestima == 3) ? 'selected' : '') ?? old('autoestima') }}>3</option>
                                <option value="4" {{ ((isset($registrosessao->autoestima) and $registrosessao->autoestima == 4) ? 'selected' : '') ?? old('autoestima') }}>4</option>
                                <option value="5" {{ ((isset($registrosessao->autoestima) and $registrosessao->autoestima == 5) ? 'selected' : '') ?? old('autoestima') }}>5</option>
                            </select>
                        </div>                        
                        
                    </div>     
                    
                    <div class="form-group row">
                        <div class="form-group mb-3 col-sm-12">
                            Agenda:                  
                            <textarea class="form-control" name="agenda" rows="4">{{ isset($registrosessao->agenda) ? $registrosessao->agenda : '' }}</textarea>
                        </div>

                        <div class="form-group mb-3 col-sm-12">
                            Ponte:                  
                            <textarea class="form-control" name="ponte" rows="4">{{ isset($registrosessao->ponte) ? $registrosessao->ponte : '' }}</textarea>
                        </div>

                        <div class="form-group mb-3 col-sm-12">
                            Atividades da semana:                  
                            <textarea class="form-control" name="atividades_semana" rows="4">{{ isset($registrosessao->atividades_semana) ? $registrosessao->atividades_semana : '' }}</textarea>
                        </div>

                        <div class="form-group mb-3 col-sm-12">
                            Em que consegui te ajudar hoje:                  
                            <textarea class="form-control" name="ajuda" rows="4">{{ isset($registrosessao->ajuda) ? $registrosessao->ajuda : '' }}</textarea>
                        </div>

                        <div class="form-group mb-3 col-sm-12">
                            Assuntos para a próxima sessão:                  
                            <textarea class="form-control" name="proxima_sessao" rows="4">{{ isset($registrosessao->proxima_sessao) ? $registrosessao->proxima_sessao : '' }}</textarea>
                        </div>

                        <div class="form-group mb-3 col-sm-12">
                            Feedback:                  
                            <textarea class="form-control" name="feedback" rows="4">{{ isset($registrosessao->feedback) ? $registrosessao->feedback : '' }}</textarea>
                        </div>
                    </div>

                    <h3 class="mt-5">Psicoeducação</h3>
                    <hr>

                    <div class="form-group row">
                        <div class="form-group mb-3 col-sm-12">
                            Aprendizagem:                  
                            <textarea class="form-control" name="aprendizagem" rows="4">{{ isset($registrosessao->aprendizagem) ? $registrosessao->aprendizagem : '' }}</textarea>
                        </div>

                        <div class="form-group mb-3 col-sm-12">
                            Observação:                  
                            <textarea class="form-control" name="observacao" rows="4">{{ isset($registrosessao->observacao) ? $registrosessao->observacao : '' }}</textarea>
                        </div>

                    </div>

                    <h3 class="mt-5">Resolução de problemas</h3>
                    <hr>

                    <div class="form-group row">
                        <div class="form-group mb-3 col-sm-12">
                            Problemas:                  
                            <textarea class="form-control" name="problemas" rows="4">{{ isset($registrosessao->problemas) ? $registrosessao->problemas : '' }}</textarea>
                        </div>

                        <div class="form-group mb-3 col-sm-12">
                            Resoluções:                  
                            <textarea class="form-control" name="resolucoes" rows="4">{{ isset($registrosessao->resolucoes) ? $registrosessao->resolucoes : '' }}</textarea>
                        </div>

                    </div>

                    <button class="btn btn-primary mb-4" type="submit">
                        Salvar
                    </button>
                </form>
            </div>
        </div>
    </div>
                                
@endsection