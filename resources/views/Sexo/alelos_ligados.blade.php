@extends('layouts.app')
@section('htmlheader_title', 'Alelos ligados ao sexo')
@section('contentheader_title', 'Alelos ligados ao sexo')
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
                <h1> Alelos ligados ao sexo</h1>
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

                        <div class="container"> 
                            
                              <div class="form-group col-md-12 mt-5" style="margin-top: 16px;">
                                <h5>Macho</h5> 
                                    <div class="col-md-12" id="error">
                                    </div>
                                    </br>
                                    <div class="row">
                                        <div class="form-group col-md-4">
                                            <strong>XA y<span style="color: red;">*</span></strong>
                                            <input type="number" autocomplete="off" name="macho_A" id="macho_A" class="form-control " value="{{ old('macho_A') }}">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <strong>Xa y<span style="color: red;">*</span></strong>
                                            <input type="number" autocomplete="off" name="macho_a" id="macho_a" class="form-control  " value="{{ old('macho_a') }}">

                                        </div>
                                    </div>

                                </div>
                                <div class="form-group col-md-12 mt-5" style="margin-top: 16px;">
                                 <h5>Fêmea</h5> 
                                    <div class="col-md-12" id="error">
                                    </div>
                                    </br>
                                    <div class="row">
                                        <div class="form-group col-md-4">
                                            <strong>XA XA<span style="color: red;">*</span></strong>
                                            <input type="number" autocomplete="off" name="femea_AA" id="femea_AA" class="form-control" value="{{ old('femea_AA') }}">
                                        </div>

                                        <div class="form-group col-md-4">
                                            <strong>XA  Xa<span style="color: red;">*</span></strong>
                                            <input type="number" autocomplete="off" name="femea_Aa" id="femea_Aa" class="form-control" value="{{ old('femea_Aa') }}">

                                        </div>
                                        <div class="form-group col-md-4">
                                            <strong>Xa  Xa<span style="color: red;">*</span></strong>
                                            <input type="number" autocomplete="off" name="femea_aa" id="femea_aa" class="form-control" value="{{ old('femea_aa') }}">
                                        </div>

                                    </div>
 
                                </div>
                                <hr>
                                <div class="row"> 
                                    <div class="form-group col-md-12 mt-5">
                                        <button  class="btn btn-info float-right col-md-2 btnaddCalcular" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i>
                                            &nbsp Aguarde..." style="height: 44px;">Calcular</button>
                                        <div class="form-group col-md-3 float-right" id="geracoes">
                                            <p id='conteudo'>Quantidade de gerações: 0</p>
                                        </div>
                                    
                                        <div class="form-group col-md-3">
                                            <div class="erros callout3 callout-danger hidden float-left" style="color:red;">
                                                <p></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                            <div class="row"> 
                                <div class="form-group col-md-4" id="resultadoDominante">
                                    <div id="internoDominante">
                                        <h5 style="text-align: center" >Frequência de Alelos Dominantes</h5>
                                        <canvas id="myChartMacho" width="719" height="719" style="display: block; box-sizing: border-box; height: 554.41px; width: 554.41px;"></canvas>
                                    </div> 
                                </div>
                                <div class="form-group col-md-4" id="resultadoRecessivo">
                                    <div id="internoRecessivo">
                                        <h5 style="text-align: center">Frequência de Alelos Recessivos</h5>
                                        <canvas id="myChartFemea" width="719" height="719" style="display: block; box-sizing: border-box; height: 554.41px; width: 554.41px;"></canvas>
                                    </div> 
                                </div>
                                <div class="form-group col-md-4" id="resultadoPopulacional">
                                    <div id="internoPopulacional">
                                        <h5 style="text-align: center">Frequência de Alelos Populacionais</h5>
                                        <canvas id="myChartPopulacional" width="719" height="719" style="display: block; box-sizing: border-box; height: 554.41px; width: 554.41px;"></canvas>
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
    var pm = new Array();
    var qm = new Array();
    var pf = new Array();
    var qf = new Array();
    var dp = new Array();
    var dq = new Array();
    // $(document).on('click', '.btnDefinir', function () {
    //     limite_geracoes = document.getElementById("geracao").value;
    //     $("#geracao").prop('disabled',true);

    // });

    $(document).on('click', '.btnaddCalcular', function () {

        $('.callout3').removeClass('hidden');
        $('.callout3').addClass('hidden'); //oculta a div para erros successivos
        $('.callout3').find('p').text(""); //limpa a div para erros successivos
        $("#erro" ).remove();
       
        QuantidadeMacho_A = parseFloat($('#macho_A').val());
        QuantidadeMacho_a = parseFloat($('#macho_a').val());

        QuantidadeFemea_AA = parseFloat($('#femea_AA').val());
        QuantidadeFemea_Aa = parseFloat($('#femea_Aa').val());
        QuantidadeFemea_aa = parseFloat($('#femea_aa').val());

        totalMacho=QuantidadeMacho_A+QuantidadeMacho_a;
        totalFemea=QuantidadeFemea_AA+QuantidadeFemea_Aa+QuantidadeFemea_aa;
     

        FrequenciaMacho_A=QuantidadeMacho_A/totalMacho;
        FrequenciaMacho_a=QuantidadeMacho_a/totalMacho;

        FrequenciaFemea_AA=QuantidadeFemea_AA/totalFemea;
        FrequenciaFemea_Aa=QuantidadeFemea_Aa/totalFemea;
        FrequenciaFemea_aa=QuantidadeFemea_aa/totalFemea;

        
            pm.push(FrequenciaMacho_A);
            qm.push(FrequenciaMacho_a);

            pf.push(FrequenciaFemea_AA+(0.5* FrequenciaFemea_Aa));
            qf.push(FrequenciaFemea_aa+(0.5* FrequenciaFemea_Aa));

            p.push(FrequenciaMacho_A/3 + (2*((FrequenciaFemea_AA+(0.5*FrequenciaFemea_Aa))/3)));
            q.push(FrequenciaMacho_a/3 + (2*((FrequenciaFemea_aa+(0.5*FrequenciaFemea_Aa))/3)));

            dp.push(pf[geracoes]-pm[geracoes]);
            dq.push(qf[geracoes]-qm[geracoes]);

            console.log(pm,qm,pf,qf,p,q);
            // if(Quantidade_AA && Quantidade_Aa && Quantidade_aa && geracoes<limite_geracoes){
            //     geracoes++;
            //     document.getElementById("geracoes").innerHTML = "<p id='conteudo'>Quantidade de gerações: "+geracoes+"</p>";
            //     $('.callout3').removeClass('hidden'); 
            //     $("#AA").val("");
            //     $("#Aa").val("");
            //     $("#aa").val("");
            // }else if(geracoes>=limite_geracoes || geracoes>=20){
            //     geracoes++;
            //     document.getElementById("error").innerHTML = "<strong id='erro'><p  style='color: red;' >Quantidade de gerações chegou ao máximo!</p></strong>";
            //     $('.callout3').removeClass('hidden');
            //     $("#AA").val("");
            //     $("#Aa").val("");
            //     $("#aa").val("");
            // }else{
            //     if (!Quantidade_AA) {
            //         $('.callout3').find("p").append(" - Preencha o campo de genótipos AA </br>");
            //     }
            //     if (!Quantidade_Aa) {
            //         $('.callout3').find("p").append(" - Preencha o campo de genótipos Aa </br>");
            //     }
            //     if (!Quantidade_aa) {
            //         $('.callout3').find("p").append(" - Preencha o campo de genótipos aa </br>");
            //     }
            // }
 
        //if(geracoes==limite_geracoes && geracoes<limite_geracoes+1){
            console.log(geracoes);
            titleDominante = document.getElementsByTagName("h5")[2].innerHTML;
            titleRecessivo = document.getElementsByTagName("h5")[3].innerHTML+',internoRecessivo';
            titlePopulacional = document.getElementsByTagName("h5")[4].innerHTML+",internoPopulacional";
            
            $("#internoDominante").remove();
            $("#internoRecessivo").remove();
            $("#internoPopulacional").remove();  

            $.ajax({
                type: 'get',
                url:  window.location.origin+"/sexo/atualizar-mapa",
                data: {
                    titulo: 'Frequência de Alelos Dominantes',
                    id_div: 'internoDominante',
                    id_canvas:'myChartMacho' ,
                },
                    success: function(data) {
                        $('#resultadoDominante').html(data);
                        var ctx = document.getElementById('myChartMacho');
                        var myChart = new Chart(ctx, {
                            type: 'line',
                            data: {
                                labels: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20],
                                datasets: [{
                                    label: 'pm',
                                    data: pm,
                                    backgroundColor: [  
                                        'rgba(0, 0, 255, 0.8)'
                                    ],
                                    borderWidth: 1 
                                },{
                                    label: 'qm',
                                    data: qm,
                                    backgroundColor: [  
                                        'rgba(250, 0, 0, 0.8)'
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
                        

                    }
                });

                $.ajax({
                type: 'get',
                url:  window.location.origin+"/sexo/atualizar-mapa",
                data: {
                    titulo: 'Frequência de Alelos Recessivos',
                    id_div: 'internoRecessivo',
                    id_canvas:'myChartFemea' ,
                },
                    success: function(data) {
                        $('#resultadoRecessivo').html(data);
                        var ctx = document.getElementById('myChartFemea');
                        var myChart = new Chart(ctx, {
                            type: 'line',
                            data: {
                                labels: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20],
                                datasets: [{
                                    label: 'pf',
                                    data: pf,
                                    backgroundColor: [  
                                        'rgba(0, 0, 255, 0.5)'
                                    ],
                                    borderWidth: 1 
                                },{
                                    label: 'qf',
                                    data: qf,
                                    backgroundColor: [  
                                        'rgba(250, 0, 0, 0.5)'
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
                        

                    }
                });
                $.ajax({
                type: 'get',
                url:  window.location.origin+"/sexo/atualizar-mapa",
                data: {
                    titulo: 'Frequência de Alelos Populacionais',
                    id_div: 'internoPopulacional',
                    id_canvas:'myChartPopulacional' ,
                },
                    success: function(data) {
                        $('#resultadoPopulacional').html(data);
                        var ctx = document.getElementById('myChartPopulacional');
                        var myChart = new Chart(ctx, {
                            type: 'line',
                            data: {
                                labels: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20],
                                datasets: [{
                                    label: 'p',
                                    data: p,
                                    backgroundColor: [  
                                        'rgba(153, 102, 255, 1)'
                                    ],
                                    borderWidth: 1 
                                },{
                                    label: 'q',
                                    data: q,
                                    backgroundColor: [  
                                        'rgba(255, 159, 64, 1)'
                                    ],
                                    borderWidth: 1
                                },{
                                    label: 'd(p)',
                                    data: dp,
                                    backgroundColor: [  
                                    'rgba(0, 0, 0, 1)'
                                    ],

                                },{
                                    label: 'd(q)',
                                    data: dq,
                                    backgroundColor: [  
                                    'rgba(0, 0, 0, 0.5)'
                                    ],

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
                        

                    }
                });

       
    });

    var ctx = document.getElementById('myChartMacho');
        var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            datasets: [{
                label: 'pm',
                backgroundColor: [  
                      'rgba(0, 0, 255, 0.8)'
                    ],
                borderWidth: 1 
                }, {
                label: 'pf',
                backgroundColor: [  
                'rgba(255, 0, 0, 0.8)',
                 ],

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

    var ctx = document.getElementById('myChartFemea');
        var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            datasets: [{
                label: 'qm',
                backgroundColor: [  
                    'rgba(0, 0, 255, 0.5)'
                ],
                borderWidth: 1 
            }, {
                label: 'qf',
                backgroundColor: [  
                    'rgba(255, 0, 0, 0.5)'
                ],
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
    var ctx = document.getElementById('myChartPopulacional');
        var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            datasets: [{
                label: 'p',
                borderColor: [
                    'rgba(153, 102, 255, 1)'
                ],
                borderWidth: 1    
            }, {
                label: 'q',
                borderColor: [
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            },{
                label: 'd(p)',
                backgroundColor: [  
                'rgba(0, 0, 0, 1)'
                 ],

            },{
                label: 'd(q)',
                backgroundColor: [  
                'rgba(0, 0, 0, 0.5)'
                 ],

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