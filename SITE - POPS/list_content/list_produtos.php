<?php
    require_once('../php/conexao.php');

    $conn = conexaoBD();

    $sql = 'select * from tbl_produto_acabado where ativo = 1';

    $result = mysqli_query($conn, $sql);

    while($rs = mysqli_fetch_array($result)){
?>


        <div class="produtos">
            <div class="img-produto">
                <img class="img" src="<?php echo (str_replace($_SERVER['DOCUMENT_ROOT'], "", $rs['img'])) ?>" alt="imagem-produto" width="200px" height="200px" >
                
                <div class="titulo"><?php echo $rs['nome'] ?></div>
                
                <div class="descricao">
                    Detalhes
                    <div class="hoverdesc">
                        <h1><?php echo $rs['nome'] ?></h1>
                        <br>
                        <?php echo $rs['descricao'] ?>
                        <div class="caixa-nutricional">
                            <h3 style="float: left; padding:10px;" >Tabela Nutricional:</h3>
                            <div class="img-nutri"></div>
                        </div>
                            
                    </div>
                </div>
            </div>
        </div>
        
<?php } ?>