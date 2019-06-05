<?php

if(isset($_GET['id'])){
    require_once('../../require.php');
    reqEvento();

    $eventosController = new EventosController();

    $evento = $eventosController->getEvento($_GET['id']);
    
    $editarEvento = $eventosController->editarEvento($_GET['id']);
    
    $id = $evento->getId();
    $nome = $evento->getNome();
    $endereco = $evento->getEndereco();
    $data = $evento->getData();
    $hora = $evento->getHora();
    
     echo $id;
                
}else{
    echo "ID NÃO INFORMADO CORRETAMENTE";
}

?>
<div class="modal" style="text-align: center;">
    <div class="fechar">X</div>
    <form data-id="<?php echo $_GET['id']; ?>" name="frmEvento" method="POST" id="routerEditar">
        <h1 style="text-align: center; font-size: 25px">Eventos </h1>
        <div class="caixa">
            <div class="txt"> <h3 >Nome do Evento:</h3></div>
            <input type="text" value="<?php echo $evento->getNome() ?>" placeholder="Ex: Nanina" name="txtNome">
        </div>
       <div class="caixa">
            <div class="txt"> <h3 >Endereço do evento:</h3></div>
            <input type="text" value="<?php echo $evento->getEndereco() ?>" placeholder="Ex: rua NaninaNanina" name="txtEndereco">
        </div>
        <div class="caixa">
                <div class="txt"> <h3 >Data do Evento:</h3></div>
                <input type="text" value="<?php echo $evento->getData() ?>" placeholder="Ex: 20/04/2018" name="txtData">
        </div>
        <div class="caixa">
            <div class="txt"> <h3 >Hora do Evento:</h3></div>
            <input type="text" value="<?php echo $evento->getHora() ?>" placeholder="Ex:20:18" name="txtHora">
        </div>  
        <div class="btn-enviar">
            <input type="submit" value="Salvar" >
        </div>
    </form>
</div>
<script src="js/eventosAdm.js"></script>