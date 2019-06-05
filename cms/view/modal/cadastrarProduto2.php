<?php

@session_start();

require_once($_SESSION['prefix']."require.php");
reqPrateleira();
reqEmbalagem();
reqMateriaPrima();

$controller = new PrateleiraController();
$listPrateleira = $controller->getAll();


$controller = new EmbalagemController();
$listEmbalagem = $controller->getAll();

$controller = new MateriaPrimaController();
$listMatprima = $controller->getAll();  

$edit = false;
if(isset($_GET['type'])){
    if($_GET['type'] == "edit"){
        $edit = true;
        $id = $_GET['id'];
        $matprimaDao = new MateriaPrimaDao();
        $matprimaUpdate = $matprimaDao->selectById($id);
    }
}
?>

<div id="modal-header">
        <div>&nbsp;</div>
        <div><h1 class="header-text">CADASTRAR NOVO PRODUTO</h1></div>
        <div><h1 class="header-text" id="close-modal">X</h1></div>
    </div>
<div id="modal-body">

    <?php if($edit){ echo '<form id="edit-form" method="post" data-id="'.$_GET['id'].'" enctype="multipart/form-data">';}else{ echo '<form id="form" method="post" enctype="multipart/form-data">';}?>
        <div class="modal-line">
            <p>NOME DO PRODUTO:</p>
            <input type="text" class="inp-def" name="txtNome" placeholder="Refrigerante SuperDrinks de laranja 2L ">
        </div>
        <div class="modal-line">
            <p>IMAGEM:</p>
            <input type="file" class="inp-def" name="flImg">
        </div>
        <div class="modal-line">
            <p>DESCRIÇÃO:</p>
            <textarea name="txtDesc" id="txt-desc" placeholder="Descrição do produto"></textarea>
        </div>
        <div class="modal-line">
            <p>CONTEÚDO:</p>
            <input type="number" step="any" name="txtQuantidade" value="2" id="txt-quantidade"> 
            <select name="slUniMedida" id="sl-unimedida">
                <?php foreach ($listUm as $um) {
                    echo "<option value='".$um->getId()."'>".strtoupper($um->getAbrev())."</option>";
                }?>
            </select>
        </div>
        <div class="modal-line">
            <p>PESO BRUTO:</p>
            <input type="text" class="inp-def" name="txtPeso" placeholder="Em gramas">
        </div>
        <div class="modal-line">
            <p>IMPOSTO:</p>
            <input type="number" class="inp-def" step="any" name="txtImposto" placeholder="R$ ">
        </div>
        <div class="modal-line">
            <p>DEMANDA MENSAL:</p>
            <input type="number" class="inp-def" step="any" name="txtDemanda" placeholder="Em fardos">
        </div>
        <div class="modal-line">
            <p>TEMPO DE RESSUPRIMENTO:</p>
            <input type="number" class="inp-def" step="any" name="txtTempoRessup" placeholder="Em dias">
        </div>
        <div class="modal-line">
            <p>INTERVALO DE RESSUPRIMENTO:</p>
            <input type="number" class="inp-def" step="any" name="txtIntervaloRessup" placeholder="Em dias">
        </div>
        <div class="modal-line">
            <p>QUANTIDADE ATUAL EM ESTOQUE:</p>
            <input type="text" class="inp-def" name="txtQtdEstoque" placeholder="Em fardos**">
        </div>
        <div class="modal-line">
            <p>PREÇO UNITÁRIO:</p>
            <input type="text" class="inp-def" name="txtPrecoUni" id="txt-preco-uni" placeholder="R$">
        </div>
        <div class="modal-line">
            <p>QUANTIDADE POR FARDO:</p>
            <input type="number" class="inp-def" step="any" name="txtQtdFardo" id="txt-qtd-fardo" placeholder="">
        </div>
        <div class="modal-line">
            <p>PREÇO DO FARDO:</p>
            <input type="text" class="inp-def" id="txt-preco-fardo" disabled>
        </div>
        <div class="modal-line">
            <p>LOCALIZAÇÃO NO ESTOQUE:</p>
            <select name="slPrateleira" class="inp-def">
                <?php foreach ($listPrateleira as $prateleira) {
                    
                    echo "<option value='".$prateleira->getId()."'> Corredor ".strtoupper($prateleira->getCorredorName())." - Prateleira ".strtoupper($prateleira->getNumero())."</option>";
                }?>
            </select>
        </div>
        <div class="modal-line nutri">
            <p>TABELA NUTRICIONAL:</p>
            <div id="container-materia">
                <p class="nutri-list">
                    <input type="text" class="nutri-elemento" name="txtNomePorcao1" id="txtNomePorcao1" placeholder="Elemento">
                    <input type="number" step="any" class="nutri-quantidade" name="txtQtdPorcao1" id="txtQtdPorcao1" placeholder="Quantidade">
                    <input type="number" step="any" class="nutri-vd" name="txtVd1" id="txtVd1" placeholder="%VD">
                </p>
            </div>
            <input type="button" value="+" onclick="cloneObject()">
        </div>
        <div class="modal-line">
            <p>EMBALAGEM:</p>
            <select name="slEmbalagem" class="inp-def">
                <?php foreach ($listEmbalagem as $embalagem) {
                    echo "<option value='".$embalagem->getId()."'>".$embalagem->getNome()."</option>";
                }?>
            </select>
        </div>
        <div class="modal-line">
                <p>MATÉRIAS-PRIMA: </p>
                <select name="slMatPrima1" class="inp-def">
                <?php foreach ($listMatprima as $matprima) {             
                    echo "<option value='".$matprima->getId()."'>".$matprima->getNome()."</option>";
                }?>
                </select>
        </div>
        <div class="modal-line">
            <input type="submit" class="inp-def" name="btnSubmit" value="CADASTRAR">
        </div>
    </form>
    
</div>
<script>
    function cloneObject(){
    //FUNÇÃO PARA CLONAR O OBJETO DOS ELEMENTOS DE NUTRIÇÃO, PARA SER POSSÍVEL ASSIM TER VÁRIOS ELEMENTOS NA TABELA
    count = $(".nutri-elemento").length
    $("#container-materia").append(`<p class="nutri-list">
                                <input type="text" class="nutri-elemento" name="txtNomePorcao${count+1}" id="txtNomePorcao1" placeholder="Elemento">
                                <input type="number" step="any" class="nutri-quantidade" name="txtQtdPorcao${count+1}" id="txtQtdPorcao1" placeholder="Quantidade">
                                <input type="number" step="any" class="nutri-vd" name="txtVd${count+1}" id="txtVd1" placeholder="%VD">
                             </p>`);
    }

    $(document).ready(function(){
        $.ajax({
            url: "content/select-unimedida.php",
            success(data){
                $("#sl-unimedida").append(data);
            }
        })
    })

    $('#edit-form').submit(function(){
        event.preventDefault();
        console.log("edit FORM");
        var idItem = $('#edit-form').data('id');
        var url2 = "../router.php?controller=matprima&action=update&id="+idItem;
        $.ajax({
            type: "POST",
            url: url2,
            data: new FormData($('#edit-form')[0]),
            cache: false,
            contentType: false,
            processData: false,
            async: true,
            success: function(data){
            
                console.log(data);

                if(data == 1){
                    alert("REGISTRADO COM SUCESSO!");
                }else{
                    console.log(data);
                    alert("FALHA NO REGISTRO! Tente novamente");
                }
                $('#back-modal').fadeOut(200);
                listMateriaPrima();
            }
        });
    });

    $('#form').submit(function(){
        event.preventDefault();
        let quant = $('.nutri-elemento').length;
        var link = "../router.php?controller=produto&action=insert&quant="+quant;
        $.ajax({
            type: "POST",
            url: link,
            data: new FormData($('#form')[0]),
            cache: false,
            contentType: false,
            processData: false,
            async: true,
            success: function(data){
                alert("Registrado com sucesso!");
                $('#back-modal').fadeOut(200);
                listProduto();
            }
        });
    });

    $("#sl-unimedida").change(function(){
        $("#sl-0").remove()
        $("#ref-unimedida").html("Por "+$("#sl-unimedida option:selected").html())
    })
</script>