<?php 
    if(isset($_POST['id'])){   
        require_once('../../require.php');
        reqMissaoValor();
        $controller = new MissaoValorController();
        $missao = $controller->getOne($_POST['id']);
    }
?> 
<div class="modal" style="text-align: center;">
    <div class="fechar">X</div>
    <h1 style="text-align: center; font-size: 25px">Missão Visão e Valores</h1>
    <div class="caixa">
        <div class="txt"> <h3 >Missão</h3></div>
        <textarea> <?php echo $missao->getMissao() ?> </textarea>
    </div>
    <div class="caixa">
        <div class="txt"> <h3 >Visão :</h3></div>
        <textarea> <?php echo $missao->getVisao() ?></textarea>
    </div>
    <div class="caixa">
        <div class="txt"> <h3 >Valores:</h3></div>
        <textarea> <?php echo $missao->getValor() ?> </textarea>
    </div>
    <div class="caixa-file">
        <h3>Foto</h3>
        <div class="img-file">
            <img style="width: 600px; height: 250px;" src="<?php echo (str_replace($_SERVER['DOCUMENT_ROOT'], "", $missao->getImagem())) ?>" alt="Imagem missão, visão e valores"/>
        </div>
    </div>
</div>
