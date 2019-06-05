<?php 
     if(isset($_POST['id'])){  
        require_once('../../require.php');
        reqParceiro();
        $controller = new ParceiroController();
        $parceiro = $controller->getOne($_POST['id']);
    }
?>
<script>
    function loadList(){
        $.ajax({
            type: "GET",
            url: "content/list_parceiro.php",
            success: function(dados){
                $("#container-list").html(dados)
            }
        })
    }
    $('#form').submit(function(){
        event.preventDefault();
        var link = "../router.php?controller=parceiro&action=update&id="+$('#form').data('id');
        $.ajax({
            type: "POST",
            url: link,
            data: new FormData($('#form')[0]), 
            cache: false,
            contentType: false,
            processData: false,
            async: true,
            success: function(data){
                $('#back-modal').fadeOut(200);
                loadList();
            }
        });
    });
</script>

<div class="modal" style="text-align: center;">
    <div class="fechar">X</div>
    <h1 style="text-align: center; font-size: 25px">Parceiros no esporte</h1>
    <form id="form" method="POST"  data-id="<?php echo $_POST['id'] ?>" >
        <div class="caixa-file" style="margin-top: 20px;">
            <div class="img-file">
                <img src="<?php echo (str_replace($_SERVER['DOCUMENT_ROOT'], "", $parceiro->getImagem())) ?>" alt="Imagem do patrocinado" >
            </div>
            <input type="file" name="file-imagem">
        </div>
        <div class="caixa">
            <div class="txt"> <h3 >Nome:</h3></div>
            <input type="text" name="txt-nome" value="<?php echo $parceiro->getNome() ?>" >
        </div>
        <div class="caixa">
            <div class="txt"> <h3 >Esporte:</h3></div>
            <input type="text"  name="txt-esporte" value="<?php echo $parceiro->getModalidade() ?>">
        </div>
        <div class="caixa" >
            <div class="txt"> <h3 >Pais:</h3></div>
            <input type="text"  name="txt-pais" value="<?php echo $parceiro->getPais() ?>">
        </div>
        <div class="caixa-btn">
            <input type="submit" class="btn-salvar" value="salvar">
        </div>
    </form>
</div>