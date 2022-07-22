@extends('layouts.app')
@section('htmlheader_title', 'Equilíbrio de
Hardy-Weinberg')
@section('contentheader_title', 'Equilíbrio de
Hardy-Weinbergme')
@section('links_adicionais')

@endsection
@section('conteudo')
<!-- Content Wrapper. Contains page content -->

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1> Equilíbrio de Hardy-Weinberg</h1>
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
 
                <div class="card-body">
                
                       
                    <button class="btn btn-info col-md-5 btnaddCalcular" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i>
                                        &nbsp Aguarde...">Calculo por geração</button>

                    <button  class="btn btn-info  col-md-5 btnaddCalcular" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i>
                                        &nbsp Aguarde...">Calculo todas gerações</button>
                   
             
                </div>
                <!-- /.card-body -->

            </div>
            <!-- /.card -->
        </div>
</section 
@endsection 
@section('scripts_adicionais') 


@endsection