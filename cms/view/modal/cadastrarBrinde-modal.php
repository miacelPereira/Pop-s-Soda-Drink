<?php

    require_once('../../require.php');
    reqBrinde();
    
    $brindeController = new BrindeController();

    
    //$brinders = $brindeController->getBrinde();
    
    $brinde = $brindeController->insertBrinde();
    //$brindeUpdate = $brindeController->updateBrinde($_GET['id']);

?>


<div class="modal" style="text-align: center;">
        <div class="fechar">X</div>
       <h1 style="text-align: center; font-size: 25px">Brinde</h1>
       
      <form name="frmBrinde" id="form" method="POST" enctype="multipart/form-data"> 
        <div class="caixa">
                <div class="txt"> <h3 >Nome do produto:</h3></div>
                <input type="text" name="txtNome">
        </div>
        <div class="caixa">
                <div class="txt"> <h3 >Preço do produto:</h3></div>
                <input type="text" name="txtPreco">
            </div>
        <div class="caixa" style="width: 100%">
            <div class="txt"> <h3 >Breve Descrição:</h3></div>
            <textarea name="txtDescricao" id="" style="height: 100px; width: 100%" maxlength="10"> </textarea>
        </div>
        
            <div class="caixa-file">
            <div class="img-file">
                <img class="img-file" /></div>  <br>
                <input type="file" name="flImg" value="Escolha um arquivo...">
            </div>
            <div class="btn-enviar">
                <input type="submit" value="Salvar">
            </div> 
        </form>
</div>
<script>

$('#form').submit(function(){

    event.preventDefault();

    var link = "../router.php?controller=brinde&action=insert";

    $.ajax({

        type: "POST",
        url: link,
        data: new FormData($('#form')[0]),
        cache: false,
        contentType: false,
        processData: false,
        async: true,
        success: function(data){
        
            console.log("AQUI" + data);
            
            if(data == "1"){
                alert("REGISTRADO COM SUCESSO!");
                listBrinde();
            }else{
                alert("FALHA AO REGISTRAR \n \n DATA: " + data);
            }
            $('#back-modal').fadeOut(200);
            listBrinde();
        }
    });


});


</script>