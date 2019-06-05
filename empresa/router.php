<?php

@session_start();
require_once('require.php');

if(isset($_GET['controller'])){

    $controller = strtoupper($_GET['controller']);
    $action = strtoupper($_GET['action']);

    switch ($controller) {
        case 'LOGIN':
            
            reqUsuario();
            $controller = new UsuarioController();

            switch ($action) {
                case 'LOGIN':
                    
                    $id = $controller->autenticar();
                    echo $id;
                    
                    break;

                case 'REGISTER':

                    echo $controller->cadastrar();
                    break;

            }
            break;
    }



}

?>