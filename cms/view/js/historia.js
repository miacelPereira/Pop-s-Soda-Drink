$(document).ready(function(){
    loadList();

});

function loadList(){
    $.ajax({
        type: "GET",
        url: "content/list_historia.php",
        success: function(dados){
            $("#container-list").html(dados)
        }
    })
}

function openNew(){
    $.ajax({
        type: "POST",
        url: "modal/historia-add-modal.html",
        success: function(dados){
            $("#modal").html(dados)
        }
    });
    $("#back-modal").fadeIn(400);
}

function openEdit(id){
    $.ajax({
        type: "POST",
        url: "modal/historia-edit-modal.php",
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
        url: "modal/historia-modal.php",
        data:{id:idRegistro},
        success: function(dados){
            $("#modal").html(dados)
        }
    });
    $("#back-modal").fadeIn(400);
}

function deleteHistoria(idRegistro){
    if(confirm("Deseja apagar esse registro?")){
        $.ajax({
            type: "POST",
            url: "../router.php?controller=historia&action=delete",
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
        url: "../router.php?controller=historia&action=disable",
        data: {id:idRegistro,
               ativo: ativoRegistro},
        success: function(data){
            alert("História ativada");    
            
            loadList();
        }
    });
}
function messageBlock(){
    alert("Não é possível desativar esse registro pois não existe um outro registro ativado");
}
