<?php

    require_once('../../require.php');
   
    reqContatos();

    $contatosControler = new ContatosController();

    $contatos = $contatosControler->listarContatos();
    
?>
<div class="tabela">
    <div class="row-titulo">
        <div class="assunto"> Nome</div>
         <div class="assunto-email"> E-mail</div>
         <div class="assunto-opcoes"> Opções</div>
    </div>
    <?php for($i = 0; $i < count($contatos); $i++){ ?>
    <div class="row">
        <div class="conteudo"><?php echo $contatos[$i]->getNome(); ?></div>
        <div class="conteudo-email"><?php echo $contatos[$i]->getEmail(); ?></div>
        <div class="conteudo-img">
            <div class="icon" style="width: 55px; height: 55px;">
                <img src="img/checked.png" style="width: 100%; height: 100%;">
            </div>
            <?php if($contatos[$i]->getId() != 1){ ?>
            <div class="icon2" onclick="deletar(<?php echo $contatos[$i]->getId(); ?>)"></div>
            <?php } ?>
        </div>   
    </div>
    <?php } ?>
</div>