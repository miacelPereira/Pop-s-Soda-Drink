<?php

if(isset($_GET['id'])){
    
    require_once('../../require.php');
    
    reqFale();
    
    $faleController = new FaleConoscoController();
    
    $fale = $faleController->getMensagem($_GET['id']);
                
}else{
    echo "ID NÃO INFORMADO CORRETAMENTE";
}
    
?>
    <div class="modal">
        <div class="fechar">X</div>
        <h1>Mensagem</h1>
        <div class="caixa">
            <div class="txt"> <h3>Nome</h3></div>
            <div class="txt-banco"> <?php echo $fale->getNome(); ?></div>
        </div>
        <div class="caixa">
            <div class="txt"> <h3>Sobrenome</h3></div>
            <div class="txt-banco"> <?php echo $fale->getSobrenome(); ?></div>
        </div>
        <div class="caixa2">
            <div class="txt"> <h3>E-mail</h3></div>
            <div class="txt-banco"> <?php echo $fale->getEmail(); ?></div>
        </div>
        <div class="caixa2">
            <div class="txt"> <h3>Tel.Residencial</h3></div>
            <div class="txt-banco"><?php echo $fale->getTelefone(); ?></div>
        </div>
        <div class="caixa2">
            <div class="txt"> <h3>Celular</h3></div>
            <div class="txt-banco"> <?php echo $fale->getcelular(); ?></div>
        </div>
        <div class="caixa2">
            <div class="txt"> <h3>Tipo</h3></div>
            <div class="txt-banco"> 
                <select style="border: 1px solid #000; margin-top: 10px">
                    <option><?php echo $fale->getCategoria(); ?></option>
                </select>
            </div>
        </div>
        <div class="caixa3">
            <h2>Mensagem</h2>
            <div class="txt-banco-scroll"><?php echo $fale->getMensagem(); ?></div>
           
        </div>
    </div>
<script src="js/faleConosco.js"></script>