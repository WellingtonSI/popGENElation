$(document).ready(function($) {
    
    $(document).on('click', '.btnaddCalcular', function () {
        $('.callout3').removeClass('hidden');
        $('.callout3').addClass('hidden'); //oculta a div para erros successivos
        $('.callout3').find('p').text(""); //limpa a div para erros successivos
        $("#erro" ).remove();
        $("#span-polelia").remove();
        
       
        A1A1 = parseFloat($('#A1A1').val());
        A1A2 = parseFloat($('#A1A2').val());
        A1A3 = parseFloat($('#A1A3').val());
        A2A2 = parseFloat($('#A2A2').val());
        A2A3 = parseFloat($('#A2A3').val());
        A3A3 = parseFloat($('#A3A3').val());


     console.log(A1A1,A1A2,A1A3,A2A2,A2A3,A3A3);
        total = A1A1 + A1A2 + A1A3 + A2A2 + A2A3 + A3A3;
    
        p=parseFloat(((2*A1A1)+A2A2+A2A3)/(2*total));
        q=parseFloat(((2*A1A2)+A2A2+A3A3)/(2*total));
        r=parseFloat(((2*A1A3)+A2A3+A3A3)/(2*total));
        
        console.log(p,q,r);

        A1A1_esperado=total*(p*p);
        A1A2_esperado=total*(q*q);
        A1A3_esperado=total*(r*r);
        A2A2_esperado=total*2*p*q;
        A2A3_esperado=total*2*p*r;
        A3A3_esperado=total*2*q*r;
    
        console.log(A1A1_esperado,A1A2_esperado,A1A3_esperado,A2A2_esperado,A2A3_esperado,A3A3_esperado);

        X2 = Math.pow(A1A1-A1A1_esperado,2)/A1A1_esperado + Math.pow(A1A2-A1A2_esperado,2)/A1A2_esperado+Math.pow(A1A3-A1A3_esperado,2)/A1A3_esperado + Math.pow(A2A2-A2A2_esperado,2)/A2A2_esperado+Math.pow(A2A3-A2A3_esperado,2)/A2A3_esperado+Math.pow(A3A3-A3A3_esperado,2)/A3A3_esperado;
    
        console.log(X2);


        if(X2<=3.84){

            $("#resultado").append("<span id='span-polelia' style='position:absolute;top:50%;left:49%;transform:translate(-50%,-50%);font-size:20px'></br></br></br></br></br></br></br><strong >A polulação está em equilíbrio</strong></span>")

        }else{
            $("#resultado").append("<span id='span-polelia' style='position:absolute;top:50%;left:42%;transform:translate(-50%,-50%);font-size:20px'></br></br></br></br></br></br></br><strong>A polulação não está em equilíbrio</strong></span>")
        }
    
    
    });

});
