<?php 
    require_once('../php/conexao.php');

    $conn = conexaoBD();

    if(isset($_GET['data'])){
        if($_GET['data'] == 'maior'){
            $sql = "select * from tbl_evento where data <= '".date('Y-m-d')."';";
        }else{
            $sql = "select * from tbl_evento where data >= '".date('Y-m-d')."';";
        }
    }
    $result = mysqli_query($conn, $sql);

    while($rs = mysqli_fetch_array($result)){
?>
    <div class="evento">
        <div class="caixa-event">
                <p> <?php echo $rs['nome_evento'] ?> </p>
            <br>
                <p> <?php echo $rs['endereco'] ?> </p>
            <br>
            Ás <?php echo $rs['hora'] ?>  do Dia  <?php echo date("d/m/Y", strtotime($rs['data'])) ?>
        </div>
    </div>
<?php } ?>