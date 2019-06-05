<?php

if(isset($_GET['id'])){
    
    require_once('../../require.php');
    
    reqEvento();
    
    $eventoController = new EventosController();
    
    $evento = $eventoController->getEvento($_GET['id']);
                
}else{
    echo "ID NÃO INFORMADO CORRETAMENTE";
}
    
?>
<div class="modal" style="text-align: center;">
        <div class="fechar">X</div>
       <h1 style="text-align: center; font-size: 25px">Estabelecimento</h1>
       <div class="caixa">
               <div class="txt"> <h3 >Nome do Evento:</h3></div>
               <div class="txt"> <?php echo $evento->getNome(); ?></div>
       </div>
       <div class="caixa">
            <div class="txt"> <h3 >Endereço do evento:</h3></div>
            <div class="txt"> <?php echo $evento->getEndereco(); ?></div>
        </div>
        <div class="caixa">
                <div class="txt"> <h3 >Data do Evento:</h3></div>
                <div class="txt"> <?php echo $evento->getData(); ?></div>
        </div>
        <div class="caixa">
            <div class="txt"> <h3 >Hora do Evento:</h3></div>
            <div class="txt"><?php echo $evento->getHora(); ?></div>
        </div>  
</div>