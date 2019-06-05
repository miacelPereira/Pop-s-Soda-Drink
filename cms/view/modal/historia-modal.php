<?php
     if(isset($_POST['id'])){   
        require_once('../../require.php');
        reqHistoria();
        $controller = new HistoriaController();
        $historia = $controller->getOne($_POST['id']);
    }

?>
<div class="modal" style="text-align: center;">
    <div class="fechar">X</div>
   <h1 style="text-align: center; font-size: 25px">História Pops</h1>
   <div class="caixa">
           <div class="txt"> <h3 >Titulo:</h3></div>
           <div class="txt"> <?php echo $historia->getTitulo() ?></div>
   </div>
   <div class="caixa">
       <div class="txt"> <h3 >Subtitlo:</h3></div>
       <div class="txt"><?php echo $historia->getFrase() ?></div>
   </div>
   <div class="caixa">
        <div class="txt"> <h3 >História parte 1:</h3><h5>(primeira quebra de texto da história) </h5></div>
        <textarea><?php echo $historia->getPrimeiroTexto() ?></textarea>
    </div>
    <div class="caixa">
        <div class="txt"> <h3 >História parte 2:</h3><h5>(segunda quebra de texto da história) </h5></div>
        <textarea> <?php echo $historia->getSegundaTexto() ?></textarea>
    </div>
    <div class="caixa">
        <h3>Foto História</h3>
        <div class="img-file">
            <img style="width: 300px; height: 300px;" src="<?php echo (str_replace($_SERVER['DOCUMENT_ROOT'],"", $historia->getPrimeiraImagem())) ?>" alt="Imagem história"/>
        </div>
    </div>
    <div class="caixa">
        <h3>Foto História</h3>
        <div class="img-file">
            <img style="width: 300px; height: 300px;" src="<?php echo (str_replace($_SERVER['DOCUMENT_ROOT'], "", $historia->getSegundaImagem())) ?>" alt="Imagem história"/>
        </div>
    </div>
</div>