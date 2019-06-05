<?php
    if(isset($_POST['id'])){   
        require_once('../../require.php');
        reqComunidadeCms();
        $controller = new ComunidadeController();
        $comunidade = $controller->comunidade($_POST['id']);
    }
?>

<div class="modal" style="text-align: center;">
    <div class="fechar">X</div>
   <h1 style="text-align: center; font-size: 25px">Chamado para:</h1>
   <div class="caixa">
           <div class="txt"> <h3 >Nome do Publicante:</h3></div>
           <div class="txt"> <?php echo $comunidade->getNomeUser() ?></div>
   </div>
    <div class="caixa">
            <div class="txt"> <h3 >Email do Publicante:</h3></div>
            <div class="txt"> <?php echo $comunidade->getEmailUser() ?></div>
    </div>
    <div class="caixa"  style="width: 100%">
            <div class="txt"> <h3 >Curtidas:</h3></div>
            <div class="txt"> <?php echo $comunidade->getCurtidas() ?></div>
    </div>
   <div class="caixa" style="width: 100%">
       <div class="txt"> <h3 > Post:</h3></div>
       <textarea name="txtDescricaoChamado"  disabled style="width: 100%" id="" cols="30" rows="10"><?php echo $comunidade->getPost() ?></textarea>
   </div>
</div>


