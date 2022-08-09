$("#q0").inputmask({mask: "9.999"});
$("#q1").inputmask({mask: "9.999"});
$("#qn").inputmask({mask: "9.999"});
$("#u1").inputmask({mask: "0.9{0,}"});
$("#v1").inputmask({mask: "0.9{0,}"});

$(document).on('click','.btnCalcularGeracoes', function(){


    var q0 = document.querySelector('#q0').value;
    var qn = document.querySelector('#qn').value;
    var q = document.querySelector('#q1').value;
    var u = document.querySelector('#u1').value;
    var v = document.querySelector('#v1').value;
    
    if(u==='' || Number(u)===0){
        swal.fire("Atenção!", "Preencha corretamente o campo de Taxa de Mutação de “A” p/ “a” (µ)",'error');}
    else if(v==='' || Number(v)===0){
        swal.fire("Atenção!", "Preencha corretamente o campo de Taxa de Mutação de “a” p/ “A” (v)",'error');}
    else if(q0===''){
        swal.fire("Atenção!", "Preencha o campo q<sub>0</sub>",'error');}
    else if(qn==='' ){
        swal.fire("Atenção!", "Preencha o campo q<sub>n</sub>",'error');}
    else if(q===''){
        swal.fire("Atenção!", "Preencha  o campo q",'error');}
    else if(q0>1){
        swal.fire("Atenção!", "O campo q<sub>0</sub> maior que 1",'error');}
    else if(qn>1){
        swal.fire("Atenção!", "O campo q<sub>n</sub> maior que 1",'error');}
    else if(q>1){
        swal.fire("Atenção!", "O campo q maior que 1",'error');}
    else if(q==qn){
        swal.fire("Atenção!", "O campo q e q<sub>n</sub> não podem ser iguais",'error');}
    else{
           //fiz essa chamada só pelo fato do javascript ter problema com valores muito pequenos.
           $.ajax({
                type: 'GET',
                url:  window.location.origin+"/mutacao/recorrente/calc2",
                data: {
                    'u':u,
                    'v':v,
                    'q':q,
                    'q0':q0,
                    'qn':qn
                },
                success: function($data) {
                    $('#q0').val("");
                    $('#qn').val("");
                    $('#q1').val("");
                    $('#u1').val("");
                    $('#v1').val("");
                    $('#resultado_geracoes').append("</br><h5>Quantidade de gerações</h5><strong><span  style='font-size:20px'>"+ Math.round($data)+"</span></strong>");
                },
                error: function(error) {
                    swal.fire("Atenção!", "Não foi possível realizar os cálculos, tente novamente mais tarde", "error");
                },
            });
       

    }
       
});
