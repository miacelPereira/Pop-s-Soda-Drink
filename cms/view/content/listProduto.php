<?php

@session_start();
require_once($_SESSION['prefix']."require.php");
reqProduto();

$produto = new Produto();
$produtoDao = new ProdutoDao();
$list = $produtoDao->selectAll();

foreach ($list as $produto) { ?>
    <div class="tbl-row">
        <div class="conteudo" style="width: 400px;"><?= $produto->getNome() ?></div>
        <div class="conteudo" style="width: 180px;"><?= $produto->getLocalizacao() ?></div>
        <div class="conteudo"><?= $produto->getQuantidadeEstoque()." ".strtoupper($produto->getUnidadeMedida('abrev')) ?></div>
        <div class="conteudo-img">
            <div class="icon1" onclick="viewProduto(<?= $produto->getId()?>);"></div>
            <div class="icon2" onclick="deleteProduto(<?= $produto->getId() ?>);"></div>
        </div>
    </div>
<?php } ?>