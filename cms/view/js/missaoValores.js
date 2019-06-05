$(document).ready(function(){
    loadList();

});

function loadList(){
    $.ajax({
        type: "GET",
        url: "content/list_missaoValor.php",
        success: function(dados){
            $("#container-list").html(dados)
        }
    })
}

function openView(idRegistro){
    $.ajax({
        type: "POST",
        url: "modal/missaoValores-modal.php",
        data:{id:idRegistro},
        success: function(dados){
            $("#modal").html(dados)
        }
    });
    $("#back-modal").fadeIn(400);
}
// CRIEI PARA CADASTRAR NOVO -- NAO TERMINADO 
function newContent (idRegistro){
    $.ajax({
        type: "POST",
        url: "modal/cadastrarMissaoValores-modal.php",
        data:{id:idRegistro},
        success: function(dados){
            $("#modal").html(dados)
        }
    });
    $("#back-modal").fadeIn(400);
}


function deleteMissao(idRegistro){
    if(confirm("Deseja apagar esse registro?")){
        $.ajax({
            type: "POST",
            url: "../router.php?controller=missao&action=delete",
            data: {id:idRegistro},
            success: function(data){
                alert("Deletado com sucesso!");
                loadList();
            }
        });
    }
}

function openNew(){
    $.ajax({
        type: "POST",
        url: "modal/missao-add-modal.html",
        success: function(dados){
            $("#modal").html(dados)
        }
    });
    $("#back-modal").fadeIn(400);
}

function openEdit(id){
    $.ajax({
        type: "POST",
        url: "modal/missao-edit-modal.php",
        data: {id:id},
        success: function(dados){
            $("#modal").html(dados)
        }
    });
    $("#back-modal").fadeIn(400);
}

function disable(idRegistro, ativoRegistro){
    $.ajax({
        type: "POST",
        url: "../router.php?controller=missao&action=disable",
        data: {id:idRegistro,
               ativo: ativoRegistro},
        success: function(data){
            alert("Missão, visão e valores ativada");    
            loadList();
        }
    });
}
function messageBlock(){
    alert("Não é possível desativar esse registro pois não existe um outro registro ativado");
}
