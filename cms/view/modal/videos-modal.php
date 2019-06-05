<?php

if(isset($_GET['id'])){
    
    require_once('../../require.php');
    
    reqVideos();
    
    $videosController = new VideosController();
    
    $video = $videosController->getVideo($_GET['id']);
                
}else{
    echo "ID NÃO INFORMADO CORRETAMENTE";
}
    
?>
<div class="modal" style="text-align: center;">
    <div class="fechar">X</div>
   <h1 style="text-align: center; font-size: 25px">Videos</h1>
   <div class="caixa">
           <div class="txt"> <h3 >Código do video:</h3></div>
           <div class="txt"> <?php echo $video->getVisualizacoes(); ?></div>
   </div>
    <div class="caixa">
        <div class="txt"> <h3 >Nome do video:</h3></div>
        <div class="txt"> <?php echo $video->getNome(); ?></div>
    </div>

   
   <div class="caixa">
        <div class="txt"> <h3 >Endereço do video:</h3></div>
        <div class="txt"> <?php echo $video->getEndereco(); ?></div>
    </div>
    
 
</div>