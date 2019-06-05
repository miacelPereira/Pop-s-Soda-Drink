function openView(idRegistro){
    $.ajax({
        type: "POST",
        url: "modal/chamados-modal.php",
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
        url: "content/list_chamados.php",
        success: function(dados){
            $("#list_chamados").html(dados)
        }
    })
}

function deleteChamados(idRegistro){
    if(confirm("Deseja apagar o chamado desta empresa ?")){
        $.ajax({
            type: "POST",
            url: "../router.php?controller=chamados&action=delete",
            data: {id:idRegistro},
            success: function(data){
                alert("Deletado com sucesso!");
                loadList();
            }
        });
    }
}