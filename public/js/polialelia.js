$(document).ready(function($) {

    var resultados = new Array();
    var geracoes = 0;
    
    $(document).on('click', '.btnaddVoltar', function () {

        $('#todos_resultados').empty();
        $('#resultado').empty();

        A1A1 = parseFloat($('#A1A1').val(""));
        A1A2 = parseFloat($('#A1A2').val(""));
        A1A3 = parseFloat($('#A1A3').val(""));
        A2A2 = parseFloat($('#A2A2').val(""));
        A2A3 = parseFloat($('#A2A3').val(""));
        A3A3 = parseFloat($('#A3A3').val(""));
        $('.btn')[0].style.display="block";
        $('.btn')[1].style.display="none";
    
        $('.container')[0].style.display="block";
    });
    $(document).on('click', '.btnaddResultdos', function () {
        
        $('.container')[0].style.display="none";
        $('.btn')[0].style.display="none";
        $('.btn')[1].style.display="block";

        //apresentar todos os resultados até o momento 
        function apresentacao(resultdo,index) {
            
            if(resultdo[7]==1){
                $("#todos_resultados").append("<h4> Geração "+(index+1)+"</h4><strong id='frequencia-polelia'><p style='margin-left:20px'></br></br>A1A1 = "+(resultdo[0]/resultdo[6]).toFixed(3)+"</br>A1A2 = "+(resultdo[1]/resultdo[6]).toFixed(3)+"</br>A1A3 = "+(resultdo[2]/resultdo[6]).toFixed(3)+"</br>A2A2 = "+(resultdo[3]/resultdo[6]).toFixed(3)+"</br>A2A3 = "+(resultdo[4]/resultdo[6]).toFixed(3)+"</br>A3A3 = "+(resultdo[5]/resultdo[6]).toFixed(3)+"</p></strong><span id='span-polelia' style='font-size:20px;color: green;'</br><strong>A população está em equilíbrio</strong></span></br>_____________________________________________</br>")
    
            }else{
                console.log(resultdo);
                $("#todos_resultados").append("<h4> Geração "+(index+1)+"</h4><strong id='frequencia-polelia'><p style='margin-left:20px'></br></br>A1A1 = "+(resultdo[0]/resultdo[6]).toFixed(3)+"</br>A1A2 = "+(resultdo[1]/resultdo[6]).toFixed(3)+"</br>A1A3 = "+(resultdo[2]/resultdo[6]).toFixed(3)+"</br>A2A2 = "+(resultdo[3]/resultdo[6]).toFixed(3)+"</br>A2A3 = "+(resultdo[4]/resultdo[6]).toFixed(3)+"</br>A3A3 = "+(resultdo[5]/resultdo[6]).toFixed(3)+"</p></strong><span id='span-polelia' style='font-size:20px;color: red;'</br><strong>A população não está em equilíbrio</strong></span></br>_____________________________________________</br>")
            }
            
        }

        //chama cada linha da matriz para poder ser apresentado na tela só usar connsole.log para cara argumento recebido na função apresentacao para melhor entendimento.
        resultados.forEach(apresentacao);
        
    });

    $(document).on('click', '.btnaddCalcular', function () {
        $('.callout3').removeClass('hidden');
        $('.callout3').addClass('hidden'); //oculta a div para erros successivos
        $('.callout3').find('p').text(""); //limpa a div para erros successivos
        $("#erro" ).remove();
        $("#span-polelia").remove();
        $("#frequencia-polelia").remove();
        
       
        A1A1 = parseFloat($('#A1A1').val());
        A1A2 = parseFloat($('#A1A2').val());
        A1A3 = parseFloat($('#A1A3').val());
        A2A2 = parseFloat($('#A2A2').val());
        A2A3 = parseFloat($('#A2A3').val());
        A3A3 = parseFloat($('#A3A3').val());


        if(!isNaN(A1A1)  && !isNaN(A1A2)  && !isNaN(A1A3)  && !isNaN(A2A2)  && !isNaN(A2A3)  && !isNaN(A3A3) ){

            $('#A1A1').val("")
            $('#A1A2').val("")
            $('#A1A3').val("")
            $('#A2A2').val("")
            $('#A2A3').val("")
            $('#A3A3').val("")

            total = A1A1 + A1A2 + A1A3 + A2A2 + A2A3 + A3A3;
        
            p=Math.sqrt((A1A1/total));
            q=Math.sqrt((A2A2/total));
            r=Math.sqrt((A3A3/total));
            pq= 2*p*q;
            pr=2*p*r;
            qr=2*q*r; 
            
            //1 72 83 15 52 50
            //------------------
                resultados[geracoes] = new Array(7);
                resultados[geracoes][0] = A1A1;
                resultados[geracoes][1] = A1A2;
                resultados[geracoes][2] = A1A3;
                resultados[geracoes][3] = A2A2;
                resultados[geracoes][4] = A2A3;
                resultados[geracoes][5] = A3A3;
                resultados[geracoes][6] = total;
                resultados[geracoes][7] = (p+q+r+pq+pr+qr).toFixed(2);
                geracoes++;

            //---------------------

            //verificação se está em equilíbrio ou não
            if((p+q+r+pq+pr+qr).toFixed(2)==1){

                if(geracoes==2){
                    $('.btn')[0].style.display="block";
                }
                $("#resultado").append("<strong id='frequencia-polelia'><p></br></br>A1A1 = "+(A1A1/total).toFixed(3)+"</br>A1A2 = "+(A1A2/total).toFixed(3)+"</br>A1A3 = "+(A1A3/total).toFixed(3)+"</br>A2A2 = "+(A2A2/total).toFixed(3)+"</br>A2A3 = "+(A2A3/total).toFixed(3)+"</br>A3A3 = "+(A3A3/total).toFixed(3)+"</br></br><p style='color: green; text-align:center'>A população está em equilíbrio</p></strong>")

            }else{
                if(geracoes==2){
                    $('.btn')[0].style.display="block";
                }
                $("#resultado").append("<strong id='frequencia-polelia'><p ></br></br>A1A1 = "+(A1A1/total).toFixed(3)+"</br>A1A2 = "+(A1A2/total).toFixed(3)+"</br>A1A3 = "+(A1A3/total).toFixed(3)+"</br>A2A2 = "+(A2A2/total).toFixed(3)+"</br>A2A3 = "+(A2A3/total).toFixed(3)+"</br>A3A3 = "+(A3A3/total).toFixed(3)+"</br></br><p style='color:red; text-align:center'>A população não está em equilíbrio</p></strong>")
            }
        }else{
            swal.fire("Atenção!", "Preencha todos os campos", "error");
        }
        
    });

    $(document).on('click', '.btnDefinir', function () {
        $("#frequencia_genotipica").remove();
    
        var alelos = parseFloat((document.querySelector("#alelos")).value);
        if(isNaN(alelos)){
            swal.fire("Atenção!", "Selecione uma opção de quantidade de alelo", "error");
        }else{
         
            var total = ((alelos*(alelos+1))/2);
            var numero_heterozigotos = ((alelos*(alelos-1))/2);
            var porcentagem_homozigoto  = (alelos/total)*100;
            var porcentagem_heterozigotos  = (numero_heterozigotos/total)*100;



            var heterozigotos="" ;
            var homozigotos="" ;

        
            for(let i=1; i<=alelos;i++){
                
                for(let k=i;k<=alelos;k++){
                
                    if(k==i){
                        homozigotos+="<button type='button' class='btn btn-danger btn-sm col-md-sm-2 col-2' >A"+i+"A"+k+"</button>";
                    }else{
                        heterozigotos+="<button type='button' class='btn btn-danger btn-sm col-md-sm-2 col-2' >A"+i+"A"+k+"</button>";
                    }
                }
            }

            $("#resultado_maisalelos").append("<strong id='frequencia_genotipica'><p style='margin-left:20px'></br></br>Número de Genótipos = "+total+"</br></br>Número de Genótipos Homozigotos = "+alelos+" ("+porcentagem_homozigoto.toFixed(2)+"%)</br></br><span style='color:red'>"+homozigotos+"</span></br></br>Número de Genótipos Heterozigotos = "+numero_heterozigotos+" ("+porcentagem_heterozigotos.toFixed(2)+"%)</br></br><span style='color:red'>"+heterozigotos+"</span></p></strong>")
        }

    });

    $(document).on('click', '.btnTresAlelos', function () {
        $("#frequencia-polelia").remove();
        (document.querySelector("#A1A1")).disabled=false;
        (document.querySelector("#A1A2")).disabled=false;
       (document.querySelector("#A1A3")).disabled=false;
       (document.querySelector("#A2A2")).disabled=false;
        (document.querySelector("#A2A3")).disabled=false;
        (document.querySelector("#A3A3")).disabled=false;
        (document.querySelector(".btnaddCalcular")).disabled=false;
        $('.btn')[2].style.display="none";
    });
});
