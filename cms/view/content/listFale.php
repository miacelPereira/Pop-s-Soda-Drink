<?php
    session_start();
    require_once($_SESSION['prefix']."require.php");
   
    reqFale();

    $listFale = new FaleConoscoController();

    $fale = $listFale->listUsuarios();
    
?>
<?php for($i = 0; $i < count($fale); $i++){ ?>
    <div class="row">
        <div class="conteudo"><?php echo $fale[$i]->getNome(); ?></div>
        <div class="conteudo"><?php echo $fale[$i]->getCategoria(); ?></div>
        <div class="conteudo"><?php echo $fale[$i]->getMensagem(); ?></div>
        <div class="conteudo-img">
            <div class="icon1" onclick="showViewUserModal(<?php echo $fale[$i]->getId(); ?>);"></div>
            <?php if($fale[$i]->getId() != 1){ ?>
            <div class="icon2" onclick="deletar(<?php echo $fale[$i]->getId(); ?>)"><?php } ?></div>         
        </div>
    </div>
<?php } ?>
