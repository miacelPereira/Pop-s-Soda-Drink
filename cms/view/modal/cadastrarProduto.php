<?php

//TODO: Tela de LOGOUT;

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
        $matprima = new MateriaPrima();
        $matprima = $matprimaDao->selectById($id);

    }
}
?>

<div id="modal-header">
        <div>&nbsp;</div>
        <div><h1 class="header-text">CADASTRAR NOVO PRODUTO</h1></div>
        <div><h1 class="header-text" id="close-modal">X</h1></div>
    </div>
<div id="modal-body">

    <!-- action="../router.php?controller=matprima&action=insert" -->
    <?php if($edit){ echo '<form id="edit-form" method="post" data-id="'.$_GET['id'].'">';}else{ echo '<form id="form" method="post">';}?>
        <div class="modal-line">
            <p>NOME DO PRODUTO:</p>
            <input type="text" class="inp-def" name="txtNome" placeholder="Refrigerante SuperDrinks de laranja 2L ">
        </div>
        <div class="modal-line">
            <p>DESCRIÇÃO:</p>
            <textarea name="txtDesc" id="txt-desc" placeholder="Descrição do produto"></textarea>
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
            <p>IMAGEM:</p>
            <input type="file" class="inp-def" name="flImg">
        </div>
        <div class="modal-line">
            <p>PESO BRUTO DA UNIDADE (em gramas):</p>
            <input type="text" class="inp-def" name="txtPeso" step="any" placeholder="Digite apenas números (Ex.: 1.050)">
        </div>
        <div class="modal-line">
            <p>IMPOSTO (R$):</p>
            <input type="number" class="inp-def" step="any" name="txtImposto" placeholder="Digite apenas números (Ex.: 0.05)">
        </div>
        <div class="modal-line">
            <p>DEMANDA MENSAL:</p>
            <input type="number" class="inp-def" step="any" name="txtDemanda" placeholder="Em fardos">
        </div>
        <div class="modal-line">
            <p>TEMPO DE RESSUPRIMENTO (Em dias) (?):<br><p style="font-size: 14px;">Tempo que o produto leva para ser produzido.</p></p>
            <input type="number" class="inp-def" step="any" name="txtTempoRessup" placeholder="Digite números inteiros ou decimais">
        </div>
        <div class="modal-line">
            <p>INTERVALO DE RESSUPRIMENTO:</p>
            <input type="number" class="inp-def" step="any" name="txtIntervaloRessup" placeholder="Em dias">
        </div>
        <div class="modal-line">
            <p>QUANTIDADE ATUAL EM ESTOQUE (Em unidade):</p>
            <input type="text" class="inp-def" name="txtQtdEstoque" placeholder="Digite apenas números">
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
            <p class="nutri-list">
                <input type="text" class="nutri-elemento" name="txtNomePorcao1" id="txtNomePorcao1" placeholder="Elemento">
                <input type="number" step="any" class="nutri-quantidade" name="txtQtdPorcao1" id="txtQtdPorcao1" placeholder="Quantidade">
                <input type="number" step="any" class="nutri-vd" name="txtVd1" id="txtVd1" placeholder="%VD">
            </p>
        </div>
        <div class="modal-line">
                <p>MATÉRIAS-PRIMA: </p>
                <!-- id="sl-matprima-1" -->
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

    $(document).ready(function(){

        //console.log("teste: "+ location)
        $.ajax({
            url: "content/select-unimedida.php",
            success(data){
                $("#sl-unimedida").append(data);
            }
        })

    })

    $('#edit-form').submit(function(){

        //Cancela o submit do HTML
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

            //Cancela o submit do HTML
            event.preventDefault();

            // console.log("teste:" + $('#form').data('id'));
            // var idItem = $('#form').data('id');

            var link = "../router.php?controller=matprima&action=insert";

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

                    if(data == 1){
                        alert("REGISTRADO COM SUCESSO!");
                    }else{
                        console.log(data);
                        alert("FALHA NO REGISTRO! Tente novamente mais tarde.");
                    }
                    
                    $('#back-modal').fadeOut(200);
                    listMateriaPrima();

                }

            });

        });

    $("#sl-unimedida").change(function(){
        $("#sl-0").remove()
        $("#ref-unimedida").html("Por "+$("#sl-unimedida option:selected").html())
    })
</script>