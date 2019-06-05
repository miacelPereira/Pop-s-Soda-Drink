<?php
    require_once("../../require.php");
    reqPopComVoce();
    
    $controller = new PopComVoceController();
    $result = $controller->selectImage($_GET['id']);
    
?>
<div class="modal">
    <div class="fechar"><span id="fechar">X</span></div>
    <div class="container-list">
        <div class="caixa-file">
            <h1 >Foto</h1>
            <div class="img-file">
                <img class="img-file" src="<?php echo (str_replace($_SERVER['DOCUMENT_ROOT'], "", $result->getUrl_foto())) ?>" alt="Imagem da promoção">
            </div>
        </div>
    </div>
</div>


        