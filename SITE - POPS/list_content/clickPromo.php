<?php

    require_once('../php/conexao.php');

    $conn = conexaoBD();

    
    if(isset($_GET['id'])){   
        $sql = "SELECT descricao FROM tbl_promocao WHERE id_promocao=".$_GET['id'];
        $result = mysqli_query($conn, $sql);        
        $rs = mysqli_fetch_array($result);
           
?>
    <div class="caixa-desc">
        <?php echo($rs['descricao'])?>
    </div>
  
<?php
    }
?>