@extends('layouts.app')

@section('htmlheader_title', 'Usuário')
@section('contentheader_title', 'Usuário')
@section('links_adicionais') 
  <link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">
  <link rel="stylesheet" href="{{ asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
  @endsection
@section('conteudo')



    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Editar Usuário</h1>
                </div>
               
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                    (<span style="color: red;">*</span>) Campos Obrigatórios
                     
                    </div>
                    @if (Session::has('message'))
                        <div class="alert alert-danger alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <h5><i class="icon fas fa-ban"></i> Atenção!</h5>
                            {{ Session::get('message') }}
                        </div>
                    @endif
                    <div class="card-body">
                        <form method="POST" action="/usuario" id="usuario" name="f1">
                            @csrf
                            <h3>Dados Pessoais</h3>
                            <hr>   
                            <div class="form-row">   
                                
                                <div class="form-group col-md-6">
                                    <strong>Nome Completo<span style="color: red;">*</span></strong>
                                    <input type="text" autocomplete="off" name="nome" class="form-control @error('nome') is-invalid @enderror" 
                                    value="{{ old('nome') }}">
                                    @error('nome')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-3">
                                    <strong>Sexo <span style="color: red;">*</span></strong>
                                    <select  name="sexo" class="form-control select2 @error('sexo') is-invalid @enderror">
                                        <option value="" {{ (old("sexo") == "" ? "selected":"") }}>Selecione</option>
                                        <option value="Masculino" {{ (old("sexo") == "Masculino" ? "selected":"") }}>Masculino</option>
                                        <option value="Feminino" {{ (old("sexo") == "Feminino" ? "selected":"") }}>Feminino</option>
                                    </select>
                                    @error('sexo')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-3">
                                    <strong>Nascimento<span style="color: red;">*</span></strong>
                                    <input type="date" autocomplete="off" name="nascimento" class="form-control @error('nascimento') is-invalid @enderror" 
                                    value="{{ old('nascimento') }}">
                                    @error('nascimento')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-3">
                                    <strong>CPF<span style="color: red;">*</span></strong>
                                    <input type="text" autocomplete="off" name="cpf" id="cpf"  class="form-control @error('cpf') is-invalid @enderror" 
                                    value="{{ old('cpf') }}">
                                    @error('cpf')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-3">
                                    <strong>RG<span style="color: red;">*</span></strong>
                                    <input type="text" autocomplete="off" name="rg" id="rg" class="form-control @error('rg') is-invalid @enderror" 
                                    value="{{ old('rg') }}">
                                    @error('rg')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-2">
                                    <strong>UF RG<span style="color: red;">*</span></strong>
                                    <input type="text" autocomplete="off" id="uf" name="uf" class="form-control @error('uf') is-invalid @enderror" 
                                    value="{{ old('estado') }}" >
                                    @error('uf')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-2">
                                    <strong>Órgão Emissor<span style="color: red;">*</span></strong>
                                    <input type="text" autocomplete="off" name="orgao_emissor" class="form-control @error('orgao_emissor') is-invalid @enderror" 
                                    value="{{ old('orgao_emissor') }}">
                                    @error('rg')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-2">
                                    <strong>Data Expedição RG<span style="color: red;">*</span></strong>
                                    <input type="date" autocomplete="off" name="data_expedicao" class="form-control @error('data_expedicao') is-invalid @enderror" 
                                    value="{{ old('data_expedicao') }}">
                                    @error('data_expedicao')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-3">
                                    <strong>Estado Civil <span style="color: red;">*</span></strong>
                                    <select type="text" autocomplete="off" name="estado_civil" id="estado_civil" class="form-control select2 @error('estado_civil') is-invalid @enderror">
                                            <option value="" {{ (old("estado_civil") == "" ? "selected":"") }}>Selecione</option>
                                            <option {{ (old("estado_civil") == "Casado(a)" ? "selected":"") }}>Casado(a)</option>
                                            <option {{ (old("estado_civil") == "Solteiro(a)" ? "selected":"") }}>Solteiro(a)</option>
                                            <option {{ (old("estado_civil") == "Divorciado(a)" ? "selected":"") }}>Divorciado(a)</option>
                                            <option {{ (old("estado_civil") == "Viúvo(a)" ? "selected":"") }}>Viúvo(a)</option>
                                    </select>
                                    @error('estado_civil')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-3">
                                    <strong>Nacionalidade<span style="color: red;">*</span></strong>
                                    <input type="text" autocomplete="off" name="nacionalidade" id="nacionalidade" class="form-control @error('nacionalidade') is-invalid @enderror" 
                                    value="{{ old('nacionalidade') }}">
                                    @error('nacionalidade')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-3">
                                    <strong>Naturalidade<span style="color: red;">*</span></strong>
                                    <input type="text" autocomplete="off" name="naturalidade" id="naturalidade" class="form-control @error('naturalidade') is-invalid @enderror" 
                                    value="{{ old('naturalidade') }}">
                                    @error('naturalidade')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message
                                             }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-3">
                                    <strong>Telefone fixo<span style="color: red;">*</span></strong>
                                    <input type="text" autocomplete="off" name="fixo" id="fixo" class="form-control @error('fixo') is-invalid @enderror" 
                                    value="{{ old('fixo') }}">
                                    @error('fixo')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-3">
                                    <strong>Telefone Celular</strong>
                                    <input type="text" autocomplete="off" name="celular" id="celular" class="form-control" 
                                    value="{{ old('celular') }}">
                                    @error('celular')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <h3>Endereço</h3>
                            <hr>
                            <div class="form-row">
                                <div class="form-group col-md-2" id="div-cep">
                                    <strong>CEP<span style="color: red;">*</span></strong>
                                    <input type="text" autocomplete="off" name="cep" id="imput-cep" class="form-control @error('cep') is-invalid @enderror" 
                                    value="{{ old('cep') }}">
                                    @error('cep')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <strong>Logradouro<span style="color: red;">*</span></strong>
                                    <input type="text" autocomplete="off" id="logradouro" name="logradouro" class="form-control @error('logradouro') is-invalid @enderror" 
                                    value="{{ old('logradouro') }}" >
                                    @error('logradouro')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-1">
                                    <strong>Nº<span style="color: red;">*</span></strong>
                                    <input type="text" autocomplete="off" id="numero" name="numero" class="form-control @error('numero') is-invalid @enderror" 
                                    value="{{ old('numero') }}">
                                    @error('numero')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-3" id="tamanhoDivEstado">
                                    <strong>Estado<span style="color: red;">*</span></strong>
                                    <input type="text" autocomplete="off" id="estado" name="estado" class="form-control @error('estado') is-invalid @enderror" 
                                    value="{{ old('estado') }}" >
                                    @error('estado')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div  class="form-group col-md-3" id="tamanhoDivCidade">
                                    <strong>Cidade<span style="color: red;">*</span></strong>
                                    <input type="text" autocomplete="off" id="cidade" name="cidade" class="form-control @error('cidade') is-invalid @enderror" 
                                    value="{{ old('estado') }}" >
                                    @error('cidade')
                                    <span class="invalid-feedback" role="alert" style='display:block'>
                                    <strong> O campo Cidade é obrigatório. </strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-5">
                                    <strong>Bairro<span style="color: red;">*</span></strong>
                                    <input type="text" autocomplete="off" id="bairro" name="bairro" class="form-control @error('bairro') is-invalid @enderror" 
                                    value="{{ old('bairro') }}"      >
                                    @error('bairro')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-4">
                                    <strong>Complemento</strong>
                                    <input type="text" autocomplete="off" name="complemento" id="complemento" class="form-control @error('complemento') is-invalid @enderror" 
                                    value="{{ old('complemento') }}">
                                    @error('complemento')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <!--  <h3>Dados de Acesso</h3>
                            <hr>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <strong>E-mail<span style="color: red;">*</span></strong>
                                    <input type="email" autocomplete="off" name="email" class="form-control @error('email') is-invalid @enderror" 
                                    value="{{ old('email') }}">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-3">
                                    <strong>Senha (min 8 caracteres)<span style="color: red;">*</span></strong>
                                    <input type="password" autocomplete="off" name="password" class="form-control @error('password') is-invalid @enderror" 
                                    value="{{ old('password') }}">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-3">
                                    <strong>Confirmar Senha<span style="color: red;">*</span></strong>
                                    <input type="password" autocomplete="off" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" 
                                    value="{{ old('password_confirmation') }}" required>
                                    @error('password_confirmation')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div> -->
                            <hr> 
                            <button type="submit" form="usuario" class="btn btn-info float-right" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i>
                            &nbsp Aguarde...">Salvar</button>

                            <!-- /.card-body -->
                        </form>
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
<script src="{{ asset('js/base.js') }}"></script>
<script src="{{ asset('js/busca_cep.js') }}"></script>
<script src="{{ asset('js/usuario.js') }}"></script> -->
@endsection
