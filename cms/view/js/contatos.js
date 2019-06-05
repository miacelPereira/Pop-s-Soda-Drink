$(document).ready(function(){
   
    listContato();
});
function listContato(){
    $.ajax({
                
        type: "GET",
        url: "content/listContatos.php",
        success: function(data){

            $('#container_contatos').html(data);
        }
    });
}

function deletar(id){
    
    if(id > 1){
        if(confirm("Deseja realmente excluir a permissão de ID "+id+"?")){
            
            $.ajax({
                type: "GET",
                url: "../router.php?controllercontatos=contato&action=delete&id="+id,
                success: function(data){
                    
                    console.log(data);
                    if(data == 1){
                        alert("DELETADO COM SUCESSO!");
                    }else{
                        console.log(data);
                        alert("ERRO AO DELETAR! \n \n "+ data);
                    }
                    listContato();
                }
            });
        };
    
    }
}