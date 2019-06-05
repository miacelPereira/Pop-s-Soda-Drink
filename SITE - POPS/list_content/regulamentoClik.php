<?php

    require_once('../php/conexao.php');

    $conn = conexaoBD();

    
    if(isset($_GET['id'])){   
        $sql = "SELECT regulamento FROM tbl_promocao WHERE id_promocao=".$_GET['id'];
        $result = mysqli_query($conn, $sql);        
        $rs = mysqli_fetch_array($result);
           
?>

 <div class="texto-regulamento"><?php echo($rs['regulamento'])?> </div>
<?php
    }
?>