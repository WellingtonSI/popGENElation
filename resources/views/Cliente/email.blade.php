@extends('layouts.app')

@section('htmlheader_title', 'Usuário')
@section('contentheader_title', 'Usuário')
@section('links_adicionais') 
  <link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">
  <link rel="stylesheet" href="{{ asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
  @endsection
@section('conteudo')



    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                    (<span style="color: red;">*</span>) Campos Obrigatórios
                        <!-- <div class="float-right">
                            <a href="{{ URL::to('usuario') }}" class="btn btn-block btn-outline-info "><i class="fa fa-list-alt"></i> Listar</a>
                        </div> -->
                    </div>
                    @if (Session::has('message'))
                        <div class="alert alert-danger alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <h5><i class="icon fas fa-ban"></i> Atenção!</h5>
                            {{ Session::get('message') }}
                        </div>
                    @endif
                    <div class="card-body">  
                            <h3>Alterar E-mail</h3>
                            <hr>
                            <form method="POST"  name="f1">
                                <input type="hidden" id="email_senha" name='email_senha' value="email">
                                <div class="form-row">
                                    
                                        <div class="form-group col-md-4">
                                            <strong>E-mail atual<span style="color: red;">*</span></strong>
                                            <input type="email" autocomplete="off"  id="email_atual" name="email_atual" class="form-control @error('email_atual') is-invalid @enderror" 
                                            value="{{ old('email_atual') }}" required>
                                            @error('email_atual')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-4">
                                            <strong>Novo E-mail <span style="color: red;">*</span></strong>
                                            <input type="email" autocomplete="off" name="email" id="email" class="form-control @error('email') is-invalid @enderror" 
                                            value="{{ old('email') }}" required>
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-4">
                                            <strong>Confirmar E-mail<span style="color: red;">*</span></strong>
                                            <input type="email" autocomplete="off" id="email_confirmation" name="email_confirmation" class="form-control @error('email_confirmation') is-invalid @enderror" 
                                            value="{{ old('email_confirmation') }}" required>
                                            @error('email_confirmation')
                                                <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        
                                        <button type="button" form="email" class="btn btn-info float-right btnEmail">Salvar</button>

                                        <div class="form-group col-md-12">
                                            <div class="erros callout2 callout-danger hidden" style="color:red;">
                                                <p></p>
                                            </div>
                                        </div>

                                       
                                    
                                </div>
                            </form>
                            <!-- /.card-body -->
                            
                    </div>
                    <!-- /.card -->
                </div>
                    <!-- /.card -->
            </div>
        </div>
    </section>


@endsection
@section('scripts_adicionais') 
<!-- <script src="{{ asset('plugins/inputmask/jquery.maskedinput.js') }}"></script>
<script src="{{ asset('plugins/select2/js/select2.min.js') }}"></script>
<link rel="stylesheet" href="{{ asset('plugins/iziToast/css/iziToast.min.css') }}">
<script src="{{ asset('plugins/iziToast/js/iziToast.min.js') }}"></script>
<script src="{{ asset('js/base.js') }}"></script>
<script src="{{ asset('js/perfil.js') }}"></script> -->
<!-- <script src="{{ asset('js/busca_cep.js') }}"></script> -->
<!-- <script src="{{ asset('js/usuario.js') }}"></script> -->
@endsection
