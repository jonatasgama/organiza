@extends('basico')

@section('conteudo')

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">{{ $funcao }} Paciente</h1>
                    </div>
                    <hr>
                    @if(isset($msg) && isset($alert))
                        <div class="alert alert-{{ $alert }} alert-dismissible">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            {{ $msg }}
                        </div>             
                    @endif
                    <div class="col-lg-12">
                        <div class="p-5">
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
                                        <input type="text" class="form-control form-control-user" name="nome" id="nome"
                                            placeholder="Nome" value="{{ $paciente->nome ?? old('nome') }}" required>
                                    </div>  
                                                                      
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control form-control-user" name="sobrenome" id="sobrenome"
                                            placeholder="Sobrenome" value="{{ $paciente->sobrenome ?? old('sobrenome') }}" required>
                                    </div>
                                    
                                </div>

                                <div class="form-group row">                                                                    
                                    <div class="col-sm-3 mb-3 mb-sm-0">
                                        <input type="date" class="form-control form-control-user" name="dt_nascimento" id="dt_nascimento"
                                        value="{{ $paciente->dt_nascimento ?? old('dt_nascimento') }}" required>
                                    </div>  
                                                                      
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control form-control-user" name="telefone" id="telefone"
                                            placeholder="Telefone com DDD" value="{{ $paciente->telefone ?? old('telefone') }}" required>
                                    </div>

                                    <div class="col-sm-4">
                                        <input type="email" class="form-control form-control-user" name="email" id="email"
                                            placeholder="E-mail" value="{{ $paciente->email ?? old('email') }}" required>
                                            {{ $errors->first('email') ?? '' }}
                                    </div>                                    
                                    
                                    <div class="col-sm-2">
                                        <input type="number" class="form-control form-control-user" name="cep" id="cep"
                                            placeholder="CEP" value="{{ $paciente->cep ?? old('cep') }}" onblur="pesquisacep(this.value);" required>
                                    </div>                                   

                                </div>

                                <div class="form-group row">                                                                    
                                <div class="col-sm-4">
                                        <input type="text" class="form-control form-control-user" name="cidade" id="cidade"
                                            placeholder="Cidade" value="{{ $paciente->cidade ?? old('cidade') }}" required>
                                    </div>  
                                                                      
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control form-control-user" name="endereco" id="endereco"
                                            placeholder="Endereço" value="{{ $paciente->endereco ?? old('endereco') }}" required>
                                    </div>                                    
                                </div>     
                                
                                <div class="form-group row">                                                                    
                                <div class="col-sm-4">
                                        <input type="text" class="form-control form-control-user" name="bairro" id="bairro"
                                            placeholder="Bairro" value="{{ $paciente->bairro ?? old('bairro') }}" required>
                                    </div>  
                                                                      
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control form-control-user" name="complemento" id="complemento"
                                            placeholder="Complemento" value="{{ $paciente->complemento ?? old('complemento') }}">
                                    </div>                                    
                                </div>                                  

                                <button class="btn btn-primary" type="submit">
                                    {{ $funcao }}
                                </button>                             
                            </form>
                        </div>
                    </div>                    

                </div>
                <!-- /.container-fluid -->

            
<script src="{{ asset('js/cep.js') }}"></script>

@endsection