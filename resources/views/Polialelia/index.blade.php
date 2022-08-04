@extends('layouts.app')
@section('htmlheader_title', 'Polialelia')
@section('contentheader_title', 'Polialelia')
@section('links_adicionais')

@endsection
@section('conteudo')
<!-- Content Wrapper. Contains page content -->

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1> Polialelia</h1>
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
                    <button type="button" class="btn btn-primary float-right col-md-2 btnaddResultdos" style="display: none;">Ver todos resultados</button>

                    <button type="button" class="btn btn btn-info  float-right col-md-1 btnaddVoltar" style="display: none;">Voltar</button>
                    </br>       
                    <span>Para 3 alelos digite as frequências de cada genotípos</span>
                    </br>  
                    <span>Para para mais de 3 alelos, defina a quantidade de alelos e será mostrado o número de genótipos homozigotos e heterozigotos esperado</span>

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
                                        <strong>A1A1<span style="color: red;">*</span></strong>
                                        <input type="number" autocomplete="off" name="A1A1" id="A1A1" class="form-control @error('AA') is-invalid @enderror" value="{{ old('A1A1') }}">
                                        @error('A1A1')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-12">
                                        <strong>A1A2<span style="color: red;">*</span></strong>
                                        <input type="number" autocomplete="off" name="A1A2" id="A1A2" class="form-control @error('A1A2') is-invalid @enderror" value="{{ old('A1A2') }}">
                                        @error('A1A2')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-12">
                                        <strong>A1A3<span style="color: red;">*</span></strong>
                                        <input type="number" autocomplete="off" name="A1A3" id="A1A3" class="form-control @error('A1A3') is-invalid @enderror" value="{{ old('A1A3') }}">
                                        @error('A1A3')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-12">
                                        <strong>A2A2<span style="color: red;">*</span></strong>
                                        <input type="number" autocomplete="off" name="A2A2" id="A2A2" class="form-control @error('A2A2') is-invalid @enderror" value="{{ old('A2A2') }}">
                                        @error('A2A2')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-12">
                                        <strong>A2A3<span style="color: red;">*</span></strong>
                                        <input type="number" autocomplete="off" name="A2A3" id="A2A3" class="form-control @error('A2A3') is-invalid @enderror" value="{{ old('A2A3') }}">
                                        @error('A2A3')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-12">
                                        <strong>A3A3<span style="color: red;">*</span></strong>
                                        <input type="number" autocomplete="off" name="A3A3" id="A3A3" class="form-control @error('A3A3') is-invalid @enderror" value="{{ old('A3A3') }}">
                                        @error('A3A3')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <hr>
                                    <button type="submit" class="btn btn-info float-right col-md-3 btnaddCalcular" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i>
                                        &nbsp Aguarde...">Calcular</button>

                                    <div class="form-group col-md-6">
                                        <div class="erros callout3 callout-danger hidden float-left" style="color:red;">
                                            <p></p>
                                        </div>
                                    </div>
                                </div>
                        
                                <div class="form-group col-md-6" ">
                                    <h4 style="text-align: center"> Resultados</h4>
                                    <div id="resultado" style='margin-left:30px; font-size: 20px;' ></div>
                                </div>
                                <hr>
                            </div>
                            <hr>
                            <div class="row" >
                                <div class=" col-md-4 mt-5">
                                    <strong>Para casos com polialia acima de 3 alelos</strong>
                                    <select type="text" title="Quantidade de alelos" autocomplete="off" name="alelos" id="alelos" class="form-control select2 @error('alelos') is-invalid @enderror">
                                    <option value=""   {{ (old("alelos") ==  "Selecione" ? "selected":"") }}>[Selecione]</option>
                                    @for ($alelos = 4; $alelos<=20;$alelos++)
                                            <option value={{$alelos}}  {{ (old("alelos") ==  $alelos ? "selected":"") }}>{{$alelos}} alelos</option>
                                    @endfor    
                                    </select>
                                    @error('alelos')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-1 mt-5">
                                    </br>  
                                    <button class="form-control btn-primary btnDefinir" >
                                        Definir
                                    </button> 
                                </div>
                                <!-- <div class="form-group col-md- mt-5">
                                    </br>  
                                    <button type="button" class="btn form-control btn-warning btnTresAlelos" style="display: none;" >
                                       Voltar para 3 Alelos
                                    </button> 
                                </div> -->
                              
                                <div class="col-md-6 col-sm-12 col-12 ">
                                    <h4 style="text-align: center"> Resultados</h4>
                                    <div id="resultado_maisalelos" style='margin-left:30px' ></div>
                                </div>
                            </div>  
                        </div>
                        <div class="form-group col-md-6 col-sm-12 col-12" id="todos_resultados" style='font-size: 20px;'>
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
<script src="{{ asset('js/polialelia.js') }}"></script>
@endsection