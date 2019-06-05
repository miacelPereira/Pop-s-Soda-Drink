
$(document).ready(function(){
    loadList();
});

function loadList(){
    $.ajax({
        type: "GET",
        url: "content/list_noticias.php",
        success: function(dados){
            $("#container-list").html(dados)
        }
    })
}

function openNew(){
    $.ajax({
        type: "POST",
        url: "modal/CadastrarNoticias-modal.html",
        success: function(dados){
            $("#modal").html(dados)
        }
    });
    $("#back-modal").fadeIn(400);
}

function openEdit(id){
    $.ajax({
        type: "POST",
        url: "modal/noticias-edit-modal.php",
        data: {id:id},
        success: function(dados){
            $("#modal").html(dados)
        }
    });
    $("#back-modal").fadeIn(400);
}

function openView(idRegistro){
    $.ajax({
        type: "POST",
        url: "modal/noticias-modal.php",
        data:{id:idRegistro},
        success: function(dados){
            $("#modal").html(dados)
        }
    });
    $("#back-modal").fadeIn(400);
}

function deleteNoticia(idRegistro){
    if(confirm("Deseja apagar esse registro?")){
        $.ajax({
            type: "POST",
            url: "../router.php?controller=noticia&action=delete",
            data: {id:idRegistro},
            success: function(data){
                alert("Deletado com sucesso!");
                loadList();
            }
        });
    }
}

function disable(idRegistro, ativoRegistro){
    $.ajax({
        type: "POST",
        url: "../router.php?controller=noticia&action=disable",
        data: {id:idRegistro,
               ativo: ativoRegistro},
        success: function(data){
            alert("Notícia ativada");                
            loadList();
        }
    });
}
