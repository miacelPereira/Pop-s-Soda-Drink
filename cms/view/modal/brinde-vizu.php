<?php

if(isset($_GET['id'])){

    require_once('../../require.php');
    reqBrinde();
    
    $brindeController = new BrindeController();
    
    $brinde = $brindeController->getBrinde($_GET['id']);
    $brindeUpdate = $brindeController->updateBrinde($_GET['id']);
}else{
    echo("id não informado corretamente");
}

?>


<div class="modal" style="text-align: center;">
    <div class="fechar">X</div>
   <h1 style="text-align: center; font-size: 25px">Brinde</h1>
   <div class="caixa">
           <div class="txt"> <h3 >Nome do produto:</h3></div>
           <div class="txt"> <?php echo $brinde->getNome(); ?></div>
   </div>
   <div class="caixa">
        <div class="txt"> <h3 >Preço do produto:</h3></div>
        <div class="txt"><?php echo $brinde->getPreco(); ?></div>
    </div>
   <div class="caixa" style="width: 100%">
       <div class="txt"> <h3 >Breve Descrição:</h3></div>
       <textarea style="width: 100%" disabled><?php echo $brinde->getDescricao(); ?></textarea>
   </div>
   
    <div class="caixa-file">
        <div class="img-file"><img class="img-file" src="<?php echo str_replace($_SERVER['DOCUMENT_ROOT'], "", $brinde->getFoto())?>"/></div>
    </div>
</div>
<script src="admBrinde.js"></script>