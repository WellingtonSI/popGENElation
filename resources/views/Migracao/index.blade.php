@extends('layouts.app')
@section('htmlheader_title', 'Migração')
@section('contentheader_title', 'Migração')
@section('links_adicionais')

@endsection
@section('conteudo')
<!-- Content Wrapper. Contains page content -->

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1> Migração</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/home">Home</a></li>
                    <li class="breadcrumb-item active">Migração</li>
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
                                    <strong>Quantidade da População X<span style="color: red;">*</span></strong>
                                    <input type="number" autocomplete="off" name="popx" id="popx" class="form-control @error('popx') is-invalid @enderror" value="{{ old('popx') }}">
                                    @error('popx')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-12">
                                <strong>Quantidade da População Y<span style="color: red;">*</span></strong>
                                    <input type="number" autocomplete="off" name="popy" id="popy" class="form-control @error('popy') is-invalid @enderror" value="{{ old('popy') }}">
                                    @error('popy')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-12">
                                    <strong>Número de Migrantes (N<sub>m</sub>)<span style="color: red;">*</span></strong>
                                    <input type="number" autocomplete="off" name="nm" id="nm" class="form-control @error('nm') is-invalid @enderror" value="{{ old('nm') }}">
                                    @error('nm')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-12">
                                    <strong>Frequência de Não – Migrantes (q<sub>0</sub>)<span style="color: red;">*</span></strong>
                                    <input type="text" autocomplete="off" name="q0" id="q0" class="form-control @error('q0') is-invalid @enderror" value="{{ old('q0') }}">
                                    @error('q0')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-12">
                                    <strong>Frequência de Migrantes (q<sub>m</sub>)<span style="color: red;">*</span></strong>
                                    <input type="text" autocomplete="off" name="qm" id="qm" class="form-control @error('qm') is-invalid @enderror" value="{{ old('qm') }}">
                                    @error('qm')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                

                                <hr>
                                <button type="submit" class="btn btn-info float-right col-md-3 btnCalcular" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i>&nbsp Aguarde...">Calcular</button>

                                <div class="form-group col-md-6">
                                    <div class="erros callout3 callout-danger hidden float-left" style="color:red;">
                                        <p></p>
                                    </div>
                                </div>
                            </div>
                    
                            <div class="form-group col-md-6">
                                <h4 style="text-align: center"> Resultados</h4>
                                <div id="resultado" style='margin-left:30px; font-size: 20px; text-align:center' ></div>
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
<script src="{{asset('plugins/sweetalert2/sweetalert2.min.js')}}"></script>
<script src="{{ asset('plugins/inputmask/jquery.inputmask.min.js') }}"></script>
<script src="{{ asset('js/migracao.js') }}"></script>
@endsection