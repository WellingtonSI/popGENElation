
var valores='';
$("#P").mask("9.999");
$("#Q").mask("9.999");
$("#s1").mask("9.999");
$("#s2").mask("9.999");
var p = document.querySelector('#P');
var q = document.querySelector('#Q');
var s1 = document.querySelector('#s1');
var s2 = document.querySelector('#s2');
p.onkeypress = verificacao;
q.onkeypress = verificacao;
s1.onkeypress = verificacao;
s2.onkeypress = verificacao;

$(document).on('click','.btnCalcular', function(){

    var p = document.querySelector('#P').value;
    var q = document.querySelector('#Q').value;
    var s1 = document.querySelector('#s1').value;
    var s2 = document.querySelector('#s2').value;

    if(s1>'1.000'){
        swal("Atenção!", "O Coeficiente de Seleção de alelo 'A' deve ser menor que 1")
    }
    else if(s2==='1.000'){
        swal("Atenção!", "O Coeficiente de Seleção de alelo 'a' deve ser menor que 1")
    }
    else {
            var valorTotal=round(p,q);

        if(valorTotal==1){
    
            var valorAdaptativo1 = 1-s1;
            var valorAdaptativo2 = 1-s2;
      
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
                                        '<td> x = 1 - s1</td>'+
                                        '<td> y = 1 </td>'+
                                        '<td> z = 1 - s2</td>'+
                                        '<td></td>'+
                                    '</tr>'+
                                    '<tr>'+
                                        '<td>Frequência DEPOIS da Seleção</td>'+
                                        '<td>'+(p*p*valorAdaptativo1).toFixed(3)+'</td>'+
                                        '<td>'+(2*p*q).toFixed(3)+'</td>'+
                                        '<td>'+(q*q*valorAdaptativo2).toFixed(3)+'</td>'+
                                        '<td>'+((1-s1*p*p)-(s2*q*q)).toFixed(3)+'</td>'+
                                    '</tr>'+
                                '</table>'
                         );

                        var button = document.querySelector(".btnLimpar");
                        button.removeAttribute("hidden");
                        button = document.querySelector(".btnCalcular");
                        button.setAttribute("hidden","true");
                        
        }else{
            if(valorTotal>1)
                swal("Atenção!", "As somas das frequências (p+q+r+...+z) está maior que 1", "error");
            else
                swal("Atenção!", "As somas das frequências (p+q+r+...+z) está menor que 1", "error");
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
    $("#P").mask("9.999");
    $("#Q").mask("9.999");
    $("#s1").mask("9.999");
    $("#s2").mask("9.999");
    var p = document.querySelector('#P');
    var q = document.querySelector('#Q');
    var s1 = document.querySelector('#s1');
    var s2 = document.querySelector('#s2');
    p.onkeypress = verificacao;
    q.onkeypress = verificacao;
    s1.onkeypress = verificacao;
    s2.onkeypress = verificacao;
});

function verificacao(){
    
    //expressão regular pra testar se no valor do input está no padrão de "0.999"
    if(/\d\.\d{3}/.test(this.value)){
        $('.callout3').find('p').text(""); //limpa a div para erros successivos

        var s1 = document.querySelector('#s1').value;
        var s2 = document.querySelector('#s2').value;
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
            else if(s1>'1.000'){
                $('.callout3').find("p").append("O Coeficiente de Seleção de alelo 'A' deve ser menor que 1");
            }
            else if(s2>'1.000'){
                $('.callout3').find("p").append("O Coeficiente de Seleção  de alelo 'a' deve ser menor que 1");
            }
    }
} 

