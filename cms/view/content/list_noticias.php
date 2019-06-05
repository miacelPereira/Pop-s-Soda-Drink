<?php
    require_once("../../require.php");
    reqNoticias();
    
    $controller = new NoticiasController();
    $list = $controller->getAll();
    foreach($list as $noticias){
?>
    <div class="row">
        <div class="conteudo"> <?php echo substr($noticias->getTitulo(), 0, 12)."..."; ?> </div>
        <div class="conteudo"><?php echo substr($noticias->getSubTitulo(), 0, 12)."..."; ?></div>
        <div class="conteudo"><?php echo substr($noticias->getIntroducao(), 0, 12)."..."; ?></div>
        <div class="conteudo-img">
            <div class="icon1" onclick="openView(<?php echo $noticias->getId() ?>)"></div>
            <div class="icon2" onclick="deleteNoticia(<?php echo $noticias->getId() ?>)"></div>
            <div class="icon3" onclick="openEdit(<?php echo $noticias->getId() ?>)"></div>
            <?php 
                    if($noticias->getAtivo() == 1){
                ?>
                    <img onclick="disable(<?php echo $noticias->getId().",".$noticias->getAtivo() ?>)" src="img/ativo.png" style="max-width: 55px;"  alt="ativado" title="ativado">
                <?php }else{ ?>
                    <img onclick="disable(<?php echo $noticias->getId().",".$noticias->getAtivo() ?>)" src="img/desativado.png" style="max-width: 55px;"  alt="desativado" title="desativado">
                <?php }  ?>
            </div>
        </div>
    </div>
<?php } ?>