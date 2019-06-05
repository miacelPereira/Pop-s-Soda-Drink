$(document).ready(function(){
    console.log('enquete.html');
    listEnquete()

    
});

    $.ajax({
        type:"GET",
        url:"content/listEnquete.php",
        success: function(data){
            $('.row-body').html(data);
        }
    });


function listEnquete(){

$.ajax({
    type:"GET",
    url:"content/listEnquete.php",
    success: function(data){
        $('.row').html(data);
    }
});
}



$(".caixa-btn").click(function(){

        $.ajax({
            type: "GET",
            url: "modal/cadastroEnquete.php",
            success: function(dados){
                $("#modal").html(dados)
            }
        });
        
        $("#back-modal").fadeIn(400);
    
    });



function viewEnquete(id){
    $.ajax({
        type: "GET",
        url: "modal/enquete-vizu.php?id="+id,
        success: function(dados){
            $("#modal").html(dados)
        }
    });
    
    $("#back-modal").fadeIn(400);

}

function editEnquete(id){

    $.ajax({
        type: "GET",
        url: "modal/editEnquete-modal.php?id="+id,
        success: function(data){
            $("#modal").html(data);
        }
    });

    $("#back-modal").css('display', 'flex');
}
