<?php 
    require_once("../../require.php");
    reqMissaoValor();

    $controller = new MissaoValorController();

    $list = $controller->getAll();
    foreach($list as $missao){
?>
    <div class="row">
        <div class="conteudo"><?php echo substr($missao->getMissao(), 0, 12)."..." ?></div>
        <div class="conteudo"><?php echo substr($missao->getVisao(), 0, 12)."..." ?></div>
        <div class="conteudo"><?php echo substr($missao->getValor(), 0, 12)."..."; ?></div>
        <div class="conteudo-img">
            <div onclick="openView(<?php echo $missao->getId() ?>)" class="icon1"></div>
            <div onclick="deleteMissao(<?php echo $missao->getId() ?>)" class="icon2"> </div>
            <div class="icon3" onclick="openEdit(<?php echo $missao->getId() ?>)"></div>
            <div class="icon4">

                <?php 
                    if($missao->getAtivo() == 1){
                ?>
                    <img onclick="messageBlock()" src="img/ativo.png" style="max-width: 55px;"  alt="ativado" title="ativado">
                <?php }else{ ?>
                    <img onclick="disable(<?php echo $missao->getId().",".$missao->getAtivo() ?>)" src="img/desativado.png" style="max-width: 55px;"  alt="desativado" title="desativado">
                <?php }  ?>
            </div>
        </div>
    </div>
<?php } ?>