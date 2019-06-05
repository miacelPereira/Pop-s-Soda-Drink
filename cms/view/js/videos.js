$(document).ready(function(){
   
    listVideo();
});
$(".icon1").click(function(){

    //    alert(location.href)
        $.ajax({
            type: "GET",
            url: "modal/videos-modal.php",
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
            url: "modal/cadastrarVideos-modal.html",
            success: function(dados){
                $("#modal").html(dados)
            }
        });
        
        $("#back-modal").fadeIn(400);
    
});
function listVideo(){
    $.ajax({
                
        type: "GET",
        url: "content/listVideos.php",
        success: function(data){

            $('#container_video').html(data);
        }
    });
}

function deletar(id){
    
    if(id > 1){
        if(confirm("Deseja realmente excluir a permissão de ID "+id+"?")){
            
            $.ajax({
                type: "GET",
                url: "../router.php?controllervideos=video&action=delete&id="+id,
                success: function(data){
                    
                    console.log(data);
                    if(data == 1){
                        alert("DELETADO COM SUCESSO!");
                    }else{
                        console.log(data);
                        alert("ERRO AO DELETAR! \n \n "+ data);
                    }
                    listVideo();
                }
            });
        };
    
    }
}
function visualizar(id){

    $.ajax({
        type: "GET",
        url: "modal/videos-modal.php?id="+id,
        success: function(data){
            $("#modal").html(data);
        }
    });

    $("#back-modal").css('display', 'flex');
}