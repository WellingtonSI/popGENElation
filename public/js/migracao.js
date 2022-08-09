$("#q0").inputmask({mask: "9.999"});
$("#qm").inputmask({mask: "9.999"});
$(document).on('click','.btnCalcular', function(){

    var q0 = document.querySelector('#q0').value;
    var qm = document.querySelector('#qm').value;
    var nm = document.querySelector('#nm').value;
    var popy = document.querySelector('#popy').value;
    var popx = document.querySelector('#popx').value;
    
    if(popx===''){
        swal.fire("Atenção!", "Preencha o campo de Quantidade da População X",'error');}
    else if(popy===''){
        swal.fire("Atenção!", "Preencha o campo de Quantidade da População Y",'error');}
    else if(nm===''){
        swal.fire("Atenção!", "Preencha o campo de Número de Migrantes",'error');}
    else if(q0===''){
        swal.fire("Atenção!", "Preencha  o campo de Frequência de Não – Migrantes",'error');}
    else if(qm===''){
        swal.fire("Atenção!", "Preencha  o campo de Frequência de Migrantes",'error');}
    else if(q0>1){
        swal.fire("Atenção!", "O campo Frequência de Não – Migrantes não pode ser maior que 1",'error');}
    else if(qm>1){
        swal.fire("Atenção!", "O campo Frequência de Migrantes não pode ser maior que 1",'error');}
    else{
           //fiz essa chamada só pelo fato do javascript ter problema com valores muito pequenos.
           $.ajax({
                type: 'GET',
                url:  window.location.origin+"/migracao/calc",
                data: {
                    'popx':popx,
                    'popy':popy,
                    'q0':q0,
                    'qm':qm,
                    'nm':nm
                },
                success: function($data) {
                    $('#resultado').empty();
                    $('#resultado').append("</br><h5>Frequência na População Mista</h5><strong><span  style='font-size:20px'>"+ Number($data).toFixed(3)+"</span></strong>");
                },
                error: function(error) {
                    swal.fire("Atenção!", "Não foi possível realizar os cálculos, tente novamente mais tarde", "error");
                },
            });
       

    }
       
});
