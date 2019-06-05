<?php

session_start();

require_once('../require.php');

// echo $_SESSION['pgAtual'].";<br>";

if(isset($_SESSION['autenticado'])){
    if(!$_SESSION['autenticado']){
        echo "NAO AUTENTICADO";
    }else{
        
        reqAutenticarCms();
        reqUsuarioCms();
        reqPermissaoCms();

        $userAutenticado = new UsuarioCms();
        $usuarioCmsDao = new UsuarioCmsDao();
        $permissaoDao = new PermissaoDao();

        $userAutenticado = $usuarioCmsDao->selectById($_SESSION['userAutenticadoId']);

        $userAutenticado->setPermissao( $permissaoDao->getPermissao($userAutenticado->getIdPermissao() ));

    }
}

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
    <!-- <meta http-equiv="X-UA-Compatible" content="ie=edge"> -->
    <title>LOGIN</title>
    <link rel="stylesheet" type="text/css" href="css/style.css?f5" />
    <link rel="stylesheet" type="text/css" href="css/header.css?f5" />
    <link rel="stylesheet" type="text/css" href="css/modal.css?f5" />
    <link rel="stylesheet" type="text/css" href="css/footer.css?f5" />
    <?php
    if(isset($_GET['home'])){
        echo "<link rel='stylesheet' type='text/css' href='css/home.css?f5'/>";
    }

    // paginas de adm 
    else if(isset($_GET['homeAdm'])){
        echo "<link rel='stylesheet' type='text/css' href='css/adm.css?f5'/>";
    }
    else if(isset($_GET['admFaleConosco'])){
        echo "<link rel='stylesheet' type='text/css' href='css/admFaleConosco.css?f5'/>";
    }
    else if(isset($_GET['admPedidos'])){
        echo "<link rel='stylesheet' type='text/css' href='css/admPedidos.css?f5'/>";
    }
    else if(isset($_GET['admChamados'])){
        echo "<link rel='stylesheet' type='text/css' href='css/admChamados.css?f5'/>";
    }
    else if(isset($_GET['admVendidos'])){
        echo "<link rel='stylesheet' type='text/css' href='css/admVendidos.css?f5'/>";
    }
    else if(isset($_GET['admContas'])){
        echo "<link rel='stylesheet' type='text/css' href='css/admContas.css?f5'/>";
    }
    else if(isset($_GET['admProdutos'])){
        echo "<link rel='stylesheet' type='text/css' href='css/admProdutos.css?f5'/>";
    }
    else if(isset($_GET['admBrinde'])){
        echo "<link rel='stylesheet' type='text/css' href='css/admBrinde.css?f5'/>";
    }

    // paginas de Marketing
    else if(isset($_GET['marketing'])){
        echo "<link rel='stylesheet' type='text/css' href='css/homeMarketing.css?f5'/>";
    }
    else if(isset($_GET['contatos'])){
        echo "<link rel='stylesheet' type='text/css' href='css/contatos.css?f5'/>";
    }
    else if(isset($_GET['promocoesAdm'])){
        echo "<link rel='stylesheet' type='text/css' href='css/promocoes.css?f5'/>";
    }
    else if(isset($_GET['videosAdm'])){
        echo "<link rel='stylesheet' type='text/css' href='css/videos.css?f5'/>";
    }
    else if(isset($_GET['nossasLojasAdm'])){
        echo "<link rel='stylesheet' type='text/css' href='css/nossasLojas.css?f5'/>";
    }
    else if(isset($_GET['estabelecimentoAdm'])){
        echo "<link rel='stylesheet' type='text/css' href='css/estabelecimento.css?f5'/>";
    }
    else if(isset($_GET['popComVoceAdm'])){
        echo "<link rel='stylesheet' type='text/css' href='css/popComVoce.css?f5'/>";
    }
    else if(isset($_GET['eventosAdm'])){
        echo "<link rel='stylesheet' type='text/css' href='css/popComVoce.css?f5'/>";
    }
    else if(isset($_GET['noticiasAdm'])){
        echo "<link rel='stylesheet' type='text/css' href='css/noticias.css?f5'/>";
    }
    else if(isset($_GET['parceirosAdm'])){
        echo "<link rel='stylesheet' type='text/css' href='css/parceiros.css?f5'/>";
    }
    else if(isset($_GET['enquete'])){
        echo "<link rel='stylesheet' type='text/css' href='css/enquete.css?f5'/>";
    }

    else if(isset($_GET['aprovarConta'])){
        echo "<link rel='stylesheet' type='text/css' href='css/aprovarConta.css?f5'/>";
    }


    // paginas de funcionarios
    else if(isset($_GET['funcionario'])){
        echo "<link rel='stylesheet' type='text/css' href='css/homeFuncionario.css?f5'/>";
    }else if(isset($_GET['usuario'])){
        echo "<link rel='stylesheet' type='text/css' href='css/admUsuarios.css?f5'/>";
    }
    else if(isset($_GET['permissao'])){
        echo "<link rel='stylesheet' type='text/css' href='css/permissoes.css?f5'/>";
    }

    // paginas de Publicidades
    else if(isset($_GET['publicidade'])){
        echo "<link rel='stylesheet' type='text/css' href='css/homePublicidade.css?f5'/>";
    }
    else if(isset($_GET['contPaginas'])){
        echo "<link rel='stylesheet' type='text/css' href='css/contPaginas.css?f5'/>";
    }
    else if(isset($_GET['comunidade'])){
        echo "<link rel='stylesheet' type='text/css' href='css/comunidade.css?f5'/>";
    }
    else if(isset($_GET['estatistica'])){
        echo "<link rel='stylesheet' type='text/css' href='css/estatistica.css?f5'/>";
    }

    // edição das paginas 
    else if(isset($_GET['homePaginas'])){
        echo "<link rel='stylesheet' type='text/css' href='css/homePaginas.css?f5'/>";
    }
     else if(isset($_GET['produtos'])){
        echo "<link rel='stylesheet' type='text/css' href='css/produtos.css?f5'/>";
    }
    else if(isset($_GET['brindes'])){
        echo "<link rel='stylesheet' type='text/css' href='css/brindes.css?f5'/>";
    }
    else if(isset($_GET['noticias'])){
        echo "<link rel='stylesheet' type='text/css' href='css/noticias.css?f5'/>";
    }
     else if(isset($_GET['missaoValores'])){
        echo "<link rel='stylesheet' type='text/css' href='css/missaoValores.css?f5'/>";
    }
    else if(isset($_GET['homeSite'])){
        echo "<link rel='stylesheet' type='text/css' href='css/homeSite.css?f5'/>";
    }
    else if(isset($_GET['estabelecimento'])){
        echo "<link rel='stylesheet' type='text/css' href='css/estabelecimento.css?f5'/>";
    }
    else if(isset($_GET['eventos'])){
        echo "<link rel='stylesheet' type='text/css' href='css/eventos.css?f5'/>";
    }
    else if(isset($_GET['faleConosco'])){
        echo "<link rel='stylesheet' type='text/css' href='css/faleConosco.css?f5'/>";
    }
    else if(isset($_GET['historia'])){
        echo "<link rel='stylesheet' type='text/css' href='css/historia.css?f5'/>";
    }
    else if(isset($_GET['nossasLojas'])){
        echo "<link rel='stylesheet' type='text/css' href='css/nossasLojas.css?f5'/>";
    }
    else if(isset($_GET['videos'])){
        echo "<link rel='stylesheet' type='text/css' href='css/videos.css?f5'/>";
    }
    else if(isset($_GET['parceiros'])){
        echo "<link rel='stylesheet' type='text/css' href='css/parceiros.css?f5'/>";
    }
    else if(isset($_GET['popComVoce'])){
        echo "<link rel='stylesheet' type='text/css' href='css/popComVoce.css?f5'/>";
    }
    else if(isset($_GET['promocoes'])){
        echo "<link rel='stylesheet' type='text/css' href='css/promocoes.css?f5'/>";
    }

    else if(isset($_GET['admMateriaPrima'])){
        echo "<link rel='stylesheet' type='text/css' href='css/materiaPrima.css?f5'/>";
    }
    else if(isset($_GET['admEmbalagem'])){
        echo "<link rel='stylesheet' type='text/css' href='css/admEmbalagem.css?f5'/>";
    }
    else if(isset($_GET['nossasLojas'])){
        echo "<link rel='stylesheet' type='text/css' href='css/nossasLojas.css?f5'/>";
    }

    

    ?>
    <script src="js/jquery.js"></script>
    <script src="js/script.js"></script>
    
</head>
<body>
  
    

    <div id="back-modal"><div id="modal"></div></div>
    <div id="bg-transparency">
        <div id="container">
            
            <header>
                <?php require_once("header.html"); ?>
            </header>
            <section id="content-body">
                <?php

                $permissoes = $userAutenticado->getPermissao();

                if(isset($_GET['home'])){
                            
                    require_once("home/home.html");
                }
                else if(isset($_GET['usuarios'])){

                    
                    $permissoesUsuarios = $permissoes->getCmsUser();

                    // Verifica se o usuario tem permissao de leitura (R = READY) da pagina;
                    // IMPORTANTE: CONCATENAR COM UM CARACTERE ANTES DA VARIÁVEL
                    // porque strpos retorna a posicao do caractere buscado; se ela for 0, será interpretada como NULL;
                    // concatenando com um caractere antes, o primeiro índice vindo do banco será "1";
                    $acesso = strpos("p".$permissoesUsuarios, "R");

                    if($acesso != null){

                        require_once("usuarios/usuarios.php");
                    }else{
                        echo "<div style='height: 90vh; line-height: 70vh; background-color: #0009; color: #99ff99; font-size: 40px; text-align: center;'>OPS! Você não tem permissão de leitura dessa página</div>";
                    }
                
                 // paginas de admin 

                }
                else if(isset($_GET['usuario'])){
                    require_once("funcionario/usuarios.html");
                }
                else if(isset($_GET['permissao'])){
                    require_once("funcionario/permissoes.html");
                }
                else if(isset($_GET['homeAdm']))
                {
                    require_once("admin/homeAdm.html");

                }else if(isset($_GET['admFaleConosco']))
                {
                    require_once("admin/admFaleConosco.php");

                }else if(isset($_GET['admPedidos']))
                {
                    require_once("admin/admPedidos.html");

                }else if(isset($_GET['admChamados']))
                {
                    require_once("admin/admChamados.html");

                }else if(isset($_GET['admVendidos']))
                {
                    require_once("admin/admVendidos.html");

                }else if(isset($_GET['admContas'])){
                    require_once("admin/admContas.html");
                }
                else if(isset($_GET['admProdutos'])){

                    reqUniMedida();
                    reqPrateleira();
                    reqEmbalagem();
                    require_once("admin/admProdutos.php");
                    echo "<script src='js/admProdutos.js'></script>";
                }
                else if(isset($_GET['admMateriaPrima'])){

                    reqMateriaPrima();
                    require_once("admin/admMateriaPrima.php");
                }
                else if(isset($_GET['admEmbalagem'])){
                    
                    reqEmbalagem();
                    require_once("admin/admEmbalagem.php");
                    echo "<script src='js/admEmbalagem.js'></script>";
                }
                else if(isset($_GET['admBrinde'])){
                   
                    reqBrinde();
                    require_once("admin/admBrinde.html");
                }

                // paginas de marketing 
                else if(isset($_GET['marketing']))
                {
                    require_once("marketing/homeMarketing.html");

                }else if(isset($_GET['contatos']))
                {
                    require_once("marketing/contatos.php");

                }
                else if(isset($_GET['promocoesAdm'])){
                    require_once("marketing/promocoesAdm.html");
                }
                else if(isset($_GET['videosAdm'])){
                    require_once("marketing/videosAdm.php");
                }
                else if(isset($_GET['nossasLojasAdm'])){
                    require_once("marketing/nossasLojasAdm.html");
                }
                else if(isset($_GET['estabelecimentoAdm'])){
                    require_once("marketing/estabelecimentoAdm.html");
                }
                else if(isset($_GET['popComVoceAdm'])){
                    require_once("marketing/popComVoceAdm.html");
                }
                else if(isset($_GET['eventosAdm'])){
                    require_once("marketing/eventosAdm.php");
                }
                else if(isset($_GET['noticiasAdm'])){
                    require_once("marketing/noticiasAdm.html");
                }
                else if(isset($_GET['parceirosAdm'])){
                    require_once("marketing/parceirosAdm.html");
                }
                else if(isset($_GET['enquete'])){
                    require_once("marketing/enquete.html");
                }

                else if(isset($_GET['aprovarConta'])){
                    require_once("marketing/aprovarConta.html");
                }


                // paginas de funcionarios
                else if(isset($_GET['funcionario']))
                {
                    require_once("funcionario/homeFuncionario.html");

                }

                // paginas de Publicidade
                else if(isset($_GET['publicidade']))
                {
                    require_once("publicidade/homePublicidade.html");

                }else if(isset($_GET['contPaginas']))
                {
                    require_once("publicidade/contPaginas.html");

                }else if(isset($_GET['comunidade']))
                {
                    require_once("publicidade/comunidade.html");
                }else if(isset($_GET['estatistica']))
                {
                    require_once("publicidade/estatistica.html");
                }

                // paginas 
                else if(isset($_GET['homePaginas']))
                {
                  require_once("publicidade/paginas/homePaginas.html");

                }else if(isset($_GET['produtos']))
                {
                  require_once("publicidade/paginas/produtos.html");

                }else if(isset($_GET['brindes']))
                {
                  require_once("publicidade/paginas/brindes.html");

                }else if(isset($_GET['noticias']))
                {
                  require_once("publicidade/paginas/noticias.html");

                }else if(isset($_GET['missaoValores']))
                {
                  require_once("publicidade/paginas/missaoValores.html");
                }
                else if(isset($_GET['homeSite']))
                {
                    require_once("publicidade/paginas/homeSite.html");
                }
                else if(isset($_GET['estabelecimento']))
                {
                    require_once("publicidade/paginas/estabelecimento.html");
                }
                else if(isset($_GET['eventos']))
                {
                    require_once("publicidade/paginas/eventos.php");
                }
                else if(isset($_GET['faleConosco']))
                {
                    require_once("publicidade/paginas/faleConosco.php");
                }
                else if(isset($_GET['historia']))
                {
                    require_once("publicidade/paginas/historia.html");
                }
                else if(isset($_GET['nossasLojas']))
                {
                    require_once("publicidade/paginas/nossasLojas.html");
                }
                else if(isset($_GET['videos']))
                {
                    require_once("publicidade/paginas/videos.php");
                }
                else if(isset($_GET['parceiros']))
                {
                    require_once("publicidade/paginas/parceiros.html");
                }
                else if(isset($_GET['popComVoce']))
                {
                    require_once("publicidade/paginas/popComVoce.html");
                
                }
                else if(isset($_GET['promocoes']))
                {
                    require_once("publicidade/paginas/promocoes.html");
                }
                else if(isset($_GET['admEmbalagem'])){
                  
                }
                else if(isset($_GET['nossasLojas'])){
                    require_once("publicidade/paginas/nossasLojas.html");
                }
                ?>
            </section>
            <footer>
                <?php require_once("footer.html"); ?>
            </footer>
        </div>
    </div>
</body>
</html>