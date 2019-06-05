$(document).ready(function(){
   
    listEventoAdm();
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
function listEventoAdm(){
    $.ajax({
                
        type: "GET",
        url: "content/listEventoAdm.php",
        success: function(data){

            $('#container_evento_adm').html(data);
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
                    listEventoAdm();
                }
            });
        };
    
    }
}
function inserir(id){
    
    if(id > 1){
        if(confirm("Deseja realmente excluir o evento de ID "+id+"?")){
            
            $.ajax({
                type: "GET",
                url: "../router.php?controllereventos=evento&action=delete&id="+id,
                success: function(data){
                    
                    console.log(data);
                    if(data == 1){
                        alert("DELETADO COM SUCESSO!");
                         listEventoAdm();
                    }else{
                        console.log(data);
                        alert("ERRO AO DELETAR! \n \n "+ data);
                    }         
                }
            });
        };
    
    }
}
function visuzalizarEvento(id){

    $.ajax({
        type: "GET",
        url: "modal/eventos-modal.php?id="+id,
        success: function(data){
            $("#modal").html(data);
        }
    });

    $("#back-modal").css('display', 'flex');
}
function editarEvento(id){

    $.ajax({
        type: "GET",
        url: "modal/novoEvento.php?id="+id,
        success: function(data){
            $("#modal").html(data);
        }
    });

    $("#back-modal").css('display', 'flex');
}
$('#router').submit(function(){

        //Cancela o submit do HTML
        event.preventDefault();
            
        var link = "../router.php?controllereventos=evento&action=insert";
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
                
                if(data == "1"){
                    alert("REGISTRADO COM SUCESSO!");
                }else{
                    alert("FALHA AO REGISTRAR \n \n DATA: " + data);
                }
                listEventoAdm();
            }

        });

    });
$('#routerEditar').submit(function(){

        //Cancela o submit do HTML
        event.preventDefault();
    
        console.log("teste:" + $('#routerEditar').data('id'));
        var idItem = $('#routerEditar').data('id');
            
        var link = "../router.php?controllereventos=evento&action=update&id="+idItem;
         $.ajax({
            type: "POST",
            url: link,
            data: new FormData($('#routerEditar')[0]),
            cache: false,
            contentType: false,
            processData: false,
            async: true,
            success: function(data){
            
                console.log(data);
                
                if(data == "1"){
                    alert("REGISTRADO COM SUCESSO!");
                }else{
                    alert("FALHA AO REGISTRAR \n \n DATA: " + data);
                }
                listEventoAdm();
            }

        });

    });
