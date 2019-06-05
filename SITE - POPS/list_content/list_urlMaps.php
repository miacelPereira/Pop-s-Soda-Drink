<?php

    require_once('../php/conexao.php');

    $conn = conexaoBD();

    
    if(isset($_GET['id'])){   
        $sql = "SELECT urlMaps FROM tbl_nossas_lojas WHERE id_nossas_lojas=".$_GET['id'];
        $result = mysqli_query($conn, $sql);        
        $rsmaps = mysqli_fetch_array($result);
           
?>

 <div class="caixa-maps">
    <iframe src="<?php echo($rsmaps['urlMaps'])?>" width="750" height="550" frameborder="0" style="border:0" allowfullscreen></iframe>
</div> 

<?php
    }
?>