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
                            <h3>Alterar Senha</h3>
                            <hr>
                            <form method="POST" name="f2">
                                 @csrf
                                <input type="hidden" id="email_senha" name='email_senha' value="senha">
                                <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <strong>Senha Atual<span style="color: red;">*</span></strong>
                                            <input type="password" autocomplete="off" name="password_current"  id="password_current" class="form-control @error('password_current') is-invalid @enderror" 
                                            value="{{old('password_current')}}" required>
                                            @error('password_current')
                                                <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-4">
                                            <strong>Senha (min 8 caracteres)<span style="color: red;">*</span></strong>
                                            <input type="password" autocomplete="off" name="password" id="password" class="form-control @error('password') is-invalid @enderror" 
                                            value="{{ old('password') }}" required>
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-4">
                                            <strong>Confirmar Senha<span style="color: red;">*</span></strong>
                                            <input type="password" autocomplete="off" name="password_confirmation" id="password_confirmation"   class="form-control @error('password_confirmation') is-invalid @enderror" 
                                            value="{{ old('password_confirmation') }}" required>
                                            @error('password_confirmation')
                                                <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <button type="button" form="senha"  class="btn btn-info float-right btnSenha">Salvar</button>  

                                    <div class="form-group col-md-12">
                                            <div class="erros callout2 callout-danger hidden" style="color:red;">
                                                <p></p>
                                            </div>
                                    </div> 
                                    
                                </div>
                            </form>
                            <hr>
                            
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
@endsection
