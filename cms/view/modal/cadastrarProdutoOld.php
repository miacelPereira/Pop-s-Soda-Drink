<?php

@session_start();
require_once($_SESSION['prefix']."require.php");
reqUniMedida();
reqPrateleira();
reqEmbalagem();

$uniMedidaController = new UniMedidaController();
$listUm = $uniMedidaController->getAll();

$prateleiraController = new PrateleiraController();
$listPrateleira = $prateleiraController->getAll();

$embalagemController = new EmbalagemController();
$listEmbalagem = $embalagemController->getAll();

// var_dump($listPrateleira);

?>

<div id="container-cadastroProdutos">

    <h1 id="page-title">CADASTRO DE PRODUTOS</h1>
<!-- action="../router.php?controller=produto&action=insert" -->
    <form id="form" method="post" enctype="multipart/form-data">
        <div class="form-row">
            <p>NOME DO PRODUTO:</p>
            <input type="text" name="txtNome" placeholder="Refrigerante SuperDrinks de laranja 2L ">
        </div>
        <div class="form-row">
            <p>IMAGEM:</p>
            <input type="file" name="flImg">
        </div>
        <div class="form-row">
            <p>DESCRIÇÃO:</p>
            <textarea name="txtDesc" placeholder="Descrição do produto"></textarea>
        </div>
        <div class="form-row quant-uni">
            <p>CONTEÚDO:</p>
            <input type="number" step="any" name="txtQuantidade" value="2"> 
            <select name="slUniMedida">
                <?php foreach ($listUm as $um) {
                    
                    echo "<option value='".$um->getId()."'>".strtoupper($um->getAbrev())."</option>";
                }?>
            </select>
        </div>
        <div class="form-row">
            <p>PESO BRUTO:</p>
            <input type="text" name="txtPeso" placeholder="Em gramas">
        </div>
        <div class="form-row">
            <p>IMPOSTO:</p>
            <input type="number" step="any" name="txtImposto" placeholder="R$ ">
        </div>
        <div class="form-row">
            <p>DEMANDA MENSAL:</p>
            <input type="number" step="any" name="txtDemanda" placeholder="Em fardos">
        </div>
        <div class="form-row">
            <p>TEMPO DE RESSUPRIMENTO:</p>
            <input type="number" step="any" name="txtTempoRessup" placeholder="Em dias">
        </div>
        <div class="form-row">
            <p>INTERVALO DE RESSUPRIMENTO:</p>
            <input type="number" step="any" name="txtIntervaloRessup" placeholder="Em dias">
        </div>
        <div class="form-row">
            <p>QUANTIDADE ATUAL EM ESTOQUE:</p>
            <input type="text" name="txtQtdEstoque" placeholder="Em fardos**">
        </div>
        <div class="form-row">
            <p>PREÇO UNITÁRIO:</p>
            <input type="text" name="txtPrecoUni" id="txt-preco-uni" placeholder="R$">
        </div>
        <div class="form-row">
            <p>QUANTIDADE POR FARDO:</p>
            <input type="number" step="any" name="txtQtdFardo" id="txt-qtd-fardo" placeholder="">
        </div>
        <div class="form-row">
            <p>PREÇO DO FARDO:</p>
            <input type="text" id="txt-preco-fardo" disabled>
        </div>
        <div class="form-row">
            <!-- <table>
                <thead>
                    <tr>
                        <th colspan="X">PRATELEIRAS DO ESTOQUE</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>C1P1</td>
                        <td>C1P2</td>
                        <td>C1P3</td>
                        <td>C1P4</td>
                        
                    </tr>
                    <tr>
                        <td>C1P1</td>
                        <td>C1P2</td>
                        <td>C1P3</td>
                        <td>C1P4</td>
                    </tr>
                    <tr>
                        <td>C1P1</td>
                        <td>C1P2</td>
                        <td>C1P3</td>
                        <td>C1P4</td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="4">C: Corredor | P: Prateleira</td>
                    </tr>
                </tfoot>
            </table>
            <div id="real-table">
                <input type="checkbox" name="cbCxpx" id="cb-cx-px">
                <input type="checkbox" name="cbCxpx" id="cb-cx-px">
                <input type="checkbox" name="cbCxpx" id="cb-cx-px">
                <input type="checkbox" name="cbCxpx" id="cb-cx-px">

                <input type="checkbox" name="cbCxpx" id="cb-cx-px">
                <input type="checkbox" name="cbCxpx" id="cb-cx-px">
                <input type="checkbox" name="cbCxpx" id="cb-cx-px">
                <input type="checkbox" name="cbCxpx" id="cb-cx-px">

                <input type="checkbox" name="cbCxpx" id="cb-cx-px">
                <input type="checkbox" name="cbCxpx" id="cb-cx-px">
                <input type="checkbox" name="cbCxpx" id="cb-cx-px">
                <input type="checkbox" name="cbCxpx" id="cb-cx-px">
            </div> -->
            <p>LOCALIZAÇÃO NO ESTOQUE:</p>
            <select name="slPrateleira">
                <?php foreach ($listPrateleira as $prateleira) {
                    
                    echo "<option value='".$prateleira->getId()."'> Corredor ".strtoupper($prateleira->getCorredorName())." - Prateleira ".strtoupper($prateleira->getNumero())."</option>";
                }?>
            </select>
        </div>
        <div class="form-row nutri">
            <p>TABELA NUTRICIONAL:</p>
            <p class="nutri-list">
                <input type="text" class="nutri-elemento" name="txtNomePorcao1" id="txtNomePorcao1" placeholder="Elemento">
                <input type="number" step="any" class="nutri-quantidade" name="txtQtdPorcao1" id="txtQtdPorcao1" placeholder="Quantidade">
                <input type="number" step="any" class="nutri-vd" name="txtVd1" id="txtVd1" placeholder="%VD">
            </p>
        </div>
        <input type="button" id="btnAddNutri" onclick="addNutri();" value="+ ADICIONAR NOVO ELEMENTO">
        <div class="form-row">
            <p>EMBALAGEM:</p>
            <select name="slEmbalagem">
                <?php foreach ($listEmbalagem as $embalagem) {
                    
                    echo "<option value='".$embalagem->getId()."'>".$embalagem->getNome()."</option>";
                }?>
            </select>
        </div>
        <div class="form-row"><input type="submit" name="btnSubmit" value="CADASTRAR"></div>

    </form>
</div>
<script>
    $('#form').submit(function(){

    //Cancela o submit do HTML
    event.preventDefault();

    //console.log("teste:" + $('#form').data('id'));
    //var idItem = $('#form').data('id');

    var link = "../router.php?controller=produto&action=insert";

    $.ajax({
    type: "POST",
    url: link,
    data: new FormData($('#form')[0]),
    cache: false,
    contentType: false,
    processData: false,
    async: true,
    success: function(data){

        console.log(data);

        if(data > 0){
            alert("REGISTRADO COM SUCESSO!");
        }else{
            alert("FALHA NO REGISTRO. TENTE NOVAMENTE \n \n data: " + data);
        }
        
        $('#back-modal').fadeOut(200);
        // listPermissions();

    }

    });

    });
</script>