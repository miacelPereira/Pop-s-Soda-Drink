
<?php

    require_once('../../require.php');
   
    reqEvento();

    $listaEventos = new EventosController();

    $eventos = $listaEventos->listarEventos();

    //Função para esconder os "warning" de erro 
    ini_set('display_errors', 0 );
    error_reporting(0);
    
?>
    <?php for($i = 0; $i < count($eventos); $i++){ ?>
    <div class="row">
        <div class="conteudo"><?php echo $eventos[$i]->getNome(); ?></div>
        <div class="conteudo"><?php echo $eventos[$i]->getEndereco(); ?></div>
        <div class="conteudo"><?php echo $eventos[$i]->getData(); ?></div>
        <div class="conteudo-img" style =" width: 350px;">
            <div class="icon1" onclick="visuzalizarEvento(<?php echo $eventos[$i]->getId(); ?>);"></div>
            <?php if($eventos[$i]->getId() != 1){ ?>
            <div class="icon2"onclick="deletar(<?php echo $eventos[$i]->getId(); ?>)"></div>
            <?php } ?>
            <div class="icon3" onclick="editarEvento(<?php echo $eventos[$i]->getId(); ?>);"></div>
            <div class="icon4">
                <img src="img/ativo.png" style="max-width: 55px;"  alt="ativado" title="ativado">
            </div>
        </div>
    </div>
    <?php } ?>
