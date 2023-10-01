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
        <div class="col-lg-12">
            <div class="p-3">
                @if(isset($paciente->id))
                <form class="user" action="{{ route('paciente.update', [ 'paciente' => $paciente->id ]) }}" method="post">
                    @csrf
                    @method('PUT')
                @else
                <form class="user" action="{{ route('paciente.store') }}" method="post">
                    @csrf
                @endif
                    <div class="form-group row">                                                                    
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            Nome:
                            <input type="text" class="form-control" name="nome" id="nome"
                                placeholder="Nome" value="{{ $paciente->nome ?? old('nome') }}" required>
                        </div>  
                                                            
                        <div class="col-sm-6">
                            Sobrenome:
                            <input type="text" class="form-control" name="sobrenome" id="sobrenome"
                                placeholder="Sobrenome" value="{{ $paciente->sobrenome ?? old('sobrenome') }}" required>
                        </div>
                        
                    </div>

                    <div class="form-group row">                                                                    
                        <div class="col-sm-3 mb-3 mb-sm-0">
                            Data de nascimento:
                            <input type="date" class="form-control" name="dt_nascimento" id="dt_nascimento"
                            value="{{ $paciente->dt_nascimento ?? old('dt_nascimento') }}" required>
                        </div>  
                                                            
                        <div class="col-sm-3">
                            Teelfone:
                            <input type="text" class="form-control" name="telefone" id="telefone"
                                placeholder="Telefone com DDD" value="{{ $paciente->telefone ?? old('telefone') }}" required>
                        </div>

                        <div class="col-sm-4">
                            E-mail:
                            <input type="email" class="form-control" name="email" id="email"
                                placeholder="E-mail" value="{{ $paciente->email ?? old('email') }}" required>
                                {{ $errors->first('email') ?? '' }}
                        </div>                                    
                        
                        <div class="col-sm-2">
                            CEP:
                            <input type="number" class="form-control" name="cep" id="cep"
                                placeholder="CEP" value="{{ $paciente->cep ?? old('cep') }}" onblur="pesquisacep(this.value);" required>
                        </div>                                   

                    </div>      
                    
                    <h3 class="mt-5">Qualidade</h3>
                    <hr>
                    <div class="form-group row">     
                    
                        <div class="col-sm-3">
                            Rotina:
                            <select class="custom-select" name="rotina">
                                <option value="sim">1</option>
                                <option value="não">2</option>
                                <option value="não">3</option>
                                <option value="não">4</option>
                                <option value="não">5</option>
                            </select>                            
                        </div>   

                        <div class="col-sm-3">
                            Sono:
                            <select class="custom-select" name="rotina">
                                <option value="sim">1</option>
                                <option value="não">2</option>
                                <option value="não">3</option>
                                <option value="não">4</option>
                                <option value="não">5</option>
                            </select>                             
                        </div>

                        <div class="col-sm-3">                                                
                            Alimentação:
                            <select class="custom-select" name="rotina">
                                <option value="sim">1</option>
                                <option value="não">2</option>
                                <option value="não">3</option>
                                <option value="não">4</option>
                                <option value="não">5</option>
                            </select>
                        </div>  
                        
                        <div class="col-sm-3">                                                
                            Atividade física:
                            <select class="custom-select" name="rotina">
                                <option value="sim">1</option>
                                <option value="não">2</option>
                                <option value="não">3</option>
                                <option value="não">4</option>
                                <option value="não">5</option>
                            </select>
                        </div>  
                        
                        <div class="col-sm-3">                                                
                            Intestino:
                            <select class="custom-select" name="rotina">
                                <option value="sim">1</option>
                                <option value="não">2</option>
                                <option value="não">3</option>
                                <option value="não">4</option>
                                <option value="não">5</option>
                            </select>
                        </div>                        
                        
                    </div>  

                    <h3 class="mt-5">Humor</h3>
                    <hr>

                    <div class="form-group row">     
                    
                        <div class="col-sm-3">
                            Ansiedade:
                            <select class="custom-select" name="rotina">
                                <option value="sim">1</option>
                                <option value="não">2</option>
                                <option value="não">3</option>
                                <option value="não">4</option>
                                <option value="não">5</option>
                            </select>                            
                        </div>   

                        <div class="col-sm-3">
                            Tristeza:
                            <select class="custom-select" name="rotina">
                                <option value="sim">1</option>
                                <option value="não">2</option>
                                <option value="não">3</option>
                                <option value="não">4</option>
                                <option value="não">5</option>
                            </select>                             
                        </div>

                        <div class="col-sm-3">                                                
                            Alegria:
                            <select class="custom-select" name="rotina">
                                <option value="sim">1</option>
                                <option value="não">2</option>
                                <option value="não">3</option>
                                <option value="não">4</option>
                                <option value="não">5</option>
                            </select>
                        </div>  
                        
                        <div class="col-sm-3">                                                
                            Motivação:
                            <select class="custom-select" name="rotina">
                                <option value="sim">1</option>
                                <option value="não">2</option>
                                <option value="não">3</option>
                                <option value="não">4</option>
                                <option value="não">5</option>
                            </select>
                        </div>  
                        
                        <div class="col-sm-3">                                                
                            Autoestima:
                            <select class="custom-select" name="rotina">
                                <option value="sim">1</option>
                                <option value="não">2</option>
                                <option value="não">3</option>
                                <option value="não">4</option>
                                <option value="não">5</option>
                            </select>
                        </div>                        
                        
                    </div>     
                    
                    <div class="form-group row">
                        <div class="form-group mb-3 col-sm-12">
                            Agenda:                  
                            <textarea class="form-control" name="anotacoes_relevantes"></textarea>
                        </div>

                        <div class="form-group mb-3 col-sm-12">
                            Ponte:                  
                            <textarea class="form-control" name="anotacoes_relevantes"></textarea>
                        </div>

                        <div class="form-group mb-3 col-sm-12">
                            Atividades da semana:                  
                            <textarea class="form-control" name="anotacoes_relevantes"></textarea>
                        </div>

                        <div class="form-group mb-3 col-sm-12">
                            Em que consegui te ajudar hoje:                  
                            <textarea class="form-control" name="anotacoes_relevantes"></textarea>
                        </div>

                        <div class="form-group mb-3 col-sm-12">
                            Assuntos para a próxima sessão:                  
                            <textarea class="form-control" name="anotacoes_relevantes"></textarea>
                        </div>

                        <div class="form-group mb-3 col-sm-12">
                            Feedback:                  
                            <textarea class="form-control" name="anotacoes_relevantes"></textarea>
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