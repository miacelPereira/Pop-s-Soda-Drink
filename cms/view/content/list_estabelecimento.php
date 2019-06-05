<?php

    require_once("../../require.php");
    reqEstabelecimento();

    $controller = new EstabelecimentoController();

    $list = $controller->getAll();

    foreach($list as $estabelecimento){
        //Função para esconder os "warning" de erro 
        ini_set('display_errors', 0 );
        error_reporting(0);

        
?>

    <div class="row">
        <div class="conteudo"><?php echo substr($estabelecimento->getNome(), 0, 12)."..."; ?></div>
        <div class="conteudo"><?php echo substr($estabelecimento->getEndereco(), 0, 12)."..." ?></div>
        <div class="conteudo"><?php echo substr($estabelecimento->getNomeEvento(), 0, 12)."..." ?> </div>
        <div class="conteudo-img">
            <div class="icon1" onclick="openView(<?php echo $estabelecimento->getIdDivulgacao() ?>)"></div>
            <div class="icon2" onclick="deleteDivulgacao(<?php echo $estabelecimento->getIdDivulgacao() ?>)"></div>
            <div class="icon4">
                <?php if($estabelecimento->getAtivo() == 0){
                 ?>
                    <img onclick="disableDivulgacao(<?php echo($estabelecimento->getIdDivulgacao().",".$estabelecimento->getAtivo()) ?>)" src="img/desativado.png" style="max-width: 55px;" alt="desativado" title="desativado">
                <?php }else{ ?>
                    <img onclick="disableDivulgacao(<?php echo($estabelecimento->getIdDivulgacao().",".$estabelecimento->getAtivo()) ?>)" src="img/ativo.png" style="max-width: 55px;" alt="ativado" title="ativado">
                <?php } ?>
            </div>
        </div>
    </div>

<?php }} ?>