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
                <h1> Mutação Recorrente</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/home">Home</a></li>
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
                            <hr>
                            <h4> Frequências genotípicas</h4>
                            <div class="row" >
                                
                                <div class="form-group col-md-6 mt-5">
                                    <div class="form-group col-md-12">
                                        <strong>Taxa de Mutação de “A” p/ “a” (&micro;)<span style="color: red;">*</span></strong>
                                        <input type="text" autocomplete="off" name="u1" id="u1" class="form-control @error('u1') is-invalid @enderror" value="{{ old('u1') }}">
                                        @error('u1')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-12">
                                        <strong>Taxa de Mutação de “a” p/ “A” (<strong>v</strong>)<span style="color: red;">*</span></strong>
                                        <input type="text" autocomplete="off" name="v1" id="v1" class="form-control @error('v1') is-invalid @enderror" value="{{ old('v1') }}">
                                        @error('v1')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-12">
                                        <strong>q<sub>0</sub><span style="color: red;">*</span></strong>
                                        <input type="text" autocomplete="off" name="q0" id="q0" class="form-control @error('q0') is-invalid @enderror" value="{{ old('q0') }}">
                                        @error('q0')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-12">
                                        <strong>q<sub>n</sub><span style="color: red;">*</span></strong>
                                        <input type="text" autocomplete="off" name="qn" id="qn" class="form-control @error('qn') is-invalid @enderror" value="{{ old('qn') }}">
                                        @error('qn')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-12">
                                        <strong>q<span style="color: red;">*</span></strong>
                                        <input type="text" autocomplete="off" name="q1" id="q1" class="form-control @error('q1') is-invalid @enderror" value="{{ old('q1') }}">
                                        @error('q1')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <hr>
                                    <button type="submit" class="btn btn-info float-right col-md-3 btnCalcularGeracoes" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i>
                                        &nbsp Aguarde...">Calcular</button>

                                    <div class="form-group col-md-6">
                                        <div class="erros callout3 callout-danger hidden float-left" style="color:red;">
                                            <p></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12 col-12 ">
                                    <h4 style="text-align: center"> Resultados</h4>
                                    <div id="resultado_geracoes" style='margin-left:30px; text-align:center' ></div>
                                </div>
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
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="{{ asset('plugins/inputmask/jquery.inputmask.min.js') }}"></script>
<script src="{{ asset('js/soma.js') }}"></script>
<script src="{{ asset('js/mutacao_recorrente.js') }}"></script>
@endsection