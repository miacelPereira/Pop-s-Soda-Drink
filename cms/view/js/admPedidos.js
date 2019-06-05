$(".icon1").click(function(){
    $.ajax({
        type: "GET",
        url: "modal/pedidos-modal.html",
        success: function(dados){
            $("#modal").html(dados)
        }
    });
    
    $("#back-modal").fadeIn(400);

});
