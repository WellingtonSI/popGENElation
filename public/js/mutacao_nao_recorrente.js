$(document).on('click','.btnCalcular', function(){

    var geracao = parseFloat((document.querySelector("#geracao")).value);
    
    if(isNaN(geracao) ){
        swal.fire("Atenção!", "Selecione uma geração",'error');
    }else{
        //fiz essa chamada só pelo fato do javascript ter problema com valores muito pequenos.
        $.ajax({
            type: 'GET',
            url:  window.location.origin+"/mutacao/nao-recorrente/perda-alelos/"+geracao,
            success: function($data) {
                $('#resultado').empty();
                $('#geracao').val("");
                $('#resultado').append("</br><h5>Perdas na geração "+geracao+"º</h5><strong><span  style='font-size:20px'>"+$data+"</span></strong>");
            },
            error: function(error) {
                swal.fire("Atenção!", "Não foi possível realizar os cálculos, tente novamente mais tarde", "error");
            },
        });
    }
       
});