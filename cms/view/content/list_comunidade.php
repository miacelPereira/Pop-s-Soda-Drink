<?php

    require_once("../../require.php");
    reqComunidadeCms();

    $controller = new comunidadeController();

    $list = $controller->listarComunidade();
    foreach($list as $comunidade){
        
?>

<div class="row">
    <div class="conteudo"><?php echo $comunidade->getNomeUser(); ?></div>
    <div class="conteudo-img">
        <div class="icon1" onclick="openView(<?php echo $comunidade->getId() ?>)"></div>
        <div class="icon2" onclick="deletePost(<?php echo $comunidade->getId() ?>)"></div>
        <div class="icon4">
            <?php if($comunidade->getAtivo() == 0){
                ?>
                <img onclick="disablePost(<?php echo($comunidade->getId().",".$comunidade->getAtivo()) ?>)" src="img/desativado.png" style="max-width: 55px;" alt="desativado" title="desativado">
            <?php }else{ ?>
                <img onclick="disablePost(<?php echo($comunidade->getId().",".$comunidade->getAtivo()) ?>)" src="img/ativo.png" style="max-width: 55px;" alt="ativado" title="ativado">
            <?php } ?>
        </div>
    </div>
</div>
<?php } ?>