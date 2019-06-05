$(document).ready(function(){
    loadList();
});

function loadList(){
    $.ajax({
        type: "GET",
        url: "content/list_parceiro.php",
        success: function(dados){
            $("#container-list").html(dados)
        }
    })
}

function openNew(){
    $.ajax({
        type: "POST",
        url: "modal/CadastrarParceiros-modal.html",
        success: function(dados){
            $("#modal").html(dados)
        }
    });
    $("#back-modal").fadeIn(400);
}

function openView(idRegistro){
    $.ajax({
        type: "POST",
        url: "modal/parceiros-modal.php",
        data:{id:idRegistro},
        success: function(dados){
            $("#modal").html(dados)
        }
    });
    $("#back-modal").fadeIn(400);
}

function openEdit(idRegistro){
    $.ajax({
        type: "POST",
        url: "modal/parceiros-edit-modal.php",
        data:{id:idRegistro},
        success: function(dados){
            $("#modal").html(dados)
        }
    });
    $("#back-modal").fadeIn(400);
}

function deleteParceiro(idRegistro){
    if(confirm("Deseja apagar esse registro?")){
        $.ajax({
            type: "POST",
            url: "../router.php?controller=parceiro&action=delete",
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
        url: "../router.php?controller=parceiro&action=disable",
        data: {id:idRegistro,
               ativo: ativoRegistro},
        success: function(data){
            if(ativoRegistro == 0){
                alert("Patrocinado visível");    
            }else{
                alert("Patrocinado ocultado");
            }
            loadList();
        }
    });
}
$('.fechar').click(function(){
    $("#back-modal").fadeIn(400);
});

