function novoRegistro(){
            
    $.ajax({
        type: "GET",
        url: "cadastro.php",
        success: function(dados){
            $("#modal").html(dados)
        }
    });
}

function showViewUserModal(id){

    $.ajax({
        type: "GET",
        url: "modal/view-usuario.php?id="+id,
        success: function(data){
            $("#modal").html(data);
        }
    });

    $("#back-modal").css('display', 'flex');
}

function editPermissao(id){

    console.log("teste");
    
    $.ajax({
        type: "GET",
        url: "modal/edit-permissao.php?id="+id,
        success: function(data){
            $("#modal").html(data);
        }
    });

    $("#back-modal").css('display', 'flex');
}

function deleteUser(id){

    if(id > 1){
        if(confirm("Deseja realmente apagar o usuário de ID "+id+"?")){
            // window.open("../router.php?controller=usuario&action=delete&id="+id, "_self");

            $.ajax({
                type: "GET",
                url: "../router.php?controller=usuario&action=delete&id="+id,
                success: function(data){
                    
                    alert("DELETADO COM SUCESSO!");
                    listUsers();
                }
            });


        }
    }
    
}

function deletePermission(id){
    if(id > 1){
        if(confirm("Deseja realmente excluir a permissão de ID "+id+"?")){
            
            $.ajax({
                type: "GET",
                url: "../router.php?controller=permissao&action=delete&id="+id,
                success: function(data){
                    
                    console.log(data);
                    if(data == 1){
                        alert("DELETADO COM SUCESSO!");
                    }else{
                        console.log(data);
                        alert("FALHA! Verifique se nenhum usuário utiliza essa configuração.");
                    }
                    
                    listPermissions();
                }
            });
        }
    }else{
        alert("O ID não é válido.");
    }
}

function deleteBrinde(id){

    
        if(confirm("Deseja realmente apagar o brinde de ID "+id+"?")){
            // window.open("../router.php?controller=usuario&action=delete&id="+id, "_self");

            $.ajax({
                type: "GET",
                url: "../router.php?controller=brinde&action=delete&id="+id,
                success: function(data){
                    console.log(data);
                    if(data == 1){
                        alert("DELETADO COM SUCESSO!");
                    }else{
                        console.log(data);
                        alert("ERRO AO DELETAR! \n \n "+ data);
                    }
                    listBrinde();
                }
            });


        }
    
    
}

function editBrinde(id){


    $.ajax({
        type: "GET",
        url: "modal/brinde-modal.php?id="+id,
        success: function(data){
            $("#modal").html(data);
        }
    });

    $("#back-modal").css('display', 'flex');
}

    
    /*if(confirm("Deseja realmente atualizar o brinde de ID "+id+"?")){
        // window.open("../router.php?controller=usuario&action=delete&id="+id, "_self");

        $.ajax({
            type: "GET",
            url: "../router.php?controller=brinde&action=update&id="+id,
            success: function(data){
                console.log(data);
                if(data == 1){
                    alert("atualizado COM SUCESSO!");
                }else{
                    console.log(data);
                    alert("ERRO AO atualizar! \n \n "+ data);
                }
                listBrinde();
            }
        });


    }


}*/

