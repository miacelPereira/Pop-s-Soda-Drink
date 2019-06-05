<?php 
    if(isset($_POST['id'])){   
        require_once('../../require.php');
        reqParceiro();
        $controller = new ParceiroController();
        $parceiro = $controller->getOne($_POST['id']);
    }
?>
<div class="modal" style="text-align: center;">
    <div class="fechar">X</div>
   <h1 style="text-align: center; font-size: 25px">Parceiros no esporte</h1>
    <div class="caixa-file" style="margin-top: 20px;">
        <div class="img-file">
            <img src="<?php echo (str_replace($_SERVER['DOCUMENT_ROOT'], "", $parceiro->getImagem())) ?>" alt="Imagem parceiro" >
        </div>
    </div>
   <div class="caixa">
           <div class="txt"> <h3 >Nome:</h3></div>
           <div class="txt"> <?php echo($parceiro->getNome()) ?> </div>
   </div>
   <div class="caixa">
        <div class="txt"> <h3 >Esporte:</h3></div>
        <div class="txt"> <?php echo($parceiro->getModalidade()) ?> </div>
    </div>
   <div class="caixa" >
       <div class="txt"> <h3 >País:</h3></div>
       <div class="txt"> <?php echo($parceiro->getPais()) ?> </div>
   </div>
</div>