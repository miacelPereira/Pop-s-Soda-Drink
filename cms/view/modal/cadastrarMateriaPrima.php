<?php

//TODO: Tela de LOGOUT;

@session_start();

require_once($_SESSION['prefix']."require.php");
reqPrateleira();
reqMateriaPrima();

$prateleiraController = new PrateleiraController();
$listPrateleira = $prateleiraController->getAll();

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
        <div><h1 class="header-text">CADASTRAR NOVA MATÉRIA-PRIMA</h1></div>
        <div><h1 class="header-text" id="close-modal">X</h1></div>
    </div>
<div id="modal-body">
    <?php if($edit){ echo '<form id="edit-form" method="post" data-id="'.$_GET['id'].'">';}else{ echo '<form id="form" method="post">';}?>
        <div class="modal-line">
            <p>NOME:</p>
            <input type="text" name="txtNome" id="txt-nome" placeholder="Ex: Açucar refinado" <?php if($edit) echo "value='".utf8_decode($matprima->getNome())."' disabled";?> >
        </div>
        <div class="modal-line">
            <p>UNIDADE DE MEDIDA</p>
            <select name="slUniMedida" id="sl-unimedida" <?php if($edit) echo "disabled";?>>
                <?php if($edit){ echo "<option value='".$matprima->getUnidadeMedida()."'>".strtoupper($matprima->getUnidadeMedida('abrev'))."</option>"; }else{ echo "<option id='sl-0' value='0'>Selecione</option>";}?>
            </select>
        </div>
        <div class="modal-line">
            <p>IMPOSTO (R$) (<span id="ref-unimedida">Referente à unidade de medida</span>):</p>
            <input type="number" name="txtImposto" id="txt-imposto" step="any" placeholder='Ex: 0.05 (Somente números, "." ou ",")' <?php if($edit) echo "value='".$matprima->getImposto()."' disabled";?>>
        </div>
        <div class="modal-line">
            <p>TEMPO DE RESSUPRIMENTO (Em dias):</p>
            <input type="number" name="txtTempoRessup" step="any" <?php if($edit) echo "value='".$matprima->getTempoRessuprimento()."' disabled";?>>
        </div>
        <div class="modal-line">
            <p>INTERVALO DE RESSUPRIMENTO (Em dias):</p>
            <input type="number" name="txtIntervaloRessup" step="any" placeholder='Tempo que leva para ser ressuprido' <?php if($edit) echo "value='".$matprima->getIntervaloRessuprimento()."' disabled";?>>
        </div>
        <div class="modal-line">
            <p>LOCALIZAÇÃO NO ESTOQUE:</p>
            <select name="slPrateleira" <?php if($edit) echo "disabled";?>>
                <?php foreach ($listPrateleira as $prateleira) {
                    
                    echo "<option value='".$prateleira->getId()."'> Corredor ".strtoupper($prateleira->getCorredorName())." - Prateleira ".strtoupper($prateleira->getNumero())."</option>";
                }?>
            </select>
        </div>
        <div class="modal-line">
            <p>QUANTIDADE ATUAL EM ESTOQUE:</p>
            <input type="number" name="txtQtdEstoque" placeholder='Referente à unidade de medida' <?php if($edit) echo "value='".$matprima->getQuantidadeEstoque()."' disabled";?>>
        </div>
        <div class="modal-line">
            <?php if($edit){ echo '<input type="button" value="EDITAR" id="btn-edit-sub" onclick="btnEditSubmit();">'; }else{ echo '<input type="submit" value="CADASTRAR">'; }?>
            <input type="submit" value="SALVAR" id="btn-edit-sub2" style="display: none;">
        </div>
    </form>
    
</div>
<script src="js/cadastroMateriaPrima.js"></script>
<script>
$('#edit-form').submit(function(){

//Cancela o submit do HTML
event.preventDefault();

console.log(location.href);

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
            alert("FALHA NO REGISTRO! Tente novamente");
        }
        
        $('#back-modal').fadeOut(200);
        listMateriaPrima();

    }

});

});
</script>