<?php
    require_once("../../require.php");
    reqPopComVoce();
    
    $controller = new PopComVoceController();
    $result = $controller->selectImage($_GET['id']);
?>
<script>
    function loadList(){
        $.ajax({
            type: "GET",
            url: "content/list_popComVoce.php?slide=1",
            success: function(dados){
                $(".container-list-1").html(dados);
            }
        })
        $.ajax({
            type: "GET",
            url: "content/list_popComVoce.php?slide=2",
            success: function(dados){
                $(".container-list-2").html(dados);
            }
        })
    }
    $('#form').submit(function(){
        event.preventDefault();
        var link = "../router.php?controller=popnaescola&action=update&id="+$('#form').data('id');
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
<div class="modal">
    <div class="fechar"><span id="fechar">X</span></div>
    <div class="container-list">
        <div class="caixa-file">
            <h1 >Foto</h1>
            <div class="img-file">
                <img class="img-file" src="<?php echo (str_replace($_SERVER['DOCUMENT_ROOT'], "", $result->getUrl_foto())) ?>" alt="Imagem da promoção">
            </div>
            <form data-id="<?php echo $_GET['id'] ?>" id="form" method="POST" enctype="multipart/form-data">
                <input type="file" name="file"><br>
                <input type="submit" name="btn-edit" value="Salvar">
            </form>
        </div>
    </div>
</div>

