@extends('layouts.app')
@section('htmlheader_title', 'Mutação Recorrente')
@section('contentheader_title', 'Mutação Recorrente')
@section('links_adicionais')

@endsection
@section('conteudo')
<!-- Content Wrapper. Contains page content -->

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Taxa de Mudança da Frequência</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/home">Home</a></li>
                    <li class="breadcrumb-item active">Mutação Recorrente</li>
                </ol>
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
                    <div class="float-right">
                            <a href="{{ URL::to('/mutacao/recorrente') }}" class="btn btn-block btn-outline-primary"><i class="fas fa-undo"></i> Voltar</a>
                    </div>
                </div>
                @if (Session::has('message'))
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h5><i class="icon fas fa-ban"></i> Atenção!</h5>
                    {{ Session::get('message') }}
                </div>
                @endif
                <div class="card-body">
                        <div class="container" style="display: block;" >
                            <h4> Frequências genotípicas</h4>

                            <div class="row">
                                <div class="form-group col-md-6 mt-5">
                                    <div class="form-group col-md-12">
                                        <strong>Taxa de Mutação de “A” p/ “a” (&micro;)<span style="color: red;">*</span></strong>
                                        <input type="text" autocomplete="off" name="u" id="u" class="form-control @error('u') is-invalid @enderror" value="{{ old('u') }}">
                                        @error('u')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-12">
                                        <strong>Taxa de Mutação de “a” p/ “A” (<strong>v</strong>)<span style="color: red;">*</span></strong>
                                        <input type="text" autocomplete="off" name="v" id="v" class="form-control @error('v') is-invalid @enderror" value="{{ old('v') }}">
                                        @error('v')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-12">
                                        <strong>p<span style="color: red;">*</span></strong>
                                        <input type="text" autocomplete="off" name="p" id="p" class="form-control @error('p') is-invalid @enderror" value="{{ old('p') }}">
                                        @error('p')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-12">
                                        <strong>q<span style="color: red;">*</span></strong>
                                        <input type="text" autocomplete="off" name="q" id="q" class="form-control @error('q') is-invalid @enderror" value="{{ old('q') }}">
                                        @error('q')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <hr>
                                    <button type="submit" class="btn btn-info float-right col-md-3 btnCalcular" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i>
                                        &nbsp Aguarde...">Calcular</button>

                                    <div class="form-group col-md-6">
                                        <div class="erros callout3 callout-danger hidden float-left" style="color:red;">
                                            <p></p>
                                        </div>
                                    </div>
                                </div>
                        
                                <div class="form-group col-md-6" ">
                                    <h4 style="text-align: center"> Resultados</h4>
                                    <div id="resultado" style='margin-left:30px; font-size: 25px;text-align:center' ></div>
                                </div>
                                <hr>
                            </div> 
                        </div>
                </div>   
                <!-- /.card-body -->   
            </div>
            <!-- /.card --> 
        </div>
       
    </div>
</section 
@endsection 
@section('scripts_adicionais') 
<script src="{{ asset('plugins/sweetalert2/sweetalert2.min.js') }}"></script>
<script src="{{ asset('plugins/inputmask/jquery.inputmask.min.js') }}"></script>
<script src="{{ asset('js/soma.js') }}"></script>
<script src="{{ asset('js/mutacao_recorrente_taxa.js') }}"></script>
@endsection