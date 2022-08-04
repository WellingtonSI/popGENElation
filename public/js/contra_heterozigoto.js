
var valores='';
$("#P").mask("9.999");
$("#Q").mask("9.999");
$("#conficiente").mask("0.999");
var p = document.querySelector('#P');
var q = document.querySelector('#Q');
var s = document.querySelector('#conficiente');
p.onkeypress = verificacao;
q.onkeypress = verificacao;
s.onkeypress = verificacao;

$(document).on('click','.btnCalcular', function(){

    var p = document.querySelector('#P').value;
    var q = document.querySelector('#Q').value;
    var s = document.querySelector('#conficiente').value;

    if(s==='0.000'){
        swal.fire("Atenção!", "O Coeficiente de Seleção (S) deve ser diferente de 0")
    }else {
            var valorTotal=round(p,q);

        if(valorTotal==1){
    
            var valorAdaptativo = 1-s;
            var w = 1-2*p*q*s;
      
            valores = document.getElementById("valores").innerHTML;
            $('#valores').empty();
            $('#resultado').append(
                                '<table  style="margin-top:3.4%">'+
                                    '<tr>'+
                                        '<th colspan="5">Resultado</th>'+
                                    '</tr>'+
                                    '<tr>'+
                                        '<td></td>'+
                                        '<td>A1A1</td>'+
                                        '<td>A1A2</td>'+
                                        '<td>A2A2</td>'+
                                        '<td>Total</td>'+
                                    '</tr>'+
                                    '<tr>'+
                                        '<td>Frequência ANTES da Seleção</td>'+
                                        '<td>'+(p*p).toFixed(3)+'</td>'+
                                        '<td>'+(2*p*q).toFixed(3)+'</td>'+
                                        '<td>'+(q*q).toFixed(3)+'</td>'+
                                        '<td>1</td>'+
                                    '</tr>'+
                                    '<tr>'+
                                        '<td>Valor Adaptativo</td>'+
                                        '<td> x = 1 </td>'+
                                        '<td> y = 1 - s</td>'+
                                        '<td> z = 1</td>'+
                                        '<td></td>'+
                                    '</tr>'+
                                    '<tr>'+
                                        '<td>Frequência DEPOIS da Seleção</td>'+
                                        '<td>'+(p*p).toFixed(3)+'</td>'+
                                        '<td>'+(2*p*q*valorAdaptativo).toFixed(3)+'</td>'+
                                        '<td>'+(q*q).toFixed(3)+'</td>'+
                                        '<td>'+(1-2*p*q*s).toFixed(3)+'</td>'+
                                    '</tr>'+
                                   '<tr>'+
                                        '<td></td>'+
                                        '<td>'+((p*p)/w).toFixed(3)+'</td>'+
                                        '<td>'+((2*p*q*valorAdaptativo)/w).toFixed(3)+'</td>'+
                                        '<td>'+((q*q)/w).toFixed(3)+'</td>'+
                                        '<td>1</td>'+
                                    '</tr>'+
                                '</table>'
                         );

                        var button = document.querySelector(".btnLimpar");
                        button.removeAttribute("hidden");
                        button = document.querySelector(".btnCalcular");
                        button.setAttribute("hidden","true");
                        
        }else{
            if(valorTotal>1)
                swal.fire("Atenção!", "As somas das frequências (p+q+r+...+z) está maior que 1", "error");
            else
                swal.fire("Atenção!", "As somas das frequências (p+q+r+...+z) está menor que 1", "error");
        }
    }

       
});

$(document).on('click','.btnLimpar', function(){
    $('#resultado').empty();
    document.getElementById("valores").innerHTML = valores;
    var button = document.querySelector(".btnCalcular");
    button.removeAttribute("hidden");
    button = document.querySelector(".btnLimpar");
    button.setAttribute("hidden","true");
    var p = document.querySelector('#P');
    var q = document.querySelector('#Q');
    var s = document.querySelector('#conficiente');
    p.onkeypress = verificacao;
    q.onkeypress = verificacao;
    s.onkeypress = verificacao;
    $("#P").mask("9.999");
    $("#Q").mask("9.999");
    $("#conficiente").mask("0.999");
});

function verificacao(){
    
    //expressão regular pra testar se no valor do input está no padrão de "0.999"
    if(/\d\.\d{3}/.test(this.value)){
        $('.callout3').find('p').text(""); //limpa a div para erros successivos

        var conficiente = document.querySelector('#conficiente').value;
        var dominante = document.querySelector('#P').value;
        var recessivo = document.querySelector('#Q').value;
        var valorTotal = round(dominante,recessivo);


            if(valorTotal>1){
                $('.callout3').find("p").append("As somas das frequências de P+Q está maior que 1");
            }
            else if(dominante && recessivo){
                if(valorTotal<1){
                    $('.callout3').find("p").append("As somas das frequências de P+Q deve ser igual a 1");
                }
                    
            }
            else if(conficiente=='0.000'){
                $('.callout3').find("p").append("O Coeficiente de Seleção (S) deve ser diferente de 0");
            }
    }
} 

