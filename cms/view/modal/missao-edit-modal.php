<?php 
     if(isset($_POST['id'])){  
        require_once('../../require.php');
        reqMissaoValor();
        $controller = new MissaoValorController();
        $missao = $controller->getOne($_POST['id']);
    }
?>
<script>
    function loadList(){
        $.ajax({
            type: "GET",
            url: "content/list_missaoValor.php",
            success: function(dados){
                $("#container-list").html(dados)
            }
        })
    }
    $('#form').submit(function(){
        event.preventDefault();
        var link = "../router.php?controller=missao&action=update&id="+$('#form').data('id');
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
    <h1 style="text-align: center; font-size: 25px">Missão Visão e Valores</h1>

    <form id="form" data-id="<?php echo $_POST['id'] ?>" method="POST" enctype="multipart/form-data">
        <div class="caixa">
            <div class="txt"> <h3 >Missão</h3></div>
            <textarea name="txt-missao"> <?php echo $missao->getMissao() ?> </textarea>
        </div>
        <div class="caixa">
            <div class="txt"> <h3 >Visão :</h3></div>
            <textarea name="txt-visao"><?php echo $missao->getVisao() ?></textarea>
        </div>
        <div class="caixa">
            <div class="txt" style="margin:auto"> <h3 >Valores:</h3></div>
            <textarea name="txt-valores"> <?php echo $missao->getValor() ?> </textarea>
        </div>
        <div class="caixa-file">
            <h3>Foto</h3>
            <div class="img-file">
                <img style="width: 600px; height: 250px;" src="<?php echo (str_replace($_SERVER['DOCUMENT_ROOT'], "", $missao->getImagem())) ?>" alt="Imagem missão, visão e valores"/>
                <input type="file" name="file-missao">
            </div>
        </div>
        <div id="div-btn">
            <input type="submit" class="btn-submit" value="salvar">
        </div>
    </form>
</div>