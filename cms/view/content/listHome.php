<?php

    session_start();
    require_once($_SESSION['prefix']."require.php");

    reqProduto();
    $home = new ProdutoController();
    $listHome = $home->getAll();

    $homeDao = new HomeDao();

    $listHome = $homeDao->selectAll();

//Função para esconder os "warning" de erro 
ini_set('display_errors', 0 );
error_reporting(0);

foreach ($list as $materia) { ?>
         <div class="row">
            <div class="conteudo">Conteudo</div>
            <div class="conteudo">Conteudo</div>
            <div class="conteudo">Conteudo</div>
            <div class="conteudo-img">
                <div class="icon1"></div>
                <div class="icon2"></div>
                <div class="icon3"></div>
                <div class="icon4">
                    <img src="img/ativo.png" style="max-width: 55px;"  alt="ativado" title="ativado">
                </div>
            </div>
        </div>
<?php } ?>