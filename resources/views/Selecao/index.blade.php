@extends('layouts.app')
@section('htmlheader_title', 'Seleção Gamética')
@section('contentheader_title', 'Seleção Gamética')
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
                <h1> Seleção Gamética</h1>
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
                    <hr>
                    <span>Seleção contra o recessivo a favor do dominante</span>

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
                                        <div id="valores">
                                            <div class="form-group col-md-12">
                                                <strong>P<span style="color: red;">*</span></strong>
                                                <input type="number" autocomplete="off" name="P" id="P" class="form-control @error('AA') is-invalid @enderror" value="{{ old('P') }}">
                                                @error('P')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-12">
                                                <strong>Q<span style="color: red;">*</span></strong>
                                                <input type="number" autocomplete="off" name="Q" id="Q" class="form-control @error('Q') is-invalid @enderror" value="{{ old('Q') }}">
                                                @error('Q')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-12">
                                                <strong>X<span style="color: red;">*</span></strong>
                                                <input type="number" autocomplete="off" name="X" id="X" class="form-control @error('X') is-invalid @enderror" value="{{ old('X') }}">
                                                @error('X')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-12">
                                                <strong>Y<span style="color: red;">*</span></strong>
                                                <input type="number" autocomplete="off" name="Y" id="Y" class="form-control @error('Y') is-invalid @enderror" value="{{ old('Y') }}">
                                                @error('Y')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-12">
                                                <strong>Z<span style="color: red;">*</span></strong>
                                                <input type="number" autocomplete="off" name="Z" id="Z" class="form-control @error('Z') is-invalid @enderror" value="{{ old('Z') }}">
                                                @error('Z')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-12">
                                                <strong>Coeficiente de Seleção (S)<span style="color: red;">*</span></strong>
                                                <input type="number" autocomplete="off" name="conficiente" id="conficiente" class="form-control @error('conficiente') is-invalid @enderror" value="{{ old('conficiente') }}">
                                                @error('conficiente')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>

                                            <hr>
                                        
                                        </div>
                                    </div>
                                    <div  id="resultado">

                                    </div>
                                    <hr>
                                    <button type="submit" class="btn btn-info float-right col-md-sm-3 col-3 btnCalcular" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i>
                                        &nbsp Aguarde..." style="margin-right:20%">Calcular</button>

                                    <div class="form-group col-md-6">
                                        <div class="erros callout3 callout-danger hidden float-left" style="color:red;">
                                            <p></p>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="form-group col-md-6 col-sm-12 col-12" style="position:relative;width:100px;height:250px;">
                                    <!-- <h4 style="text-align: center"> Resultados</h4>
                                    <div class="texto-resultado" id="resultado"  ></div> -->
                                    <table border="1" style="margin-top:20%">
                                        <tr>
                                            <th>Genes</th>
                                            <th colspan="4">Genótipos</th>
                                        </tr>
                                        <tr>
                                            <td>Alelo A1 = p </br>Alelo A2 = q</td>
                                            <td>A1A1</td>
                                            <td>A1A2</td>
                                            <td>A2A2</td>
                                            <td>Total</td>
                                        </tr>
                                        <tr>
                                            <td>Frequência ANTES da Seleção</td>
                                            <td>p2</td>
                                            <td>2pq</td>
                                            <td>q2</td>
                                            <td>1</td>
                                        </tr>
                                        <tr>
                                            <td>Valor Adaptativo</td>
                                            <td>x</td>
                                            <td>y</td>
                                            <td>z</td>
                                        </tr>
                                        <tr>
                                            <td>Frequência DEPOIS da Seleção</td>
                                            <td>p2x</td>
                                            <td>2pqy</td>
                                            <td>q2z</td>
                                            <td>Vm (W)</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>p2x/Vm</td>
                                            <td>2pqy/Vm</td>
                                            <td>q2z/Vm</td>
                                            <td>1</td>
                                        </tr>
                                    </table>
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
<script src="{{ asset('js/selecao.js') }}"></script>
@endsection