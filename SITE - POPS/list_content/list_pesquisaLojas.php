<div class="caixa-lojas">
    <?php
        require_once('../php/conexao.php');

        $conn = conexaoBD();

        if(isset($_GET['pesquisa'])){
            
        $txtPesquisa = $_GET['pesquisa'];
        $sql = "SELECT * FROM tbl_nossas_lojas WHERE cidade LIKE '%".$txtPesquisa."%' OR nome_estabelecimento LIKE '%".$txtPesquisa."%' ";
        $select = mysqli_query($conn ,$sql);
        
         while($rsLojas=mysqli_fetch_array($select)){
                
         ?>
  
        <div class="lojas" onclick="loadUrl(<?php echo $rsLojas['id_nossas_lojas']?>)">
            <?php echo($rsLojas['nome_estabelecimento'].'-'.$rsLojas['numero'].'-'. $rsLojas['endereco'].'-'.$rsLojas['cidade'].'-'.$rsLojas['uf'])?> 
        </div>
   

<?php
}
}
?>
</div>
