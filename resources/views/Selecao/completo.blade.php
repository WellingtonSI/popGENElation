@extends('layouts.app')
@section('htmlheader_title', 'Seleção Gamética')
@section('contentheader_title', 'Seleção Gamética')
@section('links_adicionais')
    <link rel="stylesheet"  href="{{asset('css/style_selecao_completo.css')}}">
@endsection
@section('conteudo')
<!-- Content Wrapper. Contains page content -->

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1> Dominância Completa</h1>
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
                    <span>Clique na opção que desejar</span>
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
                        <button type="button" class="btn bg-gradient-primary float-left col-md-4 btnContraDominante btnStyle" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i>Aguarde...">Contra alelo dominante</button>
                             
                                    
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
<script src="{{ asset('js/selecao_completo.js') }}"></script>
<script>
    $(document).on('click','.btnContraDominante', function(){
        base_url = window.location.origin;
        console.log(base_url);
        window.location.assign(base_url+"/selecao/completa/contraDominante");
    });
</script>
@endsection