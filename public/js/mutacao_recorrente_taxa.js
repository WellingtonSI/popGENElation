
$("#p").inputmask({mask: "9.999"});
$("#q").inputmask({mask: "9.999"});
$("#u").inputmask({mask: "0.9{0,}"});
$("#v").inputmask({mask: "0.9{0,}"});
var p = document.querySelector('#p');
var q = document.querySelector('#q');
var u = document.querySelector('#u');
var v = document.querySelector('#v');
p.onkeypress = verificacao;
q.onkeypress = verificacao;
// u.onkeypress = verificacao;
// v.onkeypress = verificacao;


$(document).on('click','.btnCalcular', function(){

    var p = document.querySelector('#p').value;
    var q = document.querySelector('#q').value;
    var u = document.querySelector('#u').value;
    var v = document.querySelector('#v').value;
    
    if(u==='' || Number(u)===0){
        swal.fire("Atenção!", "Preencha corretamente o campo de Taxa de Mutação de “A” p/ “a” (µ)",'error');}
    else if(v==='' || Number(v)===0){
        swal.fire("Atenção!", "Preencha corretamente o campo de Taxa de Mutação de “a” p/ “A” (v)",'error');}
    else{
        var valorTotal=round(p,q);

        if(Number(valorTotal)===1){
    
           //fiz essa chamada só pelo fato do javascript ter problema com valores muito pequenos.
           $.ajax({
                type: 'GET',
                url:  window.location.origin+"/mutacao/recorrente/calc",
                data: {
                    'u':u,
                    'v':v,
                    'p':p,
                    'q':q
                },
                success: function($data) {

                    if($data.split('E')[1]){
                        $('#resultado').empty();
                        var split =  $data.split('E');
                        var resultado = split[0]+"x10"+"<sup>"+split[1]+"</sup>";
                        $('#resultado').append("</br><h5>Taxa de Mudança da Freqüência de “a“</h5><strong><span  style='font-size:20px'>"+resultado+"</span></strong>");
                    }else{
                        if($data!=0){
                            $('#resultado').empty();
                            //pegar o valor depois do ponto para saber qual será ordem de grandeza 
                            var depoisDoPonto = $data.split('.')[1];
                            var expoente = depoisDoPonto.match(/0/g).length;
                            var valor = (depoisDoPonto.split('0')).at(-1);
                            if(valor>9){
                                valor/=10;
                                expoente++;
                                var resultado = valor+"x10"+"<sup>-"+expoente+"</sup>";
                                $('#resultado').append("</br><h5>Taxa de Mudança da Freqüência de “a“</h5><strong><span  style='font-size:20px'>"+resultado+"</span></strong>");
                            }else{
                                var resultado = valor+".0x10"+"<sup>-"+expoente+"</sup>";
                                $('#resultado').append("</br><h5>Taxa de Mudança da Freqüência de “a“</h5><strong><span  style='font-size:20px'>"+resultado+"</span></strong>");
                            }
                        }else{
                            $('#resultado').append("</br><h5>Taxa de Mudança da Freqüência de “a“</h5><strong><span  style='font-size:20px'>0</span></strong>");
                        }
                    }
                    
                },
                error: function(error) {
                    swal.fire("Atenção!", "Não foi possível realizar os cálculos, tente novamente mais tarde", "error");
                },
            });
       
        }else{
            if(valorTotal>1)
                swal.fire("Atenção!", "As somas das frequências (p+q) está maior que 1", "error");
            else
                swal.fire("Atenção!", "As somas das frequências (p+q) está menor que 1", "error");
        }
    }
       
});

function verificacao(){

    //expressão regular pra testar se no valor do input está no padrão de "0.999"
    if(/\d\.\d{3}/.test(this.value)){
        $('.callout3').find('p').text(""); //limpa a div para erros successivos

        var dominante = document.querySelector('#p').value;
        var recessivo = document.querySelector('#q').value;
        
        var valorTotal = round(dominante,recessivo);

            if(valorTotal>1){
                $('.callout3').find("p").append("As somas das frequências de P+Q está maior que 1");
            }
            else if(dominante && recessivo){
                if(valorTotal<1){
                    $('.callout3').find("p").append("As somas das frequências de P+Q deve ser igual a 1");
                }
                    
            }

    }
}

