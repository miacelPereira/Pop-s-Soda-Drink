$(document).ready(function(){

    listHome();
});
$(".icon1").click(function(){

    //    alert(location.href)
        $.ajax({
            type: "GET",
            url: "modal/homeSite-modal.html",
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
            url: "modal/cadastrarHome-modal.php",
            success: function(dados){
                $("#modal").html(dados)
            }
        });
        
        $("#back-modal").fadeIn(400);
    
});

function listHome() {

    // alert(location.href)
    $.ajax({
                
        type: "GET",
        url: "content/listHome.php",
        success: function(data){
            $('#linha_home').html(data);
        }
    });
}