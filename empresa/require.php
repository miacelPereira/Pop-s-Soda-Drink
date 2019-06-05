<?php

@session_start();

$_SESSION['prefix'] = $_SERVER['DOCUMENT_ROOT']."/inf4m20191/tcc/empresa/";

require_once($_SESSION['prefix'].'dao/mysqlConn.php');

function reqUsuario(){
    require_once($_SESSION['prefix'].'model/usuarioClass.php');
    require_once($_SESSION['prefix'].'dao/usuarioDao.php');
    require_once($_SESSION['prefix'].'controller/usuarioController.php');
}

?>