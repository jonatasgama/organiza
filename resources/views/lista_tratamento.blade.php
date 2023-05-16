@extends('basico')

@section('conteudo')

            <!-- Begin Page Content -->
            <div class="container-fluid">
            <h1 class="h3 mb-2 text-gray-800">Tratamentos</h1>
            @if(session('msg') && session('alert'))
                <div class="alert alert-{{ session('alert') }} alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    {{ session('msg') }}
                </div>             
            @endif
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Tratamentos cadastrados</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Tratamento</th>
                                            <th>Valor</th>
                                            <th>Data de cadastro</th>
                                            <th>Data de atualização</th>
                                            <th colspan="2">Opções</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                            <th>Tratamento</th>
                                            <th>Valor</th>
                                            <th>Data de cadastro</th>
                                            <th>Data de atualização</th>
                                            <th colspan="2">Opções</th>
                                        </tr>
                                    </tfoot>
                                    @if(isset($tratamentos))
                                    <tbody>
                                        @foreach($tratamentos as $tratamento)
                                        <tr>
                                            <td>{{ $tratamento->tratamento }}</td>
                                            <td>R$ {{ number_format($tratamento->valor, 2, ",", ".") }}</td>
                                            <td>{{ date("d/m/Y", strtotime($tratamento->created_at)) }}</td>
                                            <td>{{ date("d/m/Y", strtotime($tratamento->updated_at)) }}</td>
                                            <td><a href="{{ route('tratamento.edit', ['tratamento' => $tratamento->id]) }}" class="btn btn-warning" >Editar</a></td>
                                            <td>
                                                <form id="form_{{ $tratamento->id }}" method="post" action="{{ route('tratamento.destroy', ['tratamento' => $tratamento->id]) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <a href="#" class="btn btn-danger" onclick="document.getElementById('form_{{ $tratamento->id }}').submit()">Excluir</a>
                                                </form>                                                
                                            </td>
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

            

@endsection