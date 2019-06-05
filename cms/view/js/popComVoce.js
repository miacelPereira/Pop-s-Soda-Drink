$(document).ready(function(){
    loadList();
});

function loadList(){
    $.ajax({
        type: "GET",
        url: "content/list_popComVoce.php?slide=1",
        success: function(dados){
            $(".container-list-1").html(dados);
        }
    })
    $.ajax({
        type: "GET",
        url: "content/list_popComVoce.php?slide=2",
        success: function(dados){
            $(".container-list-2").html(dados);
        }
    })
}

function openView(id){
    $.ajax({
        type: "GET",
        url: "modal/popComVoce-modal.php",
        data:{id:id},
        success: function(dados){
            $("#modal").html(dados);
        }
    });
    $("#back-modal").fadeIn(400);
}

function openEdit(id){
    $.ajax({
        type: "GET",
        url: "modal/popComVoce-modal-edit.php",
        data:{id:id},
        success: function(dados){
            $("#modal").html(dados);
        }
    });
    $("#back-modal").fadeIn(400);
}

function openAdd(id){
    $.ajax({
        type: "GET",
        url: "modal/popComVoce-modal-add.php",
        data:{id:id},
        success: function(dados){
            $("#modal").html(dados);
        }
    });
    $("#back-modal").fadeIn(400);
}

function deleteSlide(id){
    if(confirm("Deseja apagar esse registro?")){
        $.ajax({
            type: "POST",
            url: "../router.php?controller=popnaescola&action=delete",
            data: {id:id},
            success: function(data){
                alert("Deletado com sucesso!");
                loadList();
            }
        });
    }
}
function disable(id, ativo){
    $.ajax({
        type: "POST",
        url: "../router.php?controller=popnaescola&action=disable",
        data: {id:id,
               ativo:ativo},
        success: function(data){
            if(ativo == 0){
                alert('Slide ativado');
            }else{
                alert('Slide desativado');
            }
            loadList();
        }
    });
}
