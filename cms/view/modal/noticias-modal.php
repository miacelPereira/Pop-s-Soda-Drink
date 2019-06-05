<?php
    if(isset($_POST['id'])){   
        require_once('../../require.php');
        reqNoticias();
        $controller = new NoticiasController();
        $noticia = $controller->getOne($_POST['id']);
    }

?>

<div class="modal">
    <div class="fechar"><span id="fechar">X</span></div>
    <div class="caixa-row-modal">
        <div class="caixa-assunto-modal">Titulo:</div>
        <div class="caixa-conteudo-modal"><?php echo $noticia->getTitulo() ?></div>
    </div>
    <div class="caixa-row-modal">
        <div class="caixa-assunto-modal">Subtitulo:</div>
        <div class="caixa-conteudo-modal"><?php echo $noticia->getSubTitulo() ?></div>
    </div>
    <div class="caixa-row-modal">
        <div class="caixa-assunto-modal">Introdução:</div>
        <div class="caixa-conteudo-modal"><?php echo $noticia->getIntroducao() ?></div>
    </div>
    <div class="caixa-row-modal">
        <div class="caixa-assunto-modal">Texto:</div>
        <div class="caixa-conteudo-modal"><?php echo $noticia->getTexto() ?></div>
    </div>
    <div class="caixa-row-modal">
        <div class="caixa-assunto-modal">Imagem:</div>
        <div class="caixa-conteudo-modal"><img style="width: 500px; height: 500px; " src="<?php echo (str_replace($_SERVER['DOCUMENT_ROOT'], "", $noticia->getImagem())) ?>" alt="Imagem Notícia"></div>
    </div>
</div>
<script>
    $("#fechar").click(function(){
        $("#back-modal").fadeOut(400);
    });
</script>