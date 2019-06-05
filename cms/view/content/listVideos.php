<?php

    require_once('../../require.php');
   
    reqVideos();

    $listasVideos = new VideosController();

    $video = $listasVideos->listarVideos();
    
?>
    <?php for($i = 0; $i < count($video); $i++){ ?>
    <div class="row">
        <div class="conteudo"><?php echo $video[$i]->getVisualizacoes(); ?></div>
        <div class="conteudo"><?php echo $video[$i]->getNome(); ?></div>
        <div class="conteudo-img">

            <div class="icon1" onclick="visualizar(<?php echo $video[$i]->getId(); ?>);"></div>
            <div class="icon2" onclick="deletar(<?php echo $video[$i]->getId(); ?>)"></div>
            <div class="icon4">
                <img src="img/ativo.png" style="max-width: 55px;"  alt="ativado" title="ativado">
            </div>
        </div>
    </div>
    <?php } ?>
