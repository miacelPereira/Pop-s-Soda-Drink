$(document).ready(function(){
    loadList();
});

function loadList(){
    $.ajax({
        type: "GET",
        url: "content/list_estabelecimento.php",
        success: function(dados){
            $("#list_estabelecimentos").html(dados)
        }
    })
}

function openView(idRegistro){
    $.ajax({
        type: "POST",
        url: "modal/estabelecimento-modal.php",
        data:{id:idRegistro},
        success: function(dados){
            $("#modal").html(dados)
        }
    });
    $("#back-modal").fadeIn(400);
}

function deleteDivulgacao(idRegistro){
    if(confirm("Deseja apagar a divulgação do estabelecimento?")){
        $.ajax({
            type: "POST",
            url: "../router.php?controller=divulgacao&action=delete",
            data: {id:idRegistro},
            success: function(data){
                alert("Deletado com sucesso!");
                loadList();
            }
        });
    }
}
function disableDivulgacao(idRegistro, ativoRegistro){
    $.ajax({
        type: "POST",
        url: "../router.php?controller=divulgacao&action=disable",
        data: {id:idRegistro,
               ativo: ativoRegistro},
        success: function(data){
            if(ativoRegistro == 0){
                alert("Evento ativado");    
            }else{
                alert("Evento desativado");
            }
            
            loadList();
        }
    });
}
