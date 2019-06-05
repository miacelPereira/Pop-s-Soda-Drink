<?php
    require_once("../../require.php");
    reqLojas();

    $controller = new LojaController();

    $list = $controller->getAll();
    foreach($list as $loja){
?>
    <div class="row">
        <div class="conteudo"> <?php echo substr($loja->getNome(), 0, 12)."..."; ?> </div>
        <div class="conteudo"> <?php echo substr($loja->getEndereco(), 0, 12)."..."; ?> </div>
        <div class="conteudo"> <?php echo substr($loja->getUf(), 0, 12)."..."; ?> </div>
        <div class="conteudo-img">
            <div class="icon1" onclick="openView(<?php echo $loja->getId() ?>)"></div>
            <div class="icon4">
            <?php if($loja->getAtivo() == 1){ ?>
                    <img onclick="disable(<?php echo ($loja->getId().",".$loja->getAtivo()) ?>)" src="img/ativo.png" style="max-width: 55px;"  alt="ativado" title="ativado">
                <?php }else{ ?>
                    <img onclick="disable(<?php echo ($loja->getId().",".$loja->getAtivo()) ?>)" src="img/desativado.png" style="max-width: 55px;"  alt="desativo" title="desativo">
                <?php } ?>
            </div>
        </div>
    </div>
<?php } ?>