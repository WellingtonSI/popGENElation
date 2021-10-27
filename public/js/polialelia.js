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
        

        //1 58 67 20 52 50
        console.log(p,q,r,p+q+r+pq+pr+qr);

        // if(X2<=3.84){

        //     $("#resultado").append("<span id='span-polelia' style='position:absolute;top:50%;left:49%;transform:translate(-50%,-50%);font-size:20px'></br></br></br></br></br></br></br><strong >A polulação está em equilíbrio</strong></span>")

        // }else{
        //     $("#resultado").append("<span id='span-polelia' style='position:absolute;top:50%;left:42%;transform:translate(-50%,-50%);font-size:20px'></br></br></br></br></br></br></br><strong>A polulação não está em equilíbrio</strong></span>")
        // }
    
    
    });

});
