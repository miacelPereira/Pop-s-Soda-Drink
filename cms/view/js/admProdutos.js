$(document).ready(function(){
    listProduto();
});

function newProduto(){ 
    $.ajax({
        type: "GET",
        url: "modal/cadastrarProduto2.php",
        success: function(data){
            $("#modal").html(data)
        }
    });
    
    $("#back-modal").fadeIn(400);
}

function viewProduto(id){
   $.ajax({
        type: "POST",
        url: "modal/produto-modal.php",
        data: {id:id},
        success: function(data){
            $("#modal").html(data)
        }
    });
    $("#back-modal").fadeIn(400); 
}

function listProduto() {
    $.ajax({         
        type: "GET",
        url: "content/listProduto.php",
        success: function(data){
            $('.tbl-row').remove();
            $('.tabela').append(data);
        }
    });
}

function deleteProduto(id) {
    $.ajax({    
        type: "GET",
        url: "../router.php?controller=produto&action=delete&id="+id,
        success: function(data){
            alert('Deletado com sucesso!');
            listProduto();
        }
    });
}

function deleteMateria(id, nome) {
    
    if(confirm("Tem certeza que deseja excluir "+nome+"?")){
    
        $.ajax({
            
            type: "GET",
            url: "../router.php?controller=matprima&action=delete&id="+id,
            success: function(data){
                
                if(data == 1){
                    alert("CADASTRO APAGADO COM SUCESSO!");
                }else{
                    console.log(data);
                    alert("FALHA AO EXCLUIR! \n \n Tente novamente mais tarde.");
                }
            }
        });
        
        listMateriaPrima();

    }
    
}

function btnEditSubmit(){
    
    var input = $('#btn-edit-sub');
    var inputSub = $('#btn-edit-sub2');

    $("*").removeAttr("disabled")

    input.hide();
    inputSub.show();
}