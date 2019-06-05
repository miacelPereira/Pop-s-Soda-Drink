<?php


if(isset($_GET['id'])){

    require_once('../../require.php');
    reqBrinde();
    
    $brindeController = new BrindeController();
    
    $brinde = $brindeController->getBrinde($_GET['id']);
    $brindeUpdate = $brindeController->updateBrinde($_GET['id']);
}else{
    echo("id não informado corretamente");
}

?>
<!-- **************************************************************************** -->

<div class="modal" style="text-align: center;">
        <div class="fechar">X</div>
       <h1 style="text-align: center; font-size: 25px">Brinde</h1>
       
      <form data-id="<?php echo($_GET['id']);?>" name="frmBrinde" id="form" method="POST" enctype="multipart/form-data"> 
        <div class="caixa">
                <div class="txt"> <h3 >Nome do produto:</h3></div>
                <input type="text" name="txtNome" value="<?php echo $brinde->getNome(); ?>">
        </div>
        <div class="caixa">
                <div class="txt"> <h3 >Preço do produto:</h3></div>
                <input type="text" name="txtPreco" value="<?php echo $brinde->getPreco(); ?>">
            </div>
        <div class="caixa" style="width: 100%">
            <div class="txt"> <h3 >Breve Descrição:</h3></div>
            <textarea name="txtDescricao" id="" style="height: 100px; width: 100%" maxlength="10"><?php echo $brinde->getDescricao(); ?> </textarea>
        </div>
        
            <div class="caixa-file">
                <div class="img-file">
                    <img class="img-file" src="<?php echo str_replace($_SERVER['DOCUMENT_ROOT'], "", $brinde->getFoto())?>"/>
               </div>
                <input type="file" name="flImg" value="<?php echo $brinde->getFoto(); ?>">
            </div>
            <div class="btn-enviar">
                <input type="submit" value="Salvar">
            </div> 
        </form>
</div>
<script>

$('#form').submit(function(){

    event.preventDefault();

    console.log("teste:" + $('#form').data('id'));
    var id_brinde = $('#form').data('id');

   

    var link = "../router.php?controller=brinde&action=update&id="+id_brinde;

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
            // listUsers();
        }
    });


});


</script>


<!-- **************************************************************************** 

<div class="modal" style="text-align: center;">
    <div class="fechar">X</div>
   <h1 style="text-align: center; font-size: 25px">Brinde</h1>
   <div class="caixa">
           <div class="txt"> <h3 >Nome do produto:</h3></div>
           <div class="txt"> <?php echo $brinde->getNome(); ?></div>
   </div>
   <div class="caixa">
        <div class="txt"> <h3 >Preço do produto:</h3></div>
        <div class="txt"><?php echo $brinde->getPreco(); ?></div>
    </div>
   <div class="caixa" style="width: 100%">
       <div class="txt"> <h3 >Breve Descrição:</h3></div>
       <textarea style="width: 100%" disabled><?php echo $brinde->getDescricao(); ?></textarea>
   </div>
   
    <div class="caixa-file">
        <div class="img-file"></div>
    </div>
</div>
-->