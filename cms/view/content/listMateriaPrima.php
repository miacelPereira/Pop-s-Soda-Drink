<?php

session_start();
require_once($_SESSION['prefix']."require.php");
reqMateriaPrima();

$materia = new MateriaPrimaController();
$materiaDao = new MateriaPrimaDao();

$list = $materiaDao->selectAll();

//Função para esconder os "warning" de erro 
ini_set('display_errors', 0 );
error_reporting(0);

foreach ($list as $materia) { ?>
    <div class="tbl-row">
        <div class="conteudo" style="width: 400px;"><?= @$materia->getNome() ?></div>
        <div class="conteudo" style="width: 180px;"><?= @$materia->getLocalizacao() ?></div>
        <div class="conteudo"><?= $materia->getQuantidadeEstoque()." ".strtoupper($materia->getUnidadeMedida('abrev')) ?></div>
        <div class="conteudo-img">
            <div class="icon1" onclick="editMateria(<?= $materia->getId()?>);"></div>
            
            <div class="icon2" onclick="deleteMateria(<?= $materia->getId()?>);"></div>
        </div>
    </div>
<?php } ?>