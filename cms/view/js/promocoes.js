$(document).ready(function(){
    loadList();

});

function loadList(){
    $.ajax({
        type: "GET",
        url: "content/list_promocao.php",
        success: function(dados){
            $("#container-list").html(dados);
        }
    })
}

function openView(id){
    $.ajax({
        type: "POST",
        url: "modal/promocoes-modal.php",
        data: {id:id},
        success: function(dados){
            $("#modal").html(dados);
        }
    });
    
    $("#back-modal").fadeIn(400);

}

function deletePromo(id){
    if(confirm("Deseja apagar esse registro?")){
        $.ajax({
            type: "POST",
            url: "../router.php?controller=promocao&action=delete",
            data: {id:id},
            success: function(data){
                alert("Deletado com sucesso!");
                loadList();
            }
        });
    }
}
function openEdit(id){
    $.ajax({
        type: "POST",
        url: "modal/promocoes-edit-modal.php",
        data: {id:id},
        success: function(dados){
            $("#modal").html(dados);
        }
    });
    
    $("#back-modal").fadeIn(400);
}


function disable(id, ativo){
    $.ajax({
        type: "POST",
        url: "../router.php?controller=promocao&action=disable",
        data: {id:id,
               ativo: ativo},
        success: function(data){
            if(ativo == 0){
                alert("Promoção ativada");    
            }else{
                alert("Promoção desativada");
            }
            loadList();
        }
    });
}

$(".caixa-btn").click(function(){

    $.ajax({
        type: "GET",
        url: "modal/cadastrarPromocao-modal.php",
        success: function(dados){
            $("#modal").html(dados);
        }
    });
    
    $("#back-modal").fadeIn(400);
    
});