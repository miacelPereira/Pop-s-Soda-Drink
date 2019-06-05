<?php

    require_once("../../require.php");
    reqProduto();
 
    $controller = new ProdutoController();
 
    $list = $controller->getAll();
    foreach($list as $produto){
?>
    <div class="row">
        <div class="conteudo"> <?php echo $produto->getId() ?> </div>
        <div class="conteudo"><?php echo substr($produto->getDescricao(), 0, 12)."..." ?></div>
        <div class="conteudo"><?php echo ("R$".str_replace(".",",",$produto->getPrecoUnidade())) ?></div>
        <div class="conteudo-img">
            <!--- Visualizar com mais detalhes -->
            <div class="icon1" onclick="openView(<?php echo $produto->getId() ?>)"></div>
            <!-- Ativar e desativar -->
            <div class="icon4">
                <?php if($produto->getAtivo() == 0){ ?>
                    <img onclick="disable(<?php echo ($produto->getId().",".$produto->getAtivo()) ?>)" src="img/desativado.png" style="max-width: 55px;"  alt="desativo" title="desativo">
                <?php }else{ ?>
                    <img onclick="disable(<?php echo ($produto->getId().",".$produto->getAtivo()) ?>)" src="img/ativo.png" style="max-width: 55px;"  alt="ativo" title="ativo">
                <?php } ?>
            </div>
        </div>
    </div>
<?php } ?>