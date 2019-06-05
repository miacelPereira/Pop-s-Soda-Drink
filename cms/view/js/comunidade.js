
function openView(idRegistro){
    $.ajax({
        type: "POST",
        url: "modal/comunidade-modal.php",
        data:{id:idRegistro},
        success: function(dados){
            $("#modal").html(dados)
        }
    });
    $("#back-modal").fadeIn(400);
}

$(document).ready(function(){
    loadList();

});

function loadList(){
    $.ajax({
        type: "GET",
        url: "content/list_comunidade.php",
        success: function(dados){
            $("#list_comunidade").html(dados)
        }
    })
}

function deletePost(idRegistro){
    if(confirm("Deseja apagar o post da comunidade ?")){
        $.ajax({
            type: "POST",
            url: "../router.php?controller=comunidade&action=delete",
            data: {id:idRegistro},
            success: function(data){
                alert("Deletado com sucesso!");
                loadList();
            }
        });
    }
}
function disablePost(idRegistro, ativoRegistro){
    $.ajax({
        type: "POST",
        url: "../router.php?controller=comunidade&action=disable",
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