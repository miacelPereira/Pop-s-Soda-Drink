
<?php
    require_once("../../require.php");
    reqPromocao();

    $controller = new PromocaoController();
    $list = $controller->getAllPromo();
    foreach($list as $promocao){
?>
    <div class="row">
        <div class="conteudo"><?php echo $promocao->getIdPromocao() ?></div>
        <div class="conteudo"><?php echo substr($promocao->getNome(), 0, 8)."..."?></div>
        <div class="conteudo">STATUS????</div>
        <div class="conteudo">DATA????</div>
        <div class="conteudo-img">
            <div class="icon1" onclick="openView(<?php echo $promocao->getIdPromocao() ?>)" ></div>
            <div class="icon2" onclick="deletePromo(<?php echo $promocao->getIdPromocao() ?>)" ></div>
            <div class="icon3" onclick="openEdit(<?php echo $promocao->getIdPromocao() ?>)"></div>
            <div class="icon4" onclick="disable(<?php echo ($promocao->getIdPromocao().','.$promocao->getAtivo() )?>)">
            <?php if($promocao->getAtivo() == 1){ ?>
                <img src="img/ativo.png" style="max-width: 35px;"  alt="ativado" title="ativado">
            <?php }else{ ?>
                <img src="img/desativado.png" style="max-width: 35px;"  alt="desativado" title="desativado">
            <?php }?>
            </div>
        </div>
    </div>
<?php 
    }
 ?>