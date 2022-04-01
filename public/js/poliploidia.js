$(document).ready(function($) {
    const Alelos = ['p','q','r','s','t','x','y','z']; 
    $("#grau").on('change', function() {
        $('#frequencias').empty();
        var n = parseInt(document.querySelector('#grau').value);
        if(!isNaN(n)){
            for(i=0;i<n;i++){
                $('#frequencias').append("<div class='form-group col-md-6'>" +
                                            "<strong>frequência  de "+Alelos[i]+" <span style='color: red;'>*</span></strong>"+ 
                                            "<input type='text' autocomplete='off' max='1' min='0' name='"+Alelos[i]+"' id='"+Alelos[i]+"' class='form-control' >"+ 
                                            "<span class='invalid-feedback' role='alert'> <strong ></strong></span>"+
                                         "</div>");
                                        $("#"+Alelos[i]).mask("9.9");
            }
        }else{
            swal("Atenção!", "Selecione a quantidade de alelos","error");
        }
    });
   
    
    // q.oninput = ()=>{
    //     console.log(document.getElementById("q").value); 
    // }
    // const dominante = document.querySelector('#p');
    // dominante.addEventListener('blur', function(evento){
    //     q = document.getElementById("q").value;
    //     if(this.value > 1){
    //         swal("Atenção!", "frequência do alelo dominante maior que 1", "error");
    //         this.value='';
    //     }
        
    // });
    // const recessivo = document.querySelector('#q');
    // recessivo.addEventListener('blur', function(evento){
    //     p = document.getElementById("p").value;
    //     if(this.value > 1)
    //     swal("Atenção!", "frequência do alelo recessivo maior que 1", "error");
    // });

    //o expoente na equação sempre será 2 (x + y + z)^2
    $(document).on('click','.btnCalcular', function(){
        var n = parseInt(document.querySelector('#grau').value);
        if(n==0){
            swal("Atenção!", "Selecione o campo Grau de Ploidia (N)","error")
        }else {
            if(parseFloat(dominante.value)+parseFloat(recessivo.value )==1 ){
                $('#resultado').empty();
                var p = parseFloat(dominante.value);
                var q = parseFloat(recessivo.value);
                let expoente_p = n;
                let expoente_q = 0;
                var resultado = '';
                //criação de cada termo da equação  e o valor dele, por exemplo 2pq = valor (2*p*q)
                for(i=n;i>=0;i--){
                    
                    resultado+= combinatoria (n,expoente_q)

                    resultado+= (expoente_p >0 ?  'p<sup>'+expoente_p+'</sup>' :'')
                    
                    resultado+= (expoente_q >0 ? 'q<sup>'+expoente_q+'</sup>'  :'')
                    
                    resultado+= (' = '+((p**expoente_p) * (q**expoente_q)).toFixed(3) +'</br>')

                    
                    expoente_p--;
                    expoente_q++;
                }
                $('#resultado').append(resultado);
            }else{
                document.querySelector('#p').value='';
                document.querySelector('#q').value='';
                swal("Atenção!", "p + q maior ou menor que 1, verifique os campos (p) e (q)", "error");
            }
        }

           
    })

    function fatorial(fator){
        if(fator <= 1)
            return  1;
        else
         return fator*fatorial(fator-1);
    }
    function combinatoria (n,p){
        return fatorial(n)/(fatorial(p)*fatorial(n-p));
    }

    // expoente_q != 0 ?  
    //                         n==expoente_q? 
    //                                 n!=1 ? combinatoria (n,expoente_q): ''
    //                         :combinatoria (n,expoente_q) 
    //                     :''
    // (expoente_p >0 ? 
    //     expoente_p ==1 ?'p' : 'p<sup>'+expoente_p+'</sup>' 
    // :'')

})
