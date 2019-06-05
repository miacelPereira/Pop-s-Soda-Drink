<?php 
    require_once('../php/conexao.php');
    $conn = conexaoBD();
    
    $sql = "select * from tbl_noticias where ativo = 1";

    $result = mysqli_query($conn, $sql);

    while($rs = mysqli_fetch_array($result)){
?>
<a  href="noticiasDeta.php?id=<?php echo $rs['id_noticias'] ?>">
    <div class="caixa-row">
        <div class="img-noticia ">
            <img style=" width: 300px; height:300px;"src="<?php echo (str_replace($_SERVER['DOCUMENT_ROOT'], "", $rs['imagem'])) ?>">
        </div>
        <div class="txt-noticias">
        <h1> <?php echo $rs['titulo'] ?></h1>
        <p> <?php echo $rs['subtitulo'] ?> </p>
        </div>
    </div>
</a>
<?php
    }
?>