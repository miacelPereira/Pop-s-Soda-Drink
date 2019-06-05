<?php

require_once('../../require.php');
reqBrinde();

$listBrindes = new BrindeController();

$rsBrinde = $listBrindes->listBrinde();



//Função para esconder os "warning" de erro 
ini_set('display_errors', 0 );
error_reporting(0);

//var_dump($rsBrinde);
for($i = 0; $i< count($rsBrinde); $i++){

?>
    <div class="row">
        <div class="conteudo"><?php echo $rsBrinde[$i]->getNome(); ?></div>
        <div class="conteudo"><?php echo substr($rsBrinde[$i]->getDescricao(), 0, 10); ?>...</div>
        <div class="conteudo"><?php echo $rsBrinde[$i]->getPreco(); ?></div>
        <div class="conteudo-img">
            <div class="icon1" onclick="viewBrinde(<?php echo $rsBrinde[$i]->getId(); ?>)" ></div>
           <a> <div class="icon2"  onclick="deleteBrinde(<?php echo $rsBrinde[$i]->getId(); ?>)" ></div> </a>
            <div class="icon3" onclick="editBrinde(<?php echo $rsBrinde[$i]->getId(); ?>)"></div>
        </div>
    </div>
<?php } ?>          
