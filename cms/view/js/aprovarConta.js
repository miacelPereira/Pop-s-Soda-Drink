$(".icon1").click(function(){
        $.ajax({
            type: "GET",
            url: "modal/aprovarConta-modal.html",
            success: function(dados){
                $("#modal").html(dados)
            }
        });
        
        $("#back-modal").fadeIn(400);
    
    });
