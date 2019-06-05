<!-- <script>

    function loadUrl(idRegistro){
            $.ajax({
                type: "GET",
                url: "list_content/list_urlMaps.php",
                data: {id:idRegistro},
                success: function(dados){
                    $(".lojas").html(dados)
                }
            });
        }


</script>
 -->

<div class="caixa-lojas">
    
<?php
    require_once('../php/conexao.php');

    $conn = conexaoBD();

    $sql = 'select * from tbl_nossas_lojas where ativo = 1;';

    $result = mysqli_query($conn, $sql);

    while($rsLojas = mysqli_fetch_array($result)){
?>
        <div class="lojas" onclick="loadUrl(<?php echo $rsLojas['id_nossas_lojas']?>)">
            <?php echo($rsLojas['nome_estabelecimento'].'-'.$rsLojas['numero'].'-'. $rsLojas['endereco'].'-'.$rsLojas['cidade'].'-'.$rsLojas['uf'])?> 
        </div>
   
    
<?php
}
?>

</div>

