<?php

    require_once('../require.php');
   
    reqVideos();

    $listasVideos = new VideosController();

    $video = $listasVideos->listarVideos();
    
?>
<div id="container1">
    <div class="titulo">
        Videos
    </div>
    <div class="tabela">
        <div class="row-titulo">
            <div class="assunto"> Codigo Video </div>
            <div class="assunto">Nome Video</div>
             <div class="assunto" style="width:250px;"> Opções</div>
        </div>
        <div id="container_video">
        
        </div>  
    </div>
<script src="js/videos.js"></script>