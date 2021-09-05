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
                    <!-- <form method="POST" action="/equilibrio" id="equilibrio" name="f1"> -->
                        @csrf
                        <hr>
                        <div class="container">
                            <div class="row">

                                <div class="form-group col-md-6 mt-5">
                                    <div class="form-group col-md-12">
                                        <strong>Quantidade de genótipos AA<span style="color: red;">*</span></strong>
                                        <input type="number" autocomplete="off" name="AA" id="AA" class="form-control @error('AA') is-invalid @enderror" value="{{ old('AA') }}">
                                        @error('AA')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-12">
                                        <strong>Quantidade de genótipos Aa<span style="color: red;">*</span></strong>
                                        <input type="number" autocomplete="off" name="Aa" id="Aa" class="form-control @error('Aa') is-invalid @enderror" value="{{ old('Aa') }}">
                                        @error('nascimento')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-12">
                                        <strong>Quantidade de genótipos aa<span style="color: red;">*</span></strong>
                                        <input type="number" autocomplete="off" name="aa" id="aa" class="form-control @error('aa') is-invalid @enderror" value="{{ old('aa') }}">
                                        @error('nascimento')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <hr>
                                    <button type="submit" class="btn btn-info float-right col-md-3 btnaddCalcular" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i>
                                        &nbsp Aguarde...">Calcular</button>
                                </div>
                                <div id="resultado" class="form-group col-md-6">
                                    <div id="interno">
                                        <h4 style="text-align: center"> Resultado</h4>
                                        <canvas id="myChart" width="100" height="100"></canvas>
                                    </div> 
                                </div>   
                            </div>
                        </div>



                        <!-- /.card-body -->
                    <!-- </form> -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.card -->
        </div>
</section 
@endsection 
@section('scripts_adicionais') 
 <script src="{{ asset('js/equilibrio.js') }}" type="modulo">
</script> 
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    var xValues = new Array(); 
    var p = new Array();
    var q = new Array();
    $(document).on('click', '.btnaddCalcular', function () {
        	
        $("#interno" ).remove();
        Quantidade_AA = parseFloat($('#AA').val());
        Quantidade_Aa = parseFloat($('#Aa').val());
        Quantidade_aa = parseFloat($('#aa').val());

        total=Quantidade_AA+Quantidade_Aa+Quantidade_aa;

        Frequencia_AA=Quantidade_AA/total;
        Frequencia_Aa=Quantidade_Aa/total;
        Frequencia_aa=Quantidade_aa/total;

        
            p.push(Frequencia_AA+Frequencia_Aa/2);
            q.push(Frequencia_aa+Frequencia_Aa/2);

            // p.push(Math.random());
            // q.push(Math.random());
 

        $.get('equilibrio/atualizar', function(data) {
            // console.log(yValues);
            // console.log(data);
            $('#resultado').html(data);

                var ctx = document.getElementById('myChart');
                var myChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20],
                    datasets: [{
                        label: 'Q',
                        data: q,
                        // backgroundColor: [  
                        //     'rgba(255, 99, 132, 0.2)',
                        //     'rgba(54, 162, 235, 0.2)',
                        //     'rgba(255, 206, 86, 0.2)',
                        //     'rgba(75, 192, 192, 0.2)',
                        //     'rgba(153, 102, 255, 0.2)',
                        //     'rgba(255, 159, 64, 0.2)'
                        // ],
                        borderColor: [
                            // 'rgba(255, 99, 132, 1)',
                            // 'rgba(54, 162, 235, 1)',
                            // 'rgba(255, 206, 86, 1)',
                            // 'rgba(75, 192, 192, 1)',
                            // 'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                        borderWidth: 1
                    },{
                        label: 'P',
                        data: p,
                        // backgroundColor: [  
                        //     'rgba(255, 99, 132, 0.2)',
                        //     'rgba(54, 162, 235, 0.2)',
                        //     'rgba(255, 206, 86, 0.2)',
                        //     'rgba(75, 192, 192, 0.2)',
                        //     'rgba(153, 102, 255, 0.2)',
                        //     'rgba(255, 159, 64, 0.2)'
                        // ],
                        borderColor: [
                            // 'rgba(255, 99, 132, 1)',
                            // 'rgba(54, 162, 235, 1)',
                            // 'rgba(255, 206, 86, 1)',
                            // 'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            // 'rgba(255, 159, 64, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        });
        
        
       
    });

    var ctx = document.getElementById('myChart');
        var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            datasets: [{
                label: 'Q',
                // backgroundColor: [  
                //     'rgba(255, 99, 132, 0.2)',
                //     'rgba(54, 162, 235, 0.2)',
                //     'rgba(255, 206, 86, 0.2)',
                //     'rgba(75, 192, 192, 0.2)',
                //     'rgba(153, 102, 255, 0.2)',
                //     'rgba(255, 159, 64, 0.2)'
                // ],
                borderColor: [
                    // 'rgba(255, 99, 132, 1)',
                    // 'rgba(54, 162, 235, 1)',
                    // 'rgba(255, 206, 86, 1)',
                    // 'rgba(75, 192, 192, 1)',
                    // 'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            
            }, {
                label: 'P',
                // backgroundColor: [  
                //     'rgba(255, 99, 132, 0.2)',
                //     'rgba(54, 162, 235, 0.2)',
                //     'rgba(255, 206, 86, 0.2)',
                //     'rgba(75, 192, 192, 0.2)',
                //     'rgba(153, 102, 255, 0.2)',
                //     'rgba(255, 159, 64, 0.2)'
                // ],
                borderColor: [
                    // 'rgba(255, 99, 132, 1)',
                    // 'rgba(54, 162, 235, 1)',
                    // 'rgba(255, 206, 86, 1)',
                    // 'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    // 'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
    
</script>
@endsection