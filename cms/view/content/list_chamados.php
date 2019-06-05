<?php

    require_once("../../require.php");
    reqChamadosCms();

    $controller = new chamadosController();

    $list = $controller->listarChamados();
    foreach($list as $chamados){
        
?>

 <div class="row">
    <div class="conteudo"><?php echo $chamados->getEmpresa() ?></div>
    <div class="conteudo"><?php echo $chamados->getProduto() ?></div>
    <div class="conteudo-img">
    <div class="icon1" onclick="openView(<?php echo $chamados->getId() ?>)"></div>
        <div class="icon2" onclick="deleteChamados(<?php echo $chamados->getId() ?>)"></div>
        <div class="icon3"></div>
    </div>
</div>
<?php } ?>