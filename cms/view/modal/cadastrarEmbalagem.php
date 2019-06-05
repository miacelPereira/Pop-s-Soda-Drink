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
        <div><h1 class="header-text">CADASTRAR EMBALAGEM</h1></div>
        <div><h1 class="header-text" id="close-modal">X</h1></div>
    </div>
<div id="modal-body">

    <!-- action="../router.php?controller=matprima&action=insert" -->
    <?php if($edit){ echo '<form id="edit-form" method="post" data-id="'.$_GET['id'].'">';}else{ echo '<form id="form" method="post">';}?>
        <div class="modal-line">
            <p>NOME DA EMBALAGEM:</p>
            <input type="text" class="inp-def" name="txtNome" placeholder="Ex.: Garrafa PET verde 7up 2L">
        </div>
        <div class="modal-line">
            <p>CAPACIDADE (em mililitros):</p>
            <input type="number" name="txtQuantidade" class="inp-def" min="0" placeholder="Digite apenas números">
        </div>
        <div class="modal-line">
            <p>PESO BRUTO DA UNIDADE (em gramas):</p>
            <input type="number" class="inp-def" name="txtPeso" step="any" min="0" placeholder="Digite apenas números (Ex.: 1.050)">
        </div>
        <div class="modal-line">
            <p>IMPOSTO (R$):</p>
            <input type="number" class="inp-def" step="0.01" name="txtImposto" min="0" placeholder="Digite apenas números (Ex.: 0.05)">
        </div>
        <div class="modal-line">
            <p>TEMPO DE RESSUPRIMENTO (Em dias) (?):<br><p style="font-size: 14px;">Tempo que o produto leva para ser produzido.</p></p>
            <input type="number" class="inp-def" step="any" name="txtTempoRessup" min="0" placeholder="Digite números inteiros ou decimais">
        </div>
        <div class="modal-line">
            <p>INTERVALO DE RESSUPRIMENTO (Em dias) (?):<br><p style="font-size: 14px;">Intervalo entre uma produção e a outra do produto.</p></p>
            <input type="number" class="inp-def" step="any" name="txtIntervaloRessup" min="0" placeholder="Em dias">
        </div>
        <div class="modal-line">
            <p>QUANTIDADE ATUAL EM ESTOQUE:</p>
            <input type="number" class="inp-def" name="txtQtdEstoque" min="0" step="1" placeholder="Digite apenas números">
        </div>
        <div class="modal-line">
            <p>LOCALIZAÇÃO NO ESTOQUE:</p>
            <select name="slPrateleira" class="inp-def">
                <?php foreach ($listPrateleira as $prateleira) {
                    
                    echo "<option value='".$prateleira->getId()."'> Corredor ".strtoupper($prateleira->getCorredorName())." - Prateleira ".strtoupper($prateleira->getNumero())."</option>";
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