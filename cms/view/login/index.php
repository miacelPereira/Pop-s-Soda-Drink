<?php
    session_start();
    $_SESSION['autenticado'] = false;

    // require_once('../../model/DAO/autenticarDao.php');


?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
    <!-- <meta http-equiv="X-UA-Compatible" content="ie=edge"> -->
    <title>LOGIN</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css?f5" />
    <link rel="stylesheet" type="text/css" href="../css/login.css?f5" />
    <!-- <script src="js/script.js"></script> -->
    <!-- <script src="js/jquery.js"></script> -->
</head>
<body>
    <div id="container-login">
        <div id="img-logo" class="align"></div>
        <form action="../../router.php?controller=autenticar&action=autenticar" method="POST">
            <div class="align tooltip">
                <input type="text" name="txtLogin" class="login-input" id="input-login" placeholder="LOGIN" />
                <span class="tooltiptext">Digite sua matricula</span>
            </div>
            <div class="align tooltip">
                <input type="password" name="txtPass" class="login-input" id="input-pass"  placeholder="SENHA"/>
                <span class="tooltiptext">Digite sua senha</span>
            </div>
            <div class="align item-form">
                <input type="submit" name="btnSubmit" value="ENTRAR" id="input-submit"/>
            </div>
        </form>
    </div>
</body>
</html>