$(document).ready(function($) {
    const Alelos = ['p','q','r','s','t','x','y','z']; 

    $("#grau").on('change', function() {
        $('#frequencias').empty();
        $('.callout3').find('p').text("");
        var n = parseInt(document.querySelector('#grau').value);
        if(!isNaN(n)){
            for(i=0;i<n;i++){
                $('#frequencias').append("<div class='form-group col-md-6'>" +
                                            "<strong>frequência  de "+Alelos[i]+" <span style='color: red;'>*</span></strong>"+ 
                                            "<input type='text' autocomplete='off' max='1' min='0' name='"+Alelos[i]+"' id='"+Alelos[i]+"' class='form-control frequencia'>"+ 
                                            "<span class='invalid-feedback' role='alert'> <strong ></strong></span>"+
                                         "</div>");
                                        $("#"+Alelos[i]).mask("0.999");

                var input = document.querySelector('#'+Alelos[i]);
                input.onkeypress = verificacao;
            }

            
        }else{
            swal("Atenção!", "Selecione a quantidade de alelos","error");
        }


       
    });

    function verificacao(){
        $('.callout3').find('p').text(""); //limpa a div para erros successivos
        //expressão regular pra testar se no valor do input está no padrão de "0.999"
        if(/0\.\d{3}/.test(this.value)){
            var inputComConteudo=0;
            var grau = parseInt(document.querySelector('#grau').value);
            var acumulador='';
            var valor ='';
                for(i=0;i<grau;i++){
                    valor = document.getElementById(Alelos[i]).value
                    acumulador=round(acumulador,valor)
                    if(valor)
                        inputComConteudo++;
                }
                if(acumulador>1){
                    $('.callout3').find("p").append("As somas das frequências está maior que 1");
                }
                else if(inputComConteudo==grau){
                    if(acumulador<1)
                        $('.callout3').find("p").append("As somas das frequências está menor que 1");
                }
            
        }
    } 
  

    //o expoente na equação sempre será 2 (x + y + z)^2
    $(document).on('click','.btnCalcular', function(){
        var valorTotal='';
        // var quantidadeAlelos = parseInt($("#frequencias .frequencia").length);
        var n = parseInt(document.querySelector('#grau').value);
        if(n==0){
            swal("Atenção!", "Selecione o campo Grau de Ploidia (N)","error")
        }else {
            for(var i=0;i<n;i++){
                valorTotal=round(valorTotal,document.getElementById(Alelos[i]).value);
            }
            if(valorTotal==1){
                $('#resultado').empty();
                var resultado = '';
                //criação de cada termo da equação  e o valor dele, por exemplo 2pq = valor (2*p*q)
                for(i=0;i<n;i++){
                    let frequenciaBase = parseFloat(document.querySelector('#'+Alelos[i]).value);
                    for(k=i;k<n;k++){
                        let Proximafrequencia = parseFloat(document.querySelector('#'+Alelos[k]).value);
                        resultado+= (k == i ?  
                                               '<button type="button" class="btn btn-success col-md-sm-3 col-3 ">'+Alelos[i]+'<sup>2</sup> = '+  (frequenciaBase*frequenciaBase).toFixed(3)+'</button>'
                                                 
                                                : '<button type="button" class="btn btn-success col-md-sm-3 col-3">2'+Alelos[i]+Alelos[k]+' = '+(2*frequenciaBase*Proximafrequencia).toFixed(3)+'</button>'
                                                )

                    }
                }
                resultado+='</br>';
                $('#resultado').append(resultado);
            }else{
                swal("Atenção!", "As somas das frequências (p+q+r+...+z) está menor ou maior que 1", "error");
            }
        }

           
    })
    
    //função criada por causa do problema de somas das casas decimais por problema de precisão, por exemplo 0,9+0,1 == 0,99999...
    function round (num1,num2) {
        if(num1==''){
            return num2;
        }
        else if(num2==''){
            return num1;
        }else{
            var ArrayNum1 = num1.split(".");
            var ArrayNum2 = num2.split(".");
            var decimal = parseInt(ArrayNum1[1])+parseInt(ArrayNum2[1]);
            if(decimal<1000){
                    return parseInt(ArrayNum1[0])+parseInt(ArrayNum2[0])+'.'+decimal;
            }    
            else
                return parseInt((decimal.toString())[0])+parseInt(ArrayNum1[0])+'.'+ (decimal.toString()).slice(1,4);
        } 
        
    }
    
})
