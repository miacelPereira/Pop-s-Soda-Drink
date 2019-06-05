<?php
     require_once("../../require.php");
     reqParceiro();
 
     $controller = new ParceiroController();
 
     $list = $controller->getAll();
     foreach($list as $parceiro){

?>
    <div class="row">
        <div class="conteudo"> <?php echo substr($parceiro->getNome(), 0, 12)."..."; ?> </div>
        <div class="conteudo"> <?php echo substr($parceiro->getModalidade(), 0, 12)."..."; ?> </div>
        <div class="conteudo"> <?php echo substr($parceiro->getPais(), 0, 12)."..."; ?> </div>
        <div class="conteudo-img">
        <div class="icon1" onclick="openView(<?php echo $parceiro->getId() ?>)"></div>
            <div class="icon2" onclick="deleteParceiro(<?php echo $parceiro->getId() ?>)" ></div>
            <div class="icon3" onclick="openEdit(<?php echo $parceiro->getId() ?>)"></div>
            <div class="icon4">
                <?php if($parceiro->getAtivo() == 1){ ?>
                    <img onclick="disable(<?php echo ($parceiro->getId().",".$parceiro->getAtivo()) ?>)" src="img/ativo.png" style="max-width: 55px;"  alt="ativado" title="ativado">
                <?php }else{ ?>
                    <img onclick="disable(<?php echo ($parceiro->getId().",".$parceiro->getAtivo()) ?>)" src="img/desativado.png" style="max-width: 55px;"  alt="desativo" title="desativo">
                <?php } ?>
            </div>
        </div>
    </div>
<?php } ?>