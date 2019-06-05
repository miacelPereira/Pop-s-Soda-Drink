$(document).ready(function(){
    loadList();

});

function loadList(){
    $.ajax({
        type: "GET",
        url: "content/list_loja.php",
        success: function(dados){
            $("#container-list").html(dados)
        }
    })
}

function openView(idRegistro){
    $.ajax({
        type: "POST",
        url: "modal/nossasLojas-modal.php",
        data:{id:idRegistro},
        success: function(dados){
            $("#modal").html(dados)
        }
    });
    $("#back-modal").fadeIn(400);
}

function deleteLojas(idRegistro){
    if(confirm("Deseja apagar esse registro?")){
        $.ajax({
            type: "POST",
            url: "../router.php?controller=loja&action=delete",
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
        url: "../router.php?controller=loja&action=disable",
        data: {id:idRegistro,
               ativo: ativoRegistro},
        success: function(data){
            alert("Loja ativada");    
            loadList();
        }
    });
}
$(".caixa-btn").click(function(){

    //    alert(location.href)
        $.ajax({
            type: "GET",
            url: "modal/CadastrarNossasLojas-modal.html",
            success: function(dados){
                $("#modal").html(dados)
            }
        });
        
        $("#back-modal").fadeIn(400);
    
});