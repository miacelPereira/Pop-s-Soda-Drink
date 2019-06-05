<?php
    require_once("../../require.php");
    reqPopComVoce();

    $controller = new PopComVoceController();

    foreach($controller->selectAllImage($_POST['id']) as $pop){
?>
    <div class="caixa-file">
        <h1 >Foto</h1>
        <div class="img-file"></div>
    </div>
<?php } ?>