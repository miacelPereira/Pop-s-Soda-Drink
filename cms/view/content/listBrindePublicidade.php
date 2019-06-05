<?php

require_once('../../require.php');
reqBrinde();

//$controller = new EstabelecimentoController();

   // $list = $controller->getAll();
    

$listBrindes = new BrindeController();

$rsBrinde = $listBrindes->listBrinde();

//var_dump($rsBrinde);
//for($i = 0; $i< count($rsBrinde); $i++){
    foreach($rsBrinde as $rsBrinde){
?>
    <div class="row">
        <div class="conteudo"><?php echo $rsBrinde->getNome(); ?></div>
        <div class="conteudo"><?php echo substr($rsBrinde->getDescricao(), 0, 10); ?>...</div>
        <div class="conteudo"><?php echo $rsBrinde->getPreco(); ?></div>
        <div class="conteudo-img">
            <div class="icon1" onclick="viewBrinde(<?php echo $rsBrinde->getId(); ?>)" ></div>
            <div class="icon4" >

                 <?php if($rsBrinde->getStatus()==0){
                 ?>
                    <img onclick="statusBrinde(<?php echo($rsBrinde->getId().",".$rsBrinde->getStatus()) ?>)" src="img/desativado.png" style="max-width: 55px;" alt="desativado" title="desativado">
                <?php }else{ ?>
                    <img onclick="statusBrinde(<?php echo($rsBrinde->getId().",".$rsBrinde->getStatus()) ?>)" src="img/ativo.png" style="max-width: 55px;" alt="ativado" title="ativado">
                <?php } ?>
            
            </div>
        </div>
    </div>
<?php } ?> 


