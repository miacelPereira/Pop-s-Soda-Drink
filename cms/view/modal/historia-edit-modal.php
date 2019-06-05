<?php
    if(isset($_POST['id'])){  
        require_once('../../require.php');
        reqHistoria();
        $controller = new HistoriaController();
        $historia = $controller->getOne($_POST['id']);
    }

?>
<script>
    function loadList(){
        $.ajax({
            type: "GET",
            url: "content/list_historia.php",
            success: function(dados){
                $("#container-list").html(dados)
            }
        })
    }

    $('#form').submit(function(){
    event.preventDefault();
    var link = "../router.php?controller=historia&action=update&id="+$('#form').data('id')
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
   <h1 style="text-align: center; font-size: 25px">História Pops</h1>

   <form data-id="<?php echo $_POST['id'] ?>" id="form" method="POST" enctype="multipart/form-data" >  
        <div class="caixa">   
            <div class="txtinput"> <h3 >Título:</h3></div>
            <div class="txtinput"><input type="text" class="txtHistoria" name="txttitulo" value="<?php echo $historia->getTitulo() ?>" placeholder="Título">  </div>
        </div>
        <div class="caixa">
            <div class="txtinput"> <h3 >Subtítulo:</h3></div>
            <div class="txtinput"><input type="text" class="txtHistoria" name="txtsubtitulo" value="<?php echo $historia->getFrase() ?>" placeholder="Subtítulo"></div>
        </div>
        <div class="caixa">
            <div class="txt"> <h3 >História parte 1:</h3><h5>(primeira quebra de texto da história) </h5></div>
            <textarea  name="txthistoriaprimeira"><?php echo $historia->getPrimeiroTexto() ?></textarea>
        </div>
        <div class="caixa">
            <div class="txt"> <h3 >História parte 2:</h3><h5>(segunda quebra de texto da história) </h5></div>
            <textarea name="txthistoriasegunda"><?php echo $historia->getSegundaTexto() ?> </textarea>
        </div>
        <div class="caixa">
            <h3>Foto História</h3>
            <div class="img-file">
                <img style="width: 300px; height: 300px;" src="<?php echo (str_replace($_SERVER['DOCUMENT_ROOT'], "", $historia->getPrimeiraImagem())) ?>" alt="Imagem história"/>
                <input type="file" id="fileprimeira" name="fileprimeira">
            </div>
        </div>
        <div class="caixa">
            <h3>Foto História</h3>
            <div class="img-file">
            <img style="width: 300px; height: 300px;" src="<?php echo (str_replace($_SERVER['DOCUMENT_ROOT'], "", $historia->getSegundaImagem())) ?>" alt="Imagem história"/>
                <input type="file" id="filesegunda" name="filesegunda">
            </div>
        </div>
        <input type="submit" value="salvar">
    </form>
</div>
chrome