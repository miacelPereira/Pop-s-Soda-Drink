<?php
    if(isset($_POST['id'])){   
        require_once('../../require.php');
        reqLojas();
        $controller = new LojaController();
        $loja = $controller->getOne($_POST['id']);
    }
?>
<div class="modal" style="text-align: center;">
    <div class="fechar">X</div>
<h1 style="text-align: center; font-size: 25px">Nossas Lojas</h1>
<div class="caixa">
        <div class="txt"> <h3 >Nome do Estabelecimento:</h3></div>
        <div class="txt"> <?php echo $loja->getNome() ?></div>
</div>

<div class="caixa">
        <div class="txt"> <h3 >Endereço do evento:</h3></div>
        <div class="txt"><?php echo ($loja->getEndereco().", ".$loja->getNumero().", ".$loja->getCidade().", ".$loja->getUf()) ?></div>
    </div>
    <div class="caixa" style="width: 100%">
            <div class="txt"> <h3 >Endereço MAPS</h3></div>
            <textarea style="width: 100%; height: 10px;"><?php echo $loja->getUrlMap(); ?></textarea>
    </div>
    <div class="caixa-file">
        <h3>Mapa do Local</h3>
        <div class="img-file">
            <iframe style="width: 600px; height: 300px;" src="<?php echo $loja->getUrlMap() ?>">  
        </div>
    </div>
</div>