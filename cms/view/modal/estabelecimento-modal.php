<?php
    if(isset($_POST['id'])){   
        require_once('../../require.php');
        reqEstabelecimento();
        $controller = new EstabelecimentoController();
        $estabelecimento = $controller->getOne($_POST['id']);
    }
?>

<div class="modal" style="text-align: center;">
    <div class="fechar">X</div>
    <h1 style="text-align: center; font-size: 25px">Estabelecimento</h1>
    <div class="caixa">
        <div class="txt"> <h3 >Nome do Estabelecimento:</h3></div>
        <div class="txt"> <?php echo $estabelecimento->getNome() ?></div>
    </div>
    <div class="caixa">
        <div class="txt"> <h3 >Evento:</h3></div>
        <div class="txt"><?php echo $estabelecimento->getNomeEvento() ?></div>
    </div>
    <div class="caixa">
        <div class="txt"> <h3 >Endereço do evento:</h3></div>
        <div class="txt"> <?php echo $estabelecimento->getEndereco() ?></div>
    </div>
    <div class="caixa">
            <div class="txt"> <h3 >Data do Evento:</h3></div>
            <div class="txt"> <?php echo $estabelecimento->getData() ?></div>
        </div>
    <div class="caixa-file">
        <h3>Foto do Estabelecimento/Evento</h3>
        <div class="img-file">
            <img style="width: 600px; height: 300px;" src="<?php echo (str_replace($_SERVER['DOCUMENT_ROOT'],"", $estabelecimento->getImagem())) ?>" alt="Imagem Evento"/> 
        </div>
    </div>
</div>
<script src="js/estabelecimento.js"></script>