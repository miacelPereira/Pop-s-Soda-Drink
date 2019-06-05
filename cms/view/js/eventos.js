$(document).ready(function(){
   
    listEvento();
});
$(".icon1").click(function(){

    //    alert(location.href)
        $.ajax({
            type: "GET",
            url: "modal/eventos-modal.php",
            success: function(dados){
                $("#modal").html(dados)
            }
        });
        
        $("#back-modal").fadeIn(400);
    
});

$(".caixa-btn").click(function(){

    //    alert(location.href)
        $.ajax({
            type: "GET",
            url: "modal/CadastrarEventos-modal.php",
            success: function(dados){
                $("#modal").html(dados)
            }
        });
        
        $("#back-modal").fadeIn(400);
    
});
function listEvento(){
    $.ajax({
                
        type: "GET",
        url: "content/listEvento.php",
        success: function(data){

            $('#container_evento').html(data);
        }
    });
}

function deletar(id){
    
    if(id > 1){
        if(confirm("Deseja realmente excluir o evento de ID "+id+"?")){
            
            $.ajax({
                type: "GET",
                url: "../router.php?controllereventos=evento&action=delete&id="+id,
                success: function(data){
                    
                    console.log(data);
                    if(data == 1){
                        alert("DELETADO COM SUCESSO!");
                    }else{
                        console.log(data);
                        alert("ERRO AO DELETAR! \n \n "+ data);
                    }
                    listEvento();
                }
            });
        };
    
    }
}
function evento(id){

    $.ajax({
        type: "GET",
        url: "modal/eventos-modal.php?id="+id,
        success: function(data){
            $("#modal").html(data);
        }
    });

    $("#back-modal").css('display', 'flex');
}