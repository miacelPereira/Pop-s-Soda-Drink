
$(".caixa-btn").click(function(){

    //    alert(location.href)
        $.ajax({
            type: "GET",
            url: "modal/cadastrarBrinde-modal.php",
            success: function(dados){
                $("#modal").html(dados)
            }
        });
        
        $("#back-modal").fadeIn(400);
    
    });

function viewBrinde(id){
    $.ajax({
        type: "GET",
        url: "modal/brinde-vizu.php?id="+id,
        success: function(dados){
            $("#modal").html(dados)
        }
    });
    
    $("#back-modal").fadeIn(400);



}

function statusBrinde(idRegistro, ativoRegistro){

   //alert("testeeeeeeeeee"+idRegistro+ ativoRegistro);

    $.ajax({
        type: "GET",
        url: "../router.php?controller=brinde&action=status&id="+idRegistro+"&ativo="+ativoRegistro,
        data: {id:idRegistro,
            ativo: ativoRegistro},
        success: function(data){
            if(ativoRegistro == 1){
                alert("Evento desativado");    
            }else {
                alert("Evento ativado");
            }
            listBrinde();
        }

        
    });



}
