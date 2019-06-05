<?php
    require_once('../php/conexao.php');

    $conn = conexaoBD();

    $sql = 'select * from tbl_divulgacao where ativo = 1;';

    $result = mysqli_query($conn, $sql);

    while($rs = mysqli_fetch_array($result)){
?>
    <div class="caixa-divulgacao">
        <h1> <?php echo $rs['nome_estabelecimento'] ?></h1>
        <h5>Local: <?php echo $rs['endereco_evento'] ?> </h5>
        <img class="imgEstabelecimento" style="width: 1400px; height: 400px;" src="<?php echo (str_replace($_SERVER['DOCUMENT_ROOT'], "", $rs['imagem'])) ?>" alt="Imagem Estabelecimento"> 
    </div>
<?php } ?>