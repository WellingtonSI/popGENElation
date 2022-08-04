@extends('layouts.app')
@section('htmlheader_title', 'Mutação Não Recorrente')
@section('contentheader_title', 'Mutação Não Recorrente')
@section('links_adicionais')

@endsection
@section('conteudo')
<!-- Content Wrapper. Contains page content -->

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1> Mutação Não Recorrente</h1>
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
                            <h4> Geração</h4>
                            <div class="row">
                                <div class=" col-md-4 mt-5">
                                    <strong>Geração para o cálculo da perda</strong>
                                    <select type="text" autocomplete="off" name="geracao" id="geracao" class="form-control select2 @error('geracao') is-invalid @enderror">
                                    <option value="" >[Selecione]</option>
                                    @for ($geracao = 0; $geracao<=100;$geracao++)
                                            <option value={{$geracao}}  >Geração {{$geracao}}º</option>
                                    @endfor    
                                    </select>
                                    @error('geracao')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <hr>
                                    <button type="submit" class="btn btn-info float-right col-md-3 btnCalcular" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i>
                                        &nbsp Aguarde...">Calcular</button>

                                    <div class="form-group col-md-6">
                                        <div class="erros callout3 callout-danger hidden float-left" style="color:red;">
                                            <p></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12 col-12">
                                    <h4 style="text-align: center"> Resultados</h4>
                                    <div id="resultado" style='margin-left:30px; font-size: 25px;text-align:center' ></div>
                                </div>
                                <hr>
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
<script src="{{ asset('plugins/inputmask/jquery.inputmask.min.js') }}"></script>
<script src="{{ asset('js/soma.js') }}"></script>
<script src="{{ asset('js/mutacao_nao_recorrente.js') }}"></script>
@endsection