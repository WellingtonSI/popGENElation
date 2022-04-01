@extends('layouts.app')
@section('htmlheader_title', 'Equilíbrio de
Hardy-Weinberg')
@section('contentheader_title', 'Equilíbrio de
Hardy-Weinbergme')
@section('links_adicionais')
<style>
    p#conteudo {
    background-color: 	#3CB371;
    color: white;
    border-radius:10px;
    padding: 10px;
    font-family: Arial, Helvetica, sans-serif
    }
</style>

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
                        <h3>Todas gerações</h3> <span>resultado gerado após os dados de todas gerações</span>
                        <hr>
                        <div class="container">
                            <div class="row">
                                <div class="form-group col-md-3 mt-5">
                                    <strong>Geração(ões) - Uma ou mais</strong>
                                    <select type="text" title="Quantidade de geração(ões)" autocomplete="off" name="geracao" id="geracao" class="form-control select2 @error('geracao') is-invalid @enderror">
                                    @for ($geracao = 1; $geracao<=20;$geracao++)
                                            <option   {{ (old("geracao") ==  $geracao ? "selected":"") }}>{{$geracao}}</option>
                                    @endfor    
                                    </select>
                                    @error('ano')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-2 mt-5">
                                    </br>  
                                    <button class="form-control btn-primary btnDefinir" >
                                        Definir
                                    </button> 
                                </div>
                            </div>  
                            <hr>  
                            <div class="row">

                                
                                <div class="form-group col-md-6 mt-5">
                                    <div class="col-md-12" id="error">
                                    </div>
                                    </br>
                                    <div class="form-group col-md-12">
                                        <strong>Quantidade de genótipos AA<span style="color: red;">*</span></strong>
                                        <input type="number" autocomplete="off" name="AA" id="AA" class="form-control @error('AA') is-invalid @enderror" value="{{ old('AA') }}">
                                    
                                    </div>
                                    <div class="form-group col-md-12">
                                        <strong>Quantidade de genótipos Aa<span style="color: red;">*</span></strong>
                                        <input type="number" autocomplete="off" name="Aa" id="Aa" class="form-control @error('Aa') is-invalid @enderror" value="{{ old('Aa') }}">

                                    </div>
                                    <div class="form-group col-md-12">
                                        <strong>Quantidade de genótipos aa<span style="color: red;">*</span></strong>
                                        <input type="number" autocomplete="off" name="aa" id="aa" class="form-control @error('aa') is-invalid @enderror" value="{{ old('aa') }}">
       
                                    </div>
                                    <hr>
                                    <button  class="btn btn-info float-right col-md-3 btnaddCalcular" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i>
                                        &nbsp Aguarde...">Calcular</button>

                                    <div class="form-group col-md-6" id="geracoes">
                                        <p id='conteudo'>Quantidade de gerações: 0</p>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <div class="erros callout3 callout-danger hidden float-left" style="color:red;">
                                            <p></p>
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="form-group col-md-6" id="resultado">
                                    <div id="interno">
                                        <h4 style="text-align: center"> Resultado</h4>
                                        <canvas id="myChart" width="719" height="719" style="display: block; box-sizing: border-box; height: 554.41px; width: 554.41px;"></canvas>
                                    </div> 
                                </div>
                                
                            </div>
                        </div>
                </div>
                 <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
</section 
@endsection 
@section('scripts_adicionais') 
<script src="{{ asset('js/equilibrio.js') }}" type="modulo"></script> 
<script src="{{ asset('js/chart.js') }}"></script>
<script>
    var geracoes = 0;
    var limite_geracoes = 20;
    var xValues = new Array(); 
    var p = new Array();
    var q = new Array();
    $(document).on('click', '.btnDefinir', function () {
        limite_geracoes = document.getElementById("geracao").value;
        $("#geracao").prop('disabled',true);
    });
    $(document).on('click', '.btnaddCalcular', function () {
        $('.callout3').removeClass('hidden');
        $('.callout3').addClass('hidden'); //oculta a div para erros successivos
        $('.callout3').find('p').text(""); //limpa a div para erros successivos
        $("#erro" ).remove();
       
        	
        Quantidade_AA = parseFloat($('#AA').val());
        Quantidade_Aa = parseFloat($('#Aa').val());
        Quantidade_aa = parseFloat($('#aa').val());

        total=Quantidade_AA+Quantidade_Aa+Quantidade_aa;
     

        Frequencia_AA=Quantidade_AA/total;
        Frequencia_Aa=Quantidade_Aa/total;
        Frequencia_aa=Quantidade_aa/total;

        
            p.push(Frequencia_AA+Frequencia_Aa/2);
            q.push(Frequencia_aa+Frequencia_Aa/2);

            
            if(Quantidade_AA && Quantidade_Aa && Quantidade_aa && geracoes<limite_geracoes){
                geracoes++;
                document.getElementById("geracoes").innerHTML = "<p id='conteudo'>Quantidade de gerações: "+geracoes+"</p>";
                $('.callout3').removeClass('hidden'); 
                $("#AA").val("");
                $("#Aa").val("");
                $("#aa").val("");
            }else if(geracoes>=limite_geracoes || geracoes>=20){
                geracoes++;
                document.getElementById("error").innerHTML = "<strong id='erro'><p  style='color: red;' >Quantidade de gerações chegou ao máximo!</p></strong>";
                $('.callout3').removeClass('hidden');
                $("#AA").val("");
                $("#Aa").val("");
                $("#aa").val("");
            }else{
                if (!Quantidade_AA) {
                    $('.callout3').find("p").append(" - Preencha o campo de genótipos AA </br>");
                }
                if (!Quantidade_Aa) {
                    $('.callout3').find("p").append(" - Preencha o campo de genótipos Aa </br>");
                }
                if (!Quantidade_aa) {
                    $('.callout3').find("p").append(" - Preencha o campo de genótipos aa </br>");
                }
            }
 
        if(geracoes==limite_geracoes && geracoes<limite_geracoes+1){
            console.log(geracoes);
            console.log(limite_geracoes);
            $("#interno" ).remove();
            $.get('/equilibrio/todas-geracoes/atualizar-mapa', function(data) {

                $('#resultado').html(data);

                    var ctx = document.getElementById('myChart');
                    var myChart = new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20],
                        datasets: [{
                            label: 'p',
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
                                // 'rgba(153, 102, 255, 1)',
                                'rgba(255, 159, 64, 1)'
                            ],
                            borderWidth: 1
                        },{
                            label: 'q',
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
        }  

        
       
    });

    var ctx = document.getElementById('myChart');
        var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            datasets: [{
                label: 'p',
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
                label: 'q',
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