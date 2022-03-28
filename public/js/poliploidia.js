$(document).ready(function($) {
    $("#p").mask("9.9");
    $("#q").mask("9.9");
    
    // q.oninput = ()=>{
    //     console.log(document.getElementById("q").value); 
    // }
    const dominante = document.querySelector('#p');
    dominante.addEventListener('blur', function(evento){
        q = document.getElementById("q").value;
        if(this.value > 1){
            swal("Atenção!", "frequência do alelo dominante maior que 1", "error");
            this.value='';
        }
        
    });
    const recessivo = document.querySelector('#q');
    recessivo.addEventListener('blur', function(evento){
        p = document.getElementById("p").value;
        if(this.value > 1)
        swal("Atenção!", "frequência do alelo recessivo maior que 1", "error");
    });

    
    $(document).on('click','.btnCalcular', function(){
        var n = parseInt(document.querySelector('#grau').value/2);
        if(n==0){
            swal("Atenção!", "Selecione o campo Grau de Ploidia (N)","error")
        }else if(dominante.value==''){
            swal("Atenção!", "Preencha o campo frequência do alelo dominante (p)","error")
        }else if(recessivo.value==''){
            swal("Atenção!", "Preencha o campo frequência do alelo recessivo (q)","error")
        }else {
            if(parseFloat(dominante.value)+parseFloat(recessivo.value )==1 ){
                $('#resultado').empty();
                var p = parseFloat(dominante.value);
                var q = parseFloat(recessivo.value);
                let expoente_p = n;
                let expoente_q = 0;
                var resultado = '';
                //2<sup>3</sup>
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
