$("#frm-login").submit(function(){

    event.preventDefault();

    $.ajax({
        type: "POST",
        url: "../../router.php?controller=login&action=login",
        data: new FormData($('#frm-login')[0]),
        cache: false,
        contentType: false,
        processData: false,
        async: true,
        success: function(data){

            if(data != 0){
                window.location.href = "../";
            }else{
                $("#login-failed").show();
            }
        }

    });
});

$("#register").click(function(){

    $(".box-login").fadeOut(200);
    $('.box-register').show(0, teste());   

    function teste(){
        setTimeout(function(){$('.box-register').attr("class", "box-register start-animation")}, 250);
    }
    
})

$("#txt-cep").focusout(function(){
    $.ajax({
        url: `https://viacep.com.br/ws/${$(this).val()}/json/`,
        async: true,
        success: function(data){
            $("#txt-endereco").val(data.logradouro)
            $("#txt-bairro").val(data.bairro)
            $("#txt-cidade").val(data.localidade)
            $("#txt-uf").val(data.uf)
            $("#txt-numero").focus();
        }
    })
})

$("#frm-register").submit(function(){

    event.preventDefault();

    $.ajax({
        type: "POST",
        url: "../../router.php?controller=login&action=register",
        data: new FormData($('#frm-register')[0]),
        cache: false,
        contentType: false,
        processData: false,
        async: true,
        success: function(data){

            if(data == 1){
                
                window.location.href = "../waiting.php";
            }else{
                alert("Ops! Houve algum problema com seu cadastro. \n \n Por favor, tente novamente mais tarde.")
                console.log(data);
            }
        }

    });
});

$(".nav-item").mouseover(function(){
    $(this).attr("class", "nav-item nav-item-hover")
    $("#header").css("background-color", "#b685e0")
    $("#header").css("transition", ".25s")
    // $("#header-username").css("color", "#421a65")
})

$(".nav-item").mouseout(function(){
    $(this).attr("class", "nav-item")
    $("#header").css("background-color", "#421a65")
    // $("#header-username").css("color", "#f2f2f2")
})