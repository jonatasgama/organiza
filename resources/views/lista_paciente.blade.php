@extends('basico')

@section('conteudo')

            <!-- Begin Page Content -->
            <div class="container-fluid">
            <h1 class="h3 mb-2 text-gray-800">Pacientes</h1>
            @if(session('msg') && session('alert'))
                <div class="alert alert-{{ session('alert') }} alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    {{ session('msg') }}
                </div>             
            @endif
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Pacientes cadastrados</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Nome</th>
                                            <th>Sobrenome</th>
                                            <th>Telefone</th>
                                            <th>E-mail</th>
                                            <th>Nascimento</th>
                                            <th colspan="2">Opções</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                            <th>Nome</th>
                                            <th>Sobrenome</th>
                                            <th>Telefone</th>
                                            <th>E-mail</th>
                                            <th>Nascimento</th>
                                            <th colspan="3">Opções</th>
                                        </tr>
                                    </tfoot>
                                    @if(isset($pacientes))
                                    <tbody>
                                        @foreach($pacientes as $paciente)
                                        
                                        <tr>                                            
                                            <td>{{ $paciente->nome }}</td>
                                            <td>{{ $paciente->sobrenome }}</td>
                                            <td>{{ $paciente->telefone }}</td>
                                            <td>{{ $paciente->email }}</td>
                                            <td>{{ date("d/m/Y", strtotime($paciente->dt_nascimento)) }}</td>
                                            <td><a href="{{ route('paciente.edit', ['paciente' => $paciente->id]) }}" class="btn btn-warning">Editar</a></td>
                                            <td>
                                                <form id="form_{{ $paciente->id }}" method="post" action="{{ route('paciente.destroy', ['paciente' => $paciente->id]) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <a href="#" class="btn btn-danger" onclick="document.getElementById('form_{{ $paciente->id }}').submit()">Excluir</a>
                                                </form>                                                
                                            </td>
                                            <td><button class="btn btn-info" data-toggle="modal" data-target="#exampleModal" onclick="imprime( {{ $paciente }} )">Visualizar</button></td>
                                        </tr>
                                        
                                        @endforeach
                                    </tbody>
                                    @endif
                                </table>
                            </div>
                        </div>
                    </div>                

            </div>
            <!-- /.container-fluid -->



<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detalhes</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form id="formulario" class="user" method="post">
        @csrf
        @method('PUT')

        <div class="form-group row">                                                                    
            <div class="col-sm-6 mb-3 mb-sm-0">
                <input type="text" class="form-control form-control-user" name="nome" id="nome"
                    placeholder="Nome" value="" required>
            </div>  
                                                
            <div class="col-sm-6">
                <input type="text" class="form-control form-control-user" name="sobrenome" id="sobrenome"
                    placeholder="Sobrenome" value="" required>
            </div>
            
        </div>

        <div class="form-group row">                                                                    
            <div class="col-sm-3 mb-3 mb-sm-0">
                <input type="date" class="form-control form-control-user" name="dt_nascimento" id="dt_nascimento"
                value="" required>
            </div>  
                                            
            <div class="col-sm-3">
                <input type="text" class="form-control form-control-user" name="telefone" id="telefone"
                    placeholder="Telefone com DDD" value="" required>
            </div>

            <div class="col-sm-4">
                <input type="email" class="form-control form-control-user" name="email" id="email"
                    placeholder="E-mail" value="" required>
                    {{ $errors->first('email') ?? '' }}
            </div>                                    
                                        
            <div class="col-sm-2">
                <input type="number" class="form-control form-control-user" name="cep" id="cep"
                    placeholder="CEP" value="" onblur="pesquisacep(this.value);" required>
            </div>                                   

        </div>

        <div class="form-group row">                                                                    
            <div class="col-sm-4">
                    <input type="text" class="form-control form-control-user" name="cidade" id="cidade"
                        placeholder="Cidade" value="" required>
            </div>  
                                                    
            <div class="col-sm-8">
                <input type="text" class="form-control form-control-user" name="endereco" id="endereco"
                    placeholder="Endereço" value="" required>
            </div>                                    
        </div> 
                                
        <div class="form-group row">                                                                    
            <div class="col-sm-4">
                    <input type="text" class="form-control form-control-user" name="bairro" id="bairro"
                        placeholder="Bairro" value="" required>
                </div>  
                                                    
                <div class="col-sm-8">
                    <input type="text" class="form-control form-control-user" name="complemento" id="complemento"
                        placeholder="Complemento" value="">
                </div>                                    
            </div>
        </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
            <button type="submit" class="btn btn-primary">Salvar</button>
        </div>
    </form>
    </div>
  </div>
</div>

<script>
    function imprime(paciente){
        document.getElementById('nome').value = paciente.nome;
        document.getElementById('sobrenome').value = paciente.sobrenome;
        document.getElementById('dt_nascimento').value = paciente.dt_nascimento;
        document.getElementById('telefone').value = paciente.telefone;
        document.getElementById('email').value = paciente.email;
        document.getElementById('cep').value = paciente.cep;
        document.getElementById('cidade').value = paciente.cidade;
        document.getElementById('endereco').value = paciente.endereco;
        document.getElementById('bairro').value = paciente.bairro;
        document.getElementById('complemento').value = paciente.complemento;
        document.getElementById('formulario').setAttribute("action", "/paciente/"+paciente.id );
    }
</script>    

<script src="{{ asset('js/cep.js') }}"></script>
@endsection