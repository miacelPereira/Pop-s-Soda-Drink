<?php
    if(isset($_POST['id'])){   
        require_once('../../require.php');
        reqChamadosCms();
        $controller = new ChamadosController();
        $chamados = $controller->chamados($_POST['id']);
    }
?>


<div class="modal" style="text-align: center;">
        <div class="fechar">X</div>
       <h1 style="text-align: center; font-size: 25px">Chamado para:</h1>
       <div class="caixa">
               <div class="txt"> <h3 >Empresa:</h3></div>
               <div class="txt">  <?php echo $chamados->getEmpresa() ?></div>
       </div>
        <div class="caixa">
                <div class="txt"> <h3 >Nome do produto:</h3></div>
                <div class="txt"> <?php echo $chamados->getProduto() ?></div>
        </div>
        <div class="caixa-total">
                <div class="txt"> <h3 >Quantidade:</h3></div>
                <div class="txt"> <?php echo $chamados->getQuantidade() ?></div>
        </div>
       <div class="caixa-total">
           <div class="txt"> <h3 > Descrição:</h3></div>
           <textarea name="txtDescricaoChamado" id="" cols="30" rows="10"><?php echo $chamados->getDescricao() ?></textarea>
       </div>
   
</div>
