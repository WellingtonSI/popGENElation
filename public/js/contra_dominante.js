
var valores='';
var p = document.querySelector('#P');
var q = document.querySelector('#Q');
var s = document.querySelector('#conficiente');
p.onkeypress = verificacao;
q.onkeypress = verificacao;
s.onkeypress = verificacao;
$("#P").mask("0.999");
$("#Q").mask("0.999");
$("#conficiente").mask("0.999");



$(document).on('click','.btnCalcular', function(){

    // var quantidadeAlelos = parseInt($("#frequencias .frequencia").length);
    // var n = parseInt(document.querySelector('#grau').value);
    // if(n==0){
    //     swal("Atenção!", "Selecione o campo Grau de Ploidia (N)","error")
    // }else {
    //     for(var i=0;i<n;i++){
    //         valorTotal=round(valorTotal,document.getElementById(Alelos[i]).value);
    //     }
        // if(valorTotal==1){
        
            //criação de cada termo da equação  e o valor dele, por exemplo 2pq = valor (2*p*q)
            // for(i=0;i<n;i++){
            //     let frequenciaBase = parseFloat(document.querySelector('#'+Alelos[i]).value);
            //     for(k=i;k<n;k++){

            console.log(document.querySelector('#P').value);
            var p = parseFloat(document.querySelector('#P').value);
            var q = parseFloat(document.querySelector('#Q').value);
            var s = parseFloat(document.querySelector('#conficiente').value);
            var valorAdaptativo = 1-s;
            //     }
            // }
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
                                        '<td> x = 1 - s</td>'+
                                        '<td> y = 1 - s</td>'+
                                        '<td> z = 1</td>'+
                                        '<td></td>'+
                                    '</tr>'+
                                    '<tr>'+
                                        '<td>Frequência DEPOIS da Seleção</td>'+
                                        '<td>'+(p*p*valorAdaptativo).toFixed(3)+'</td>'+
                                        '<td>'+(2*p*q*valorAdaptativo).toFixed(3)+'</td>'+
                                        '<td>'+(q*q).toFixed(3)+'</td>'+
                                        '<td>'+(1-s*p*(2-p)).toFixed(3)+'</td>'+
                                    '</tr>'+
                                '</table>'
                         );

                        var button = document.querySelector(".btnLimpar");
                        button.removeAttribute("hidden");
                        button = document.querySelector(".btnCalcular");
                        button.setAttribute("hidden","true");
                        
    //     }else{
    //         swal("Atenção!", "As somas das frequências (p+q+r+...+z) está menor ou maior que 1", "error");
    //     }
    // }

       
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
    $("#P").mask("0.999");
    $("#Q").mask("0.999");
    $("#conficiente").mask("0.999");
});

function verificacao(){
    $('.callout3').find('p').text(""); //limpa a div para erros successivos
    console.log(this.value,this);
    //expressão regular pra testar se no valor do input está no padrão de "0.999"
    if(/0\.\d{3}/.test(this.value)){
        console.log('entrou');
        var conficiente = document.querySelector('#conficiente').value;
        var dominante = document.querySelector('#P').value;
        var recessivo = document.querySelector('#Q').value;
        var valorTotal = round(dominante,recessivo);
        //console.log(conficiente);

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

