<?php
    require_once('../php/conexao.php');

    $conn = conexaoBD();

    $sql = "SELECT * FROM tbl_videos WHERE status = 1";

    $result = mysqli_query($conn, $sql);

    while($rs = mysqli_fetch_array($result)){
?>
    <div class="caixa-video">
        <div class="video">
            <iframe width="550" height="450" src="<?php echo $rs['video'] ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
        
        <div class="titulo">
            <?php echo $rs['nome_video'] ?>
            <br>
            <?php echo $rs['visualizacoes'] ?> Visualizações
        </div>
    </div>
    
<?php } ?>