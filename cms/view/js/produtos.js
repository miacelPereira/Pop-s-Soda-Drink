$(document).ready(function(){
    loadList();

});

function loadList(){
    $.ajax({
        type: "GET",
        url: "content/list_produto.php",
        success: function(dados){
            $("#container-list").html(dados);
        }
    })
}

function disable(id, ativo){
    $.ajax({
        type: "POST",
        url: "../router.php?controller=produto&action=disableProduto",
        data: {id:id,
               ativo: ativo},
        success: function(data){
            if(ativo == 0){
                alert("Produto ativado");    
            }else{
                alert("Produto desativado");
            }
            loadList();
        }
    });
}

function openView(id){
    $.ajax({
        type: "POST",
        url: "modal/produto-modal.php",
        data: {id:id},
        success: function(dados){
            $("#modal").html(dados)
        }
    });
    
    $("#back-modal").fadeIn(400);
    
}