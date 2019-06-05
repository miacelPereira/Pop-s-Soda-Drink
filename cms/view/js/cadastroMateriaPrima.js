$(document).ready(function(){

    listMateriaPrima();
});

$("#new-matprima").click(function(){

    $.ajax({
        type: "GET",
        url: "modal/cadastrarMateriaPrima.php",
        success: function(data){
            $("#modal").html(data)
        }
    });
    
    $("#back-modal").fadeIn(400);
});

function listMateriaPrima() {

    // alert(location.href)
    $.ajax({
                
        type: "GET",
        url: "content/listMateriaPrima.php",
        success: function(data){
            $('#linha_materia').html(data);
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
function deleteMateria(id){
    
    if(id > 1){
        if(confirm("Deseja realmente excluir o evento de ID "+id+"?")){
            
            $.ajax({
                type: "GET",
                url: "../router.php?controller=matprima&action=delete&id="+id,
                success: function(data){
                    
                    console.log(data);
                    if(data == 1){
                        alert("DELETADO COM SUCESSO!");
                    }else{
                        console.log(data);
                        alert("ERRO AO DELETAR! \n \n "+ data);
                    }
                    listMateriaPrima();
                }
            });
        };
    
    }
}
    function btnEditSubmit(){

        var input = $('#btn-edit-sub');
        var inputSub = $('#btn-edit-sub2');

        $("*").removeAttr("disabled")

        input.hide();
        inputSub.show();
    }

    $(document).ready(function(){

        //console.log("teste: "+ location)
        $.ajax({
            url: "content/select-unimedida.php",
            success(data){
                $("#sl-unimedida").append(data);
            }
        })

    })

        $('#form').submit(function(){

            //Cancela o submit do HTML
            event.preventDefault();

            var link = "../router.php?controller=matprima&action=insert";

            $.ajax({
                type: "POST",
                url: link,
                data: new FormData($('#form')[0]),
                cache: false,
                contentType: false,
                processData: false,
                async: true,
                success: function(data){
                
                    console.log(data);

                    if(data == 1){
                        alert("REGISTRADO COM SUCESSO!");
                    }else{
                        // alert(data);
                    }
                    
                    $('#back-modal').fadeOut(200);
                    listMateriaPrima();

                }

            });

        });

    $("#sl-unimedida").change(function(){
        $("#sl-0").remove()
        $("#ref-unimedida").html("Por "+$("#sl-unimedida option:selected").html())
    })