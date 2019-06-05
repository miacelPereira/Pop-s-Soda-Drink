<?php

    require_once('../../require.php');
   
    reqVideos();

    $listasVideos = new VideosController();

    $video = $listasVideos->listarVideos();
    
?>
<div class="tabela" style="width: 850px;">
    <div class="row-titulo">
        <div class="assunto"> Codigo Video </div>
        <div class="assunto">Nome Video</div>
        <div class="assunto" style="width:350px;"> Opções</div>
    </div>
    <?php for($i = 0; $i < count($video); $i++){ ?>
    <div class="row">
        <div class="conteudo"><?php echo $video[$i]->getVisualizacoes(); ?></div>
        <div class="conteudo"><?php echo $video[$i]->getNome(); ?></div>
        <div class="conteudo-img" style =" width: 360px;">
            <div class="icon1" onclick="showViewUserModal(<?php echo $video[$i]->getId(); ?>);"></div>
            <?php if($video[$i]->getId() != 1){ ?>
            <div class="icon2" onclick="deletar(<?php echo $video[$i]->getId(); ?>)"></div>
            <?php } ?>></div>
            <div class="icon3"></div>
            <div class="icon4">
            <img src="img/ativo.png" style="max-width: 55px;"  alt="ativado" title="ativado">
        </div>
    </div>
    <?php } ?>
</div>