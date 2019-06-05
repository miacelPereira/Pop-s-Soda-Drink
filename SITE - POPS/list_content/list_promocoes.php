<?php
    require_once('../php/conexao.php');

    $conn = conexaoBD();

    $sql = 'select * from tbl_promocao where ativo = 1';

    $result = mysqli_query($conn, $sql);

    while($rs = mysqli_fetch_array($result)){
?>

    <div class="caixa-passos"  onclick="promoClik(<?php echo $rs['id_promocao']?>)">
             <h5><?php echo $rs['nome'] ?></h5>
        <div class="img-promo">
            <img src="<?php echo (str_replace($_SERVER['DOCUMENT_ROOT'], "", $rs['foto_promocao'])) ?>" alt="imagem-produto" width="200px" height="200px" >
        </div>
    </div>
        
<?php } ?>