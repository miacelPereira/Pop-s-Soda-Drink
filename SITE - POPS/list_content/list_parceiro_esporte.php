<?php
    require_once('../php/conexao.php');

    $conn = conexaoBD();

    $sql = 'select * from tbl_patrocinadores where ativo = 1';

    $result = mysqli_query($conn, $sql);

    while($rs = mysqli_fetch_array($result)){
?>
    <div class="caixa-patrocionio">
    <div class="img">
        <img class="img-content" src="<?php echo (str_replace($_SERVER['DOCUMENT_ROOT'], "", $rs['imagem'])) ?>" > 
    </div>
    <h1><?php echo $rs['modalidade'] ?></h1>
    <h1> <?php echo $rs['nome_equipe'] ?>"</h1>
    <h2> <?php echo $rs['pais'] ?>"</h2>
    </div>
<?php } ?>