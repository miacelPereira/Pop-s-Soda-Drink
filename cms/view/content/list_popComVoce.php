<?php
    require_once("../../require.php");
    reqPopComVoce();

    if(isset($_GET['slide'])){
        $controller = new PopComVoceController();
        foreach($controller->selectAllImage($_GET['slide']) as $pop){
?>
        <div class="row">
            <div class="conteudo"> <?php echo $pop->getId() ?> </div>
            <div class="conteudo"> <?php echo substr(str_replace($_SERVER['DOCUMENT_ROOT'],'',$pop->getUrl_foto()),0,12).'...' ?> </div>
            <div class="conteudo"> <?php echo $pop->getTitulo() ?> </div>
            <div class="conteudo-img" style =" width: 350px;">
                <div class="icon1" onclick="openView(<?php echo $pop->getId() ?>)"></div>
                <div class="icon2" onclick="deleteSlide(<?php echo $pop->getId() ?>)"></div>
                <div class="icon3" onclick="openEdit(<?php echo $pop->getId() ?>)"></div>
                <div class="icon4">
                    <?php if($pop->getAtivo() == 1){ ?>
                        <img src="img/ativo.png" onclick="disable(<?php echo ($pop->getId().",".$pop->getAtivo()) ?> )" style="max-width: 55px;"  alt="ativado" title="ativado">
                    <?php }else{ ?>
                        <img src="img/desativado.png" onclick="disable(<?php echo ($pop->getId().",".$pop->getAtivo()) ?> )" style="max-width: 55px;"  alt="desativado" title="desativado">
                    <?php } ?>
                </div>
            </div>
        </div>
    <?php
        }
    }
?>