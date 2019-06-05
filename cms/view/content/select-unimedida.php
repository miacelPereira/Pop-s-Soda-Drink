<?php

@session_start();
require_once($_SESSION['prefix'].'require.php');
reqUniMedida();

$uniMedidaController = new UniMedidaController();
$listUm = $uniMedidaController->getAll();

foreach ($listUm as $option) {
    
    echo "<option value=\"".$option->getId()."\">".strtoupper($option->getAbrev())."</option>";    
}

?>