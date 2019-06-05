<?php 
    require_once("../../require.php");
    reqHistoria();

    $controller = new HistoriaController();

    $list = $controller->getAll();
    foreach($list as $historia){
?>
    <div class="row">
        <div class="conteudo"><?php echo substr($historia->getTitulo(), 0, 12)."..."; ?></div>
        <div class="conteudo"><?php echo substr($historia->getFrase(), 0, 12)."..."; ?></div>
        <div class="conteudo"><?php echo substr($historia->getPrimeiroTexto(), 0, 12)."..."; ?></div>
        <div class="conteudo-img">
            <div class="icon1" onclick="openView(<?php echo $historia->getId() ?>)"></div>
            <div class="icon2" onclick="deleteHistoria(<?php echo $historia->getId() ?>)" ></div>
            <div class="icon3" onclick="openEdit(<?php echo $historia->getId() ?>)"></div>

            <div class="icon4">
                <?php if($historia->getAtivo() == 1){ ?>
                    <img onclick="messageBlock()" src="img/ativo.png" style="max-width: 55px;"  alt="ativado" title="ativado">
                <?php }else{ ?>
                    <img onclick="disable(<?php echo ($historia->getId().",".$historia->getAtivo()) ?>)" src="img/desativado.png" style="max-width: 55px;"  alt="desativo" title="desativo">
                <?php } ?>
            </div>
        </div>
    </div>
<?php } ?>