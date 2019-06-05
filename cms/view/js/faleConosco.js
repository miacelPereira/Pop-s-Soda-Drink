$(document).ready(function(){
   
    listFale();
});

$(".icon1").click(function(){

    //    alert(location.href)
        $.ajax({
            type: "GET",
            url: "modal/faleConosco-modal.php",
            success: function(dados){
                $("#modal").html(dados)
            }
        });
        
        $("#back-modal").fadeIn(400);
    
    });
    
    $(".fechar").click(function(){
        // $("#back-modal").fadeOut(400);
        alert ("taa");
       
    });

       $('#router').submit(function(){

        //Cancela o submit do HTML
        event.preventDefault();
            
        var link = "../router.php?controllerfale=mensagem&action=insert";
         $.ajax({
            type: "POST",
            url: link,
            data: new FormData($('#router')[0]),
            cache: false,
            contentType: false,
            processData: false,
            async: true,
            success: function(data){
            
                console.log(data);
                
                if(data == 1){
                    alert("REGISTRADO COM SUCESSO!");
                }else{
                    alert("FALHA AO REGISTRAR \n \n DATA: " + data);
                }

            }

        });

    });

function listFale(){
    $.ajax({
                
        type: "GET",
        url: "content/listFale.php",
        success: function(data){

            $('#linha_fale').html(data);
        }
    });
}
function deletar(id){
    
    if(id > 1){
        if(confirm("Deseja realmente excluir a permissão de ID "+id+"?")){
            
            $.ajax({
                type: "GET",
                url: "../router.php?controllerfale=mensagem&action=delete&id="+id,
                success: function(data){
                    
                    console.log(data);
                    if(data == 1){
                        alert("DELETADO COM SUCESSO!");
                    }else{
                        console.log(data);
                        alert("ERRO AO DELETAR! \n \n "+ data);
                    }
                    listFale();
                }
            });
        };
    
    }
}
function showViewUserModal(id){

    $.ajax({
        type: "GET",
        url: "modal/faleConosco-modal.php?id="+id,
        success: function(data){
            $("#modal").html(data);
        }
    });

    $("#back-modal").css('display', 'flex');
}