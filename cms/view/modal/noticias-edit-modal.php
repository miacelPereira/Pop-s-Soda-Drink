<?php
    if(isset($_POST['id'])){   
        require_once('../../require.php');
        reqNoticias();
        $controller = new NoticiasController();
        $noticia = $controller->getOne($_POST['id']);
    }
?>
<script>
    function loadList(){
        $.ajax({
            type: "GET",
            url: "content/list_noticias.php",
            success: function(dados){
                $("#container-list").html(dados)
            }
        })
    }
    $('#form').submit(function(id){
    event.preventDefault();
    
    var link = "../router.php?controller=noticia&action=update&id="+$('#form').data('id');
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
    <h1 class="caixa-assunto-modal" style="text-align: center"> Editar notícia </h1>
    <form id="form" data-id="<?php echo $_POST['id'] ?>" method="POST" enctype="multipart/form-data" > 
        <div class="caixa-row-modal">    
            <div class="caixa-assunto-modal">Titulo:</div>
            <div class="caixa-conteudo-modal">
                <input type="text" style="border: none; width: 100%" name="txt-titulo" value="<?php echo $noticia->getTitulo() ?>" />
            </div>
        </div>
        <div class="caixa-row-modal">
            <div class="caixa-assunto-modal">Subtitulo:</div>
            <div class="caixa-conteudo-modal">
                <textarea class="caixa-conteudo-modal" name="txt-subtitulo"> <?php echo $noticia->getSubTitulo() ?> </textarea>
            </div>
        </div>
        <div class="caixa-row-modal">
            <div class="caixa-assunto-modal">Introdução:</div>
            <div class="caixa-conteudo-modal">
                <textarea class="caixa-conteudo-modal" name="txt-introducao"> <?php echo $noticia->getIntroducao() ?> </textarea>
            </div>
        </div>
        <div class="caixa-row-modal">
            <div class="caixa-assunto-modal">Texto:</div>
            <div class="caixa-conteudo-modal">
                <textarea class="caixa-conteudo-modal" name="txt-texto"><?php echo $noticia->getTexto() ?></textarea>
            </div>
        </div>
        <div class="caixa-row-modal">
            <div class="caixa-assunto-modal">Imagem:</div>
            <div class="caixa-conteudo-modal"><img style="width: 500px; height: 500px; " src="<?php echo (str_replace($_SERVER['DOCUMENT_ROOT'], "", $noticia->getImagem())) ?>" alt="Imagem Notícia"></div>
            <input type="file" name="file-imagem">
        </div>
        <input type="submit" style="margin-top: 20px;margin-bottom: 20px;" name="btn-form" value="salvar"> 
    </form>
</div>
<script>
    $("#fechar").click(function(){
        $("#back-modal").fadeOut(400);
    });
</script>