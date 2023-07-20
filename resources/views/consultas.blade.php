@extends('basico')

@section('conteudo')

                <!-- Begin Page Content -->
                <div class="container-fluid">
                @if(session('msg') && session('alert'))
                <div class="alert alert-{{ session('alert') }} alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    {{ session('msg') }}
                </div>             
                @endif
                    <div id='calendar'></div>

                </div>
                <!-- /.container-fluid -->
                
                @include('componentes.modal_editar_criar') 

                <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <input type="hidden" name="event_id" id="event_id" value="" />
                            <input type="hidden" name="id" id="id" value="" />  
                            <input type="hidden" name="consulta_id" id="consulta_id" value="" />                            
                            <div class="modal-body">
                                <h4>Editar Consulta</h4>

                                Início da consulta:
                                <br />
                                <input type="datetime-local" class="form-control" name="inicio_consulta" id="inicio_consulta">

                                Fim da consulta:
                                <br />
                                <input type="datetime-local" class="form-control" name="fim_consulta" id="fim_consulta">
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                                <input type="button" class="btn btn-primary" id="consulta_update" value="Atualizar">
                            </div>
                        </div>
                    </div>
                </div>                                 

@endsection