@extends('layouts.app')
@section('htmlheader_title', 'Seleção Gamética')
@section('contentheader_title', 'Seleção Gamética')
@section('links_adicionais')
    <link rel="stylesheet"  href="{{asset('css/style_selecao.css')}}">
    <link rel="stylesheet"  href="{{asset('css/selecao_contra_dominante.css')}}">
@endsection
@section('conteudo')
<!-- Content Wrapper. Contains page content -->

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Dominância Incompleta</h1>
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
                    <div class="float-left">
                        (<span style="color: red;">*</span>) Campos Obrigatórios
                    </div>
                    <div class="float-right">
                        <a href="{{ URL::to('/selecao/completa') }}"><button 
                        class="btn btn-block btn-outline-primary"><i class="fas fa-undo"></i> Voltar</button></a>
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
                        <h4>Frequência Gênica | Frequência Genótipica | Valor Adaptativo</h4>
                            <div class="row">
                                <div class="form-group col-md-6 mt-4">
                                    <div class="row">
                                        <div id="valores">
                                            <div class="form-group col-md-12">
                                                <strong>p<span style="color: red;">*</span></strong>
                                                <input type="text" autocomplete="off" name="P" id="P" class="form-control @error('AA') is-invalid @enderror" value="{{ old('P') }}">
                                            </div>
                                            <div class="form-group col-md-12">
                                                <strong>q<span style="color: red;">*</span></strong>
                                                <input type="text" autocomplete="off" name="Q" id="Q" class="form-control @error('Q') is-invalid @enderror" value="{{ old('Q') }}">
                                            </div>
                                            <div class="form-group col-md-12">
                                                <strong>Coeficiente de Seleção (s)<span style="color: red;">*</span></strong>
                                                <input type="text" autocomplete="off" name="conficiente" id="conficiente" class="form-control @error('conficiente') is-invalid @enderror" value="{{ old('conficiente') }}">

                                            </div>
                                        
                                        </div>
                                    </div>
                                    <div  id="resultado">
                                    </div>
                                    <div class="row">
                                        <div class="erros callout3 callout-danger hidden float-left" style="color:white;">
                                            <p class="error-style"></p>
                                        </div>
                                    </div>
                                    
                                    <hr>
                                    <button type="submit" class="btn btn-info float-right col-md-sm-3 col-3 btnCalcular" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i>
                                        &nbsp Aguarde..." style="margin-right:20%">Calcular</button>
                                    <button type="submit" class="btn btn-warning float-right col-md-sm-3 col-3 btnLimpar" title="Limpar a tabela de resultado" style="margin-right:20%" hidden>Limpar</button>
                                    
                                   

                                </div>
                                
                                <div class="form-group col-md-6 col-sm-12 col-12" >
                                    <!-- <h4 style="text-align: center"> Resultados</h4>
                                    <div class="texto-resultado" id="resultado"  ></div> -->
                                    <table  style="margin-top:12%; border:1">
                                        <tr>
                                            <th colspan="5">Seleção CONTRA o alelo intermediário</th>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>A1A1</td>
                                            <td>A1A2</td>
                                            <td>A2A2</td>
                                            <td>Total</td>
                                        </tr>
                                        <tr>
                                            <td>Frequência ANTES da Seleção</td>
                                            <td>p<sup>2</sup></td>
                                            <td>2pq</td>
                                            <td>q<sup>2</sup></td>
                                            <td>1</td>
                                        </tr>
                                        <tr>
                                            <td>Valor Adaptativo</td>
                                            <td>x = 1 </td>
                                            <td>y = 1 - 1/2s</td>
                                            <td>z = 1 - s</td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>Frequência DEPOIS da Seleção</td>
                                            <td>p<sup>2</sup></td>
                                            <td>2pqy</td>
                                            <td>q<sup>2</sup>z</td>
                                            <td>1 - qs   <strong>(W)</strong></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>p<sup>2</sup>/W</td>
                                            <td>2pqy/W</td>
                                            <td>q<sup>2</sup>z/W</td>
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
<script src="{{ asset('plugins/sweetalert2/sweetalert2.min.js') }}"></script>
<script src="{{ asset('plugins/maskedinput/jquery.maskedinput.min.js') }}"></script>
<script src="{{ asset('js/soma.js') }}"></script>
<script src="{{ asset('js/dominancia_incompleta.js') }}"></script>
@endsection