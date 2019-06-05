<?php
    @session_start();

    require_once('require.php');

    if(isset($_GET['controller'])){

        $controller = strtoupper($_GET['controller']);
        $action = strtoupper($_GET['action']);

        switch ($controller) {
            case 'POPNAESCOLA':
                reqPopComVoce();
            
                $controller = new PopComVoceController();
            
                switch ($action){
                    case 'DELETE':
                        $controller->deleteSlide($_POST['id']);
                        break;
                    case 'DISABLE':
                        $controller->disableSlide($_POST['id'], $_POST['ativo']);
                        break;
                    case 'UPDATE':
                        $controller->update($_GET['id']);
                        break;
                    case 'INSERT':
                        $controller->insert($_GET['slide']);
                        break;     
                }
            break;

            case 'CHAMADOS':
            reqChamadosCms();
            
            $controller = new ChamadosController();
            
            if($action == 'DELETE'){
                $controller->deleteChamados($_POST['id']);      
            }
            break;

            case 'COMUNIDADE':
                reqComunidadeCms();
                
                $controller = new ComunidadeController();
                
                if($action == 'DELETE'){
                    $controller->deletePost($_POST['id']);      
                }else if($action == 'DISABLE'){
                    $controller->disablePost($_POST['id'], $_POST['ativo']);
                }
                break;
            case 'NOTICIA':
                reqNoticias();
                
                $controller = new NoticiasController();
                
                switch ($action){
                    case 'DELETE':
                        $controller->delete($_POST['id']);
                        break;
                    case 'DISABLE':
                        $controller->disable($_POST['id'], $_POST['ativo']);
                        break;
                    case 'UPDATE':
                        $controller->update();
                        break;
                    case 'INSERT':
                        $controller->add();
                        break;
                }
        
                break;
            
            case 'PARCEIRO':
                reqParceiro();
                
                $controller = new ParceiroController();
                
                switch ($action){
                    case 'DELETE':
                        $controller->delete($_POST['id']);
                        break;
                    case 'DISABLE':
                        $controller->disable($_POST['id'], $_POST['ativo']);
                        break;
                    case 'UPDATE':
                        $controller->edit();    
                        break;
                    case 'INSERT':
                        $controller->add();
                        break;

                }

                break;

            case 'MISSAO':
                reqMissaoValor();

                $controller = new MissaoValorController();
                
                switch ($action){
                    case 'DELETE':
                        $controller->delete($_POST['id']);
                        break;
                    case 'DISABLE':
                        $controller->disable($_POST['id'], $_POST['ativo']);
                        break;
                    case 'UPDATE':
                        $controller->update();    
                        break;
                    case 'INSERT':
                        $controller->add();
                        break;

                }

                break;

            case 'DIVULGACAO':
                reqEstabelecimento();

                $controller = new EstabelecimentoController();
                
                switch($action){
                    case 'DELETE':
                        $controller->deleteDivul($_POST['id']);
                        break;
                    case 'DISABLE':
                        $controller->disableDivul($_POST['id'], $_POST['ativo']);
                        break;
                }
                break;

            case 'LOJA':
                reqLojas();
                $controller = new LojaController();
                
                switch($action){
                    case 'DELETE':
                        $controller->delete($_POST['id']);
                        break;
                    case 'DISABLE':
                        $controller->disable($_POST['id'], $_POST['ativo']);
                        break;
                }
                break;
                
            case 'HISTORIA':
            
                reqHistoria();

                $controller = new HistoriaController();
                
                switch($action){
                    case 'DELETE':
                        $controller->delete($_POST['id']);
                        break;
                    case 'DISABLE':
                        $controller->disable($_POST['id'], $_POST['ativo']);
                        break;
                    case 'INSERT':
                        $controller->add(); 
                        break;
                    case 'UPDATE':
                        $controller->update(); 
                        break;
                }   

                break;

            case 'MATPRIMA':

                reqMateriaPrima();

                $controller = new MateriaPrimaController();
                
                switch ($action) {
                    case 'INSERT':
                        
                        $return = $controller->insert();
                        echo $return;

                        break;

                    case 'UPDATE':
                        
                        if(isset($_GET['id'])){
                         
                            $return = $controller->update($_GET['id']);
                            echo $return;

                        }
                        break;

                    case 'DELETE':
                        
                        if(isset($_GET['id'])){
                         
                            
                            $return = $controller->deleteMateria($_GET['id']);
                            echo $return;

                        }
                        break;
                }

                break;

            case 'AUTENTICAR':
                
                // echo "controller = autenticar <br>";

                reqAutenticarCms();
                reqUsuarioCms();
                reqPermissaoCms();

                
                
                // require_once('controller/autenticarController.php');
                $autenticarController = new AutenticarController();

                if($action == 'AUTENTICAR'){

                    $user = $autenticarController->autenticar();

                    // var_dump($user);


                    if($user != "FALHA"){

                        $_SESSION['autenticado'] = true;
                        $_SESSION['userAutenticadoId'] = $user->getId();
                    }else{
                        $autenticarReturn = false;
                        $_SESSION['autenticado'] = false;
                    }
                }

                if(isset($_SESSION['autenticado'])){

                    // echo "sessao_autenticado = ".$_SESSION['autenticado']. "<br>";
            
                    if ($_SESSION['autenticado']){
            
                        header("location:view/index.php?home");
                        
                    }else{
                        // header('location:view/login/');
                        // echo "autenticado = false; <br>";
                    }
                }else{
                    // echo "autenticado nao existe; <br>";
                    
                    // header('location:view/login/');
            
                }
            
                break;

            case 'USUARIO':

                // echo "controller = USUARIO <br>";

                // require_once('model/DAO/usuarioCmsDao.php');
                // require_once('controller/usuarioController.php');
                // require_once('model/usuarioCmsClass.php');

                // require_once('model/DAO/permissaoDao.php');
                // require_once('controller/permissaoController.php');
                // require_once('model/permissaoCmsClass.php');

                reqUsuarioCms();
                reqPermissaoCms();
                // reqPermissaoCms();

                $usuarioController = new UsuarioController();

                // echo "AQUIIIIIIIIIIIII<br><br>";
                // var_dump($_POST);
                // echo "AQUIIIIIIIIIIIII<br><br>";

                switch ($action) {
                    case 'INSERT':
                        
                        if(isset($_POST['cbPermissaoPadrao'])){
                            // echo "existe cbPermissaoPadrao<br>";
                            
                            $return = $usuarioController->insertUsuario();

                            echo $return;
                        }else{
                            // echo "TÁ NO ELSE<br>";

                            $permissaoController = new PermissaoController();

                            //insertPermissao não padrão
                            $lastPermissaoId = $permissaoController->insertPermissao(0);

                            // echo "<br>LPID: $lastPermissaoId<br>";
                            //insertUsuario passando id da permissão
                            $return = $usuarioController->insertUsuarioNovaPermissao($lastPermissaoId);

                            echo $return;
                        }

                        break;

                    case 'UPDATE':

                        // echo $_POST['txtNome']."<br>";
                        // echo $_POST['txtLogin']."<br>";
                        // echo $_POST['txtSenha']."<br>";

                        $usuarioController->updateUsuario($_GET['id']);
                        // var_dump($_POST);

                        // echo "<br>".$_GET['id'];
                        
                        break;

                    case 'DELETE':

                        $usuarioController->deleteUsuario($_GET['id']);
                        
                        break;
                }

                break;
            
            case 'PERMISSAO':

                // echo "controller = PERMISSAO <br>";

                // require_once('model/DAO/permissaoDao.php');
                // require_once('controller/permissaoController.php');
                // require_once('model/permissaoCmsClass.php');
                reqPermissaoCms();

                $permissaoController = new PermissaoController();

                switch ($action) {
                    case 'INSERT':
                        
                        $idLastPermission = $permissaoController->insertPermissao(1); 

                        // VERIFICAR SE FOI SALVO COM SUCESSO (return = id do ult registro no banco)
                        // if($idLastPermission > 0){
                            echo $idLastPermission;
                        // }else{
                            // echo "FALHA";
                        // }
                        
                        break;

                    case 'UPDATE':
                        
                        $result = $permissaoController->updatePermissao($_GET['id']); 

                        // VERIFICAR SE FOI SALVO COM SUCESSO (return = id do ult registro no banco)
                        // if($result > 0){

                            echo $result;
                        // }else{
                            // echo "Não salvo no BANCO DE DADOS";
                        // }
                        
                        break;

                    case 'DELETE':
                        
                        $result = $permissaoController->deletePermissao($_GET['id']); 

                        // VERIFICAR SE FOI SALVO COM SUCESSO (return = id do ult registro no banco)
                        echo $result;
                        
                        break;
                }

                break;

            case 'PRODUTO':

                reqProduto();
                reqPermissaoCms();
                reqNutricional();
                
                $permissaoController = new PermissaoController();

                switch ($action) {
                    case 'INSERT':
                        $produtoController = new ProdutoController();
                        $idProduto  = $produtoController->insert($_GET['quant']);
                        if($idProduto > 0){
                            $nutricionalController = new NutricionalController();
                            $result = $nutricionalController->insert($idProduto);
                        }
                        break;

                    case 'UPDATE':
                        
                        $result = $permissaoController->updatePermissao($_GET['id']); 
                        break;

                    case 'DELETE':
                        $produtoController = new ProdutoController();
                        $result = $produtoController->deleteProduto($_GET['id']); 
                        break;
                    case 'DISABLEPRODUTO':
                        $produtoController = new ProdutoController();
                        $produtoController->disable($_POST['id'], $_POST['ativo']);
                }

                break;
                
                case 'BRINDE':
                reqBrinde();

                $brindeController = new BrindeController();

                switch($action){
                    case 'INSERT':


                    $return = $brindeController->insertBrinde();

                    echo $return;
                    break;

                    case 'UPDATE':

                    $result = $brindeController->updateBrinde($_GET['id']); 
                    
                    echo $result;

                    break;

                    case 'DELETE':

                        $result = $brindeController->deleteBrinde($_GET['id']); 

                        // VERIFICAR SE FOI SALVO COM SUCESSO (return = id do ult registro no banco)
                        echo $result;
                    
                
                    break;

                    case 'STATUS':

                   // $controller->disable($_POST['id'], $_POST['ativo']);

                   $result =  $brindeController->statusBrinde($_GET['id'], $_GET['ativo']); 
                    
                   // var_dump($brindeController);
                   echo $result;

                    break;

                }

        }
    }else if(isset($_GET['controllerfale'])){
        
        $controller = strtoupper($_GET['controllerfale']);
        $action = strtoupper($_GET['action']);
        
            switch ($controller) {
                case 'MENSAGEM':
                    
                reqFale();
                $faleConoscoController = new FaleConoscoController();
               
                switch ($action) {
                    case 'INSERT':
                    
                    if(isset($_POST['txtNome'])){

                        $return = $faleConoscoController->inserirMensagens();


                        echo $return;
                    }else{

                        echo ('Erro no controller');
                    }
                        break;
                    
                    case 'DELETE':
                        

                        $result =$faleConoscoController->deletarMensagem($_GET['id']);
                        
                        echo $result;
                        
                        break;

                }
        }
    
    }else if(isset($_GET['controllereventos'])){
        
        $controller = strtoupper($_GET['controllereventos']);
        $action = strtoupper($_GET['action']);
        
            switch ($controller) {
                case 'EVENTO':
                    
                reqEvento();
                $eventosController = new EventosController();
               
                switch ($action) {
                    case 'INSERT':
                    
                    if(isset($_POST['txtNome'])){

                        $return = $eventosController->inserir();

                        echo $return;
                    }else{

                        echo ('Erro no controller');
                    }
                        break;
                    
                    case 'DELETE':
                        

                        $result =$eventosController->deletarEvento($_GET['id']);
                        
                        echo $result;
                        
                        break;
                        
                    case 'UPDATE':

                        $return = $eventosController->editarEvento($_GET['id']); 
                        
                        echo $return;
                       
                        break;


                }
        }
    }else if(isset($_GET['controllerhome'])){
        
        $controller = strtoupper($_GET['controllerhome']);
        $action = strtoupper($_GET['action']);
        
            switch ($controller) {
                case 'HOME':
                    
                reqHome();
                $homeController = new HomeController();
               
                switch ($action) {
                    case 'INSERT':
                    
                    if(isset($_POST['txtTitulo'])){

                        $return = $homeController->inserir();

                        echo $return;
                    }else{

                        echo ('Erro no controller');
                    }
                        break;
                    
                    case 'DELETE':
                        

                        $result =$homeController->deletarEvento($_GET['id']);
                        
                        echo $result;
                        
                        break;
                        
                    case 'UPDATE':

                        $return = $homeController->editarEvento($_GET['id']); 
                        
                        echo $return;
                       
                        break;


                }
        }
    }else if(isset($_GET['controllercontatos'])){
        
        $controller = strtoupper($_GET['controllercontatos']);
        $action = strtoupper($_GET['action']);
        
            switch ($controller) {
                case 'CONTATO':
                    
                reqContatos();
                $contatosController = new ContatosController();
               
                switch ($action) {
                    case 'INSERT':
                    
                    if(isset($_POST['txtNome'])){

                        $return = $contatosController->inserirContato();

                        echo $return;
                    }else{

                        echo ('Erro no controller');
                    }
                        break;
                       
                    case 'DELETE':
                        

                        $result =$contatosController->deletarContato($_GET['id']);
                        
                        echo $result;
                        
                        break;

                }
        }

    }else if(isset($_GET['controllervideos'])){

        $controller = strtoupper($_GET['controllervideos']);
        $action = strtoupper($_GET['action']);

        
            switch ($controller) {
                case 'VIDEO':

                reqVideos();

                $videosController = new VideosController();
            
                switch ($action) {
                    case 'INSERT':
                    
                        if(isset($_POST['txtNome'])){

                            $return = $videosController->inserirVideo();

                            echo $return;
                        }else{

                            echo ('Erro no controller');
                        }
                        break;
                            
                    case 'UPDATE':
                        
                        $result = $videosController->updateVideo($_GET['id']); 
                        echo $result;     
                        break;
                    
                    case 'DELETE':
                        

                        $result =$videosController->deletarVideo($_GET['id']);
                        echo $result;
                        break;


            
        }
    }
   
    
}else if(isset($_SESSION['autenticado'])){

        // echo "sessao_autenticado = ".$_SESSION['autenticado']. "<br>";

        if ($_SESSION['autenticado']){

            // header("location:view/index.php?home");
            
        }else{
            // header('location:view/login/');
            echo "autenticado = false; <br>";
        }
    }else{
        echo "autenticado nao existe; <br>";
        
        // header('location:view/login/');

    }


?>