$(document).ready(function(){

    listProduto();
});

$("#close-modal").click(function(){
        
        $("#back-modal").fadeOut();
    });
    

$("#new-produto").click(function(){
// $(document).ready(function(){
    
    $.ajax({
        type: "GET",
        url: "modal/cadastrarProduto.php",
        success: function(data){
            $("#modal").html(data)
        }
    });
    
    $("#back-modal").fadeIn(400);
});

$("#new-matprima").click(function(){
// $(document).ready(function(){

    $.ajax({
        type: "GET",
        url: "modal/cadastrarMateriaPrima.php",
        success: function(data){
            $("#modal").html(data)
        }
    });
    
    $("#back-modal").fadeIn(400);
});

$("#new-embalagem").click(function(){
// $(document).ready(function(){
    
        $.ajax({
            type: "GET",
            url: "modal/cadastrarEmbalagem.php",
            success: function(data){
                $("#modal").html(data);

                $("#close-modal").click(function(){
                    $("#back-modal").fadeOut(400);
                });

            }
        });

        $("#back-modal").fadeIn(400);
    });

function listProduto() {

    // alert(location.href)
    $.ajax({
                
        type: "GET",
        url: "content/listProduto.php",
        success: function(data){
            $('.tbl-row').remove();
            $('.tabela').append(data);
        }
    });
}

function editMateria(id) {
    
    $.ajax({
                
        type: "GET",
        url: "modal/cadastrarMateriaPrima.php?type=edit&id="+id,
        success: function(data){
            $("#modal").html(data)
        }
    });
    
    $("#back-modal").fadeIn(400);
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