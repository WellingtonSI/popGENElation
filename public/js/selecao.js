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
    //     }else{
    //         swal("Atenção!", "As somas das frequências (p+q+r+...+z) está menor ou maior que 1", "error");
    //     }
    // }

       
})

//função criada por causa do problema de somas das casas decimais por problema de precisão, por exemplo 0,9+0,1 == 0,99999...
function round (num1,num2) {
    if(num1==''){
        return num2;
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