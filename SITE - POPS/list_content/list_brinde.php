<?php
    require_once('../php/conexao.php');

    $conn = conexaoBD();

    $sql = 'select b.*, f.img  from tbl_brinde as b inner join tbl_foto_brinde as f on b.id_brinde = f.id_brinde';

    $result = mysqli_query($conn, $sql);

    while($rs = mysqli_fetch_array($result)){
?>


    <div class="produtos">
        <div class="img-produto">
             <img src="<?php echo (str_replace($_SERVER['DOCUMENT_ROOT'], "", $rs['img'])) ?>" alt="imagem-produto" width="200px" height="200px" >
            <div class="titulo"><?php echo $rs['nome'] ?></div>
            <div class="tipo"><?php echo $rs['preco'] ?></div>
            <div class="carrinho">
                <input type="button" value="Adicionar ao carrinho">
            </div> 
        </div>
    </div>
 
        
<?php } ?>