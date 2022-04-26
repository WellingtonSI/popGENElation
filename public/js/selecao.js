var valores='';
$(document).on('click','.btnCalcular', function(){
    var valorTotal='';

    // var quantidadeAlelos = parseInt($("#frequencias .frequencia").length);
    // var n = parseInt(document.querySelector('#grau').value);
    // if(n==0){
    //     swal("Atenção!", "Selecione o campo Grau de Ploidia (N)","error")
    // }else {
    //     for(var i=0;i<n;i++){
    //         valorTotal=round(valorTotal,document.getElementById(Alelos[i]).value);
    //     }
        // if(valorTotal==1){
            
            var resultado = '';
            //criação de cada termo da equação  e o valor dele, por exemplo 2pq = valor (2*p*q)
            // for(i=0;i<n;i++){
            //     let frequenciaBase = parseFloat(document.querySelector('#'+Alelos[i]).value);
            //     for(k=i;k<n;k++){

            console.log(document.querySelector('#P').value);
            var p = parseFloat(document.querySelector('#P').value);
            var q = parseFloat(document.querySelector('#Q').value);
            var x = parseFloat(document.querySelector('#X').value);
            var y = parseFloat(document.querySelector('#Y').value);
            var z = parseFloat(document.querySelector('#Z').value);
            var s = parseFloat(document.querySelector('#conficiente').value);
            console.log(s);
            var valorAdaptativo = 1-s;
            //     }
            // }
            valores = document.getElementById("valores").innerHTML;
            $('#valores').empty();
            $('#resultado').append(
                                '<table border="1" style="margin-top:10%">'+
                                    '<tr>'+
                                        '<th>Genes</th>'+
                                        '<th colspan="4">Genótipos</th>'+
                                    '</tr>'+
                                    '<tr>'+
                                        '<td>Alelo A1 = p </br>Alelo A2 = q</td>'+
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
                                        '<td>'+x+'</td>'+
                                        '<td>'+y+'</td>'+
                                        '<td>'+z+'</td>'+
                                    '</tr>'+
                                    '<tr>'+
                                        '<td>Frequência DEPOIS da Seleção</td>'+
                                        '<td>'+(p*p*x).toFixed(3)+'</td>'+
                                        '<td>'+(2*p*q*y).toFixed(3)+'</td>'+
                                        '<td>'+(q*q*z).toFixed(3)+'</td>'+
                                        '<td>'+(valorAdaptativo).toFixed(3)+'</td>'+
                                    '</tr>'+
                                    '<tr>'+
                                        '<td></td>'+
                                        '<td>'+((p*p*x)/valorAdaptativo).toFixed(3)+'</td>'+
                                        '<td>'+((2*p*q*y)/valorAdaptativo).toFixed(3)+'</td>'+
                                        '<td>'+((q*q*z)/valorAdaptativo).toFixed(3)+'</td>'+
                                        '<td>1</td>'+
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
});

