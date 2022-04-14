@extends('layouts.app')
@section('htmlheader_title', 'Poliploidia')
@section('contentheader_title', 'Poliploidia')
@section('links_adicionais')
    <link rel="stylesheet"  href="{{asset('css/style_poliploidia.css')}}">
@endsection
@section('conteudo')
<!-- Content Wrapper. Contains page content -->

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1> Poliploidia</h1>
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
                    <!-- <hr>
                    <h5>Valores de referência</h5>
                    </br><span><strong>p</strong> maior e igual <strong>0</strong> e <strong>p</strong> menor e igual <strong>1</strong></span>
                    </br><span><strong>q</strong> maior e igual <strong>0</strong> e <strong>q</strong> menor e igual <strong>1</span>
                    </br><span><strong>p</strong> + <strong>q</strong> = 1</span> -->
                    <hr>
                    <span>Selecione a quantidade de alelos que possa aparecer os campos necessários!</span>

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
                            <h4>Frequência Gênica</h4>
                            <div class="row">
                                <div class="form-group col-md-6 mt-5">
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <strong>Grau de Ploidia (N)<span style="color: red;">*</span></strong>
                                            <select type="text"  title="Grau de Ploidia" autocomplete="off" name="grau" id="grau" class="form-control select2 @error('grau') is-invalid @enderror">
                                            <option value=""   {{ (old("grau") ==  "Selecione" ? "selected":"") }}>[Selecione]</option>
                                            @for ($grau = 3; $grau<=8;$grau++)
                                                    <option value={{$grau}}  {{ (old("grau") ==  $grau ? "selected":"") }}>{{$grau}} alelos</option>
                                            @endfor    
                                            </select>
                                            <!-- <input type="number" autocomplete="off" min="3" name="N" id="N" class="form-control @error('AA') is-invalid @enderror" value="{{ old('A1A1') }}"> -->
                                            @error('grau')
                                            <span class="invalid-feedback" role="alert">
                                                <strong id='grau-erro'>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div  id="frequencias">

                                    </div>
                                    <!-- <div class="form-group col-md-6">
                                        <strong>frequência do alelo dominante (p)<span style="color: red;">*</span></strong>
                                        <input type="text" autocomplete="off" max="1" min="0" name="p" id="p" class="form-control @error('p') is-invalid @enderror" value="{{ old('p') }}">
                                        @error('p')
                                        <span class="invalid-feedback" role="alert">
                                            <strong  id='p-erro'>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <strong>frequência do alelo recessivo (q)<span style="color: red;">*</span></strong>
                                        <input type="text" autocomplete="off" max="1" min="0" name="q" id="q" class="form-control @error('q') is-invalid @enderror" value="{{ old('q') }}">
                                        @error('q')
                                        <span class="invalid-feedback" role="alert">
                                            <strong  id='q-erro'>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div> -->
                                    <hr>
                                    <button type="submit" class="btn btn-info float-right col-md-sm-3 col-3 btnCalcular" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i>
                                        &nbsp Aguarde...">Calcular</button>

                                    <div class="form-group col-md-6">
                                        <div class="erros callout3 callout-danger hidden float-left" style="color:red;">
                                            <p></p>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="form-group col-md-6 col-sm-12 col-12" style="position:relative;width:100px;height:250px;">
                                    <h4 style="text-align: center"> Resultados</h4>
                                    <div class="texto-resultado" id="resultado"  ></div>
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
<script src="{{ asset('plugins/maskedinput/jquery.maskedinput.min.js') }}"></script>
<script src="{{ asset('js/poliploidia.js') }}"></script>
@endsection