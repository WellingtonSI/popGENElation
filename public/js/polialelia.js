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

        function apresentacao(resultdo,index) {

            if(resultdo[7]==1){
                $("#todos_resultados").append("<h4> Geração "+(index+1)+"</h4><strong id='frequencia-polelia'><p style='margin-left:20px'></br></br>A1A1 = "+(resultdo[0]/resultdo[6]).toFixed(3)+"</br>A1A2 = "+(resultdo[1]/resultdo[6]).toFixed(3)+"</br>A1A3 = "+(resultdo[2]/resultdo[6]).toFixed(3)+"</br>A2A2 = "+(resultdo[3]/resultdo[6]).toFixed(3)+"</br>A2A3 = "+(resultdo[4]/resultdo[6]).toFixed(3)+"</br>A3A3 = "+(resultdo[5]/resultdo[6]).toFixed(3)+"</p></strong><span id='span-polelia' style='font-size:20px;color: green;'</br><strong>A polulação está em equilíbrio</strong></span></br>_____________________________________________</br>")
    
            }else{
                $("#todos_resultados").append("<h4> Geração "+(index+1)+"</h4><strong id='frequencia-polelia'><p style='margin-left:20px'></br></br>A1A1 = "+(resultdo[0]/resultdo[6]).toFixed(3)+"</br>A1A2 = "+(resultdo[1]/resultdo[6]).toFixed(3)+"</br>A1A3 = "+(resultdo[2]/resultdo[6]).toFixed(3)+"</br>A2A2 = "+(resultdo[3]/resultdo[6]).toFixed(3)+"</br>A2A3 = "+(resultdo[4]/resultdo[6]).toFixed(3)+"</br>A3A3 = "+(resultdo[5]/resultdo[6]).toFixed(3)+"</p></strong><span id='span-polelia' style='font-size:20px;color: red;'</br><strong>A polulação não está em equilíbrio</strong></span></br>_____________________________________________</br>")
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

        $('#A1A1').val("")
        $('#A1A2').val("")
        $('#A1A3').val("")
        $('#A2A2').val("")
        $('#A2A3').val("")
        $('#A3A3').val("")


     console.log(A1A1,A1A2,A1A3,A2A2,A2A3,A3A3);
        total = A1A1 + A1A2 + A1A3 + A2A2 + A2A3 + A3A3;
    
        p=Math.sqrt((A1A1/total));
        q=Math.sqrt((A2A2/total));
        r=Math.sqrt((A3A3/total));
        pq= 2*p*q;
        pr=2*p*r;
        qr=2*q*r; 
        
        //1 72 83 15 52 50
        console.log(p,q,r,p+q+r+pq+pr+qr);
        console.log(parseFloat(p+q+r+pq+pr+qr).toFixed(2));

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

            // console.log(resultados);

        //---------------------

        //verificação se está em equilíbrio ou não
        if((p+q+r+pq+pr+qr).toFixed(2)==1){

            if(geracoes==2){
                $('.btn')[0].style.display="block";
            }
            $("#resultado").append("<strong id='frequencia-polelia'><p style='margin-left:20px'></br></br>A1A1 = "+(A1A1/total).toFixed(3)+"</br>A1A2 = "+(A1A2/total).toFixed(3)+"</br>A1A3 = "+(A1A3/total).toFixed(3)+"</br>A2A2 = "+(A2A2/total).toFixed(3)+"</br>A2A3 = "+(A2A3/total).toFixed(3)+"</br>A3A3 = "+(A3A3/total).toFixed(3)+"</p></strong><span id='span-polelia' style='position:absolute;top:50%;left:49%;transform:translate(-50%,-50%);font-size:20px;color: green;'</br></br></br></br></br></br></br></br></br></br><strong>A polulação está em equilíbrio</strong></span>")

        }else{
            if(geracoes==2){
                $('.btn')[0].style.display="block";
            }
            $("#resultado").append("<strong id='frequencia-polelia'><p style='margin-left:20px'></br></br>A1A1 = "+(A1A1/total).toFixed(3)+"</br>A1A2 = "+(A1A2/total).toFixed(3)+"</br>A1A3 = "+(A1A3/total).toFixed(3)+"</br>A2A2 = "+(A2A2/total).toFixed(3)+"</br>A2A3 = "+(A2A3/total).toFixed(3)+"</br>A3A3 = "+(A3A3/total).toFixed(3)+"</p></strong><span id='span-polelia' style='position:absolute;top:50%;left:42%;transform:translate(-50%,-50%);font-size:20px;color: red;'</br></br></br></br></br></br></br></br></br></br><strong>A polulação não está em equilíbrio</strong></span>")
        }
    
    
    });

});
