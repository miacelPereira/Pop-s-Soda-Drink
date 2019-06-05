<?php


class NutricionalController{

    private $nutricionalDao;

    public function __construct(){
        $this->nutricionalDao = new nutricionalDao();
    }

    public function insert($idProduto){

        $nutricional = new Nutricional();

        // echo "TESTEEEE<br>";
        // var_dump($_POST);
        // echo "TESTEEEE<br><br>";

        $arrNutricional = array();
        $i = 1;

        while(isset($_POST['txtNomePorcao'.$i])){

            $item = new Nutricional();
            $item->setElemento($_POST['txtNomePorcao'.$i]);
            $item->setQuantidade($_POST['txtQtdPorcao'.$i]);
            $item->setVd($_POST['txtVd'.$i]);

            array_push($arrNutricional, $item);
            $i++;
        }

        return $this->nutricionalDao->insert($arrNutricional, $idProduto);

    }

    public function deletePermissao($id){

        return $this->permissaoDao->delete($id);
    }

    public function updatePermissao(){

        if($_SERVER['REQUEST_METHOD'] == 'POST'){

            //INTÂNCIAS
            // SITE PESSOA FISICA
            $pfHomeC = "";          $pfHomeR = "";          $pfHomeU = "";          $pfHomeD = "";
            $pfHistoriaC = "";      $pfHistoriaR = "";      $pfHistoriaU = "";      $pfHistoriaD = "";
            $pfProdutoC = "";       $pfProdutoR = "";       $pfProdutoU = "";       $pfProdutoD = "";
            $pfBrindesC = "";       $pfBrindesR = "";       $pfBrindesU = "";       $pfBrindesD = "";
            $pfNoticiasC = "";      $pfNoticiasR = "";      $pfNoticiasU = "";      $pfNoticiasD = "";
            $pfDivulgacaoC = "";    $pfDivulgacaoR = "";    $pfDivulgacaoU = "";    $pfDivulgacaoD = "";
            $pfVideosC = "";        $pfVideosR = "";        $pfVideosU = "";        $pfVideosD = "";
            $pfPatrocinadosC = "";  $pfPatrocinadosR = "";  $pfPatrocinadosU = "";  $pfPatrocinadosD = "";
            $pfEventosC = "";       $pfEventosR = "";       $pfEventosU = "";       $pfEventosD = "";
            $pfNossasLojasC = "";   $pfNossasLojasR = "";   $pfNossasLojasU = "";   $pfNossasLojasD = "";
            $pfPromocoesC = "";     $pfPromocoesR = "";     $pfPromocoesU = "";     $pfPromocoesD = "";
            $pfFaleConoscoC = "";   $pfFaleConoscoR = "";   $pfFaleConoscoU = "";   $pfFaleConoscoD = "";
            $pfPopsNaEscolaC = "";  $pfPopsNaEscolaR = "";  $pfPopsNaEscolaU = "";  $pfPopsNaEscolaD = "";
            $pfMissaoValoresC = ""; $pfMissaoValoresR = ""; $pfMissaoValoresU = ""; $pfMissaoValoresD = "";

            // CMS
            $cmsUserC = ""; $cmsUserR = ""; $cmsUserU = ""; $cmsUserD = "";
    
            //SETS
            // SITE PESSOA FISICA - SET VALORES
            if(isset($_POST['pfBrindesC'])) $pfBrindesC = "C";
            if(isset($_POST['pfBrindesR'])) $pfBrindesR = "R";
            if(isset($_POST['pfBrindesU'])) $pfBrindesU = "U";
            if(isset($_POST['pfBrindesD'])) $pfBrindesD = "D";
            
            if(isset($_POST['pfDivulgacaoC'])) $pfDivulgacaoC = "C";
            if(isset($_POST['pfDivulgacaoR'])) $pfDivulgacaoR = "R";
            if(isset($_POST['pfDivulgacaoU'])) $pfDivulgacaoU = "U";
            if(isset($_POST['pfDivulgacaoD'])) $pfDivulgacaoD = "D";
            
            if(isset($_POST['pfEventosC'])) $pfEventosC = "C";
            if(isset($_POST['pfEventosR'])) $pfEventosR = "R";
            if(isset($_POST['pfEventosU'])) $pfEventosU = "U";
            if(isset($_POST['pfEventosD'])) $pfEventosD = "D";
        
            if(isset($_POST['pfFaleConoscoC'])) $pfFaleConoscoC = "C";
            if(isset($_POST['pfFaleConoscoR'])) $pfFaleConoscoR = "R";
            if(isset($_POST['pfFaleConoscoU'])) $pfFaleConoscoU = "U";
            if(isset($_POST['pfFaleConoscoD'])) $pfFaleConoscoD = "D";
            
            if(isset($_POST['pfHistoriaC'])) $pfHistoriaC = "C";
            if(isset($_POST['pfHistoriaR'])) $pfHistoriaR = "R";
            if(isset($_POST['pfHistoriaU'])) $pfHistoriaU = "U";
            if(isset($_POST['pfHistoriaD'])) $pfHistoriaD = "D";
            
            if(isset($_POST['pfHomeC'])) $pfHomeC = "C";
            if(isset($_POST['pfHomeR'])) $pfHomeR = "R";
            if(isset($_POST['pfHomeU'])) $pfHomeU = "U";
            if(isset($_POST['pfHomeD'])) $pfHomeD = "D";
        
            if(isset($_POST['pfMissaoValoresC'])) $pfMissaoValoresC = "C";
            if(isset($_POST['pfMissaoValoresR'])) $pfMissaoValoresR = "R";
            if(isset($_POST['pfMissaoValoresU'])) $pfMissaoValoresU = "U";
            if(isset($_POST['pfMissaoValoresD'])) $pfMissaoValoresD = "D";
        
            if(isset($_POST['pfNossasLojasC'])) $pfNossasLojasC = "C";
            if(isset($_POST['pfNossasLojasR'])) $pfNossasLojasR = "R";
            if(isset($_POST['pfNossasLojasU'])) $pfNossasLojasU = "U";
            if(isset($_POST['pfNossasLojasD'])) $pfNossasLojasD = "D";
            
            if(isset($_POST['pfNoticiasC'])) $pfNoticiasC = "C";
            if(isset($_POST['pfNoticiasR'])) $pfNoticiasR = "R";
            if(isset($_POST['pfNoticiasU'])) $pfNoticiasU = "U";
            if(isset($_POST['pfNoticiasD'])) $pfNoticiasD = "D";
            
            if(isset($_POST['pfPatrocinadosC'])) $pfPatrocinadosC = "C";
            if(isset($_POST['pfPatrocinadosR'])) $pfPatrocinadosR = "R";
            if(isset($_POST['pfPatrocinadosU'])) $pfPatrocinadosU = "U";
            if(isset($_POST['pfPatrocinadosD'])) $pfPatrocinadosD = "D";
        
            if(isset($_POST['pfPopsNaEscolaC'])) $pfPopsNaEscolaC = "C";
            if(isset($_POST['pfPopsNaEscolaR'])) $pfPopsNaEscolaR = "R";
            if(isset($_POST['pfPopsNaEscolaU'])) $pfPopsNaEscolaU = "U";
            if(isset($_POST['pfPopsNaEscolaD'])) $pfPopsNaEscolaD = "D";
        
            if(isset($_POST['pfProdutosC'])) $pfProdutosC = "C";
            if(isset($_POST['pfProdutosR'])) $pfProdutosR = "R";
            if(isset($_POST['pfProdutosU'])) $pfProdutosU = "U";
            if(isset($_POST['pfProdutosD'])) $pfProdutosD = "D";
            
            if(isset($_POST['pfVideosC'])) $pfVideosC = "C";
            if(isset($_POST['pfVideosR'])) $pfVideosR = "R";
            if(isset($_POST['pfVideosU'])) $pfVideosU = "U";
            if(isset($_POST['pfVideosD'])) $pfVideosD = "D";

            if(isset($_POST['cmsVideosC'])) $cmsVideosC = "C";
            if(isset($_POST['cmsVideosR'])) $cmsVideosR = "R";
            if(isset($_POST['cmsVideosU'])) $cmsVideosU = "U";
            if(isset($_POST['cmsVideosD'])) $cmsVideosD = "D";
            
            //CONCATENASÇÕES
            // SITE PF
            $pfHome =           $pfHomeC.           $pfHomeR.           $pfHomeU.           $pfHomeD;
            $pfHistoria =       $pfHistoriaC.       $pfHistoriaR.       $pfHistoriaU.       $pfHistoriaD;
            $pfProduto =        $pfProdutoC.        $pfProdutoR.        $pfProdutoU.        $pfProdutoD;
            $pfBrindes =        $pfBrindesC.        $pfBrindesR.        $pfBrindesU.        $pfBrindesD;
            $pfNoticias =       $pfNoticiasC.       $pfNoticiasR.       $pfNoticiasU.       $pfNoticiasD;
            $pfDivulgacao =     $pfDivulgacaoC.     $pfDivulgacaoR.     $pfDivulgacaoU.     $pfDivulgacaoD;
            $pfVideos =         $pfVideosC.         $pfVideosR.         $pfVideosU.         $pfVideosD;
            $pfPatrocinados =   $pfPatrocinadosC.   $pfPatrocinadosR.   $pfPatrocinadosU.   $pfPatrocinadosD;
            $pfEventos =        $pfEventosC.        $pfEventosR.        $pfEventosU.        $pfEventosD;
            $pfNossasLojas =    $pfNossasLojasC.    $pfNossasLojasR.    $pfNossasLojasU.    $pfNossasLojasD;
            $pfPromocoes =      $pfPromocoesC.      $pfPromocoesR.      $pfPromocoesU.      $pfPromocoesD;
            $pfFaleConosco =    $pfFaleConoscoC.    $pfFaleConoscoR.    $pfFaleConoscoU.    $pfFaleConoscoD;
            $pfPopsNaEscola =   $pfPopsNaEscolaC.   $pfPopsNaEscolaR.   $pfPopsNaEscolaU.   $pfPopsNaEscolaD;
            $pfMissaoValores =  $pfMissaoValoresC.  $pfMissaoValoresR.  $pfMissaoValoresU.  $pfMissaoValoresD;

            $cmsUser =  $cmsUserC.  $cmsUserR.  $cmsUserU.  $cmsUserD;

            if(isset($_POST['txtDesc'])){
                $descricao = $_POST['txtDesc'];
            }else{
                $descricao = "personalizada";
            }

            // if(isset($_POST['txtDesc'])){
            //     $descricao = $_POST['txtDesc'];
            // }
            $padrao = 1;

            $permissao = new PermissaoCms();
            $permissao->setId($_GET['id']);
            
            $permissao->setDescricao($descricao);
            $permissao->setPadrao($padrao);
    
            // SITE Pessoa Física
            $permissao->setPfHome($pfHome);
            $permissao->setPfHistoria($pfHistoria);
            $permissao->setPfProduto($pfProduto);
            $permissao->setPfBrindes($pfBrindes);
            $permissao->setPfNoticias($pfNoticias);
            $permissao->setPfDivulgacao($pfDivulgacao);
            $permissao->setPfVideos($pfVideos);
            $permissao->setPfPatrocinados($pfPatrocinados);
            $permissao->setPfEventos($pfEventos);
            $permissao->setPfNossasLojas($pfNossasLojas);
            $permissao->setPfPromocoes($pfPromocoes);
            $permissao->setPfFaleConosco($pfFaleConosco);
            $permissao->setPfPopsNaEscola($pfPopsNaEscola);
            $permissao->setPfMissaoValores($pfMissaoValores);
    
            // CMS
            $permissao->setCmsUser($cmsUser);

            return $this->permissaoDao->update($permissao);
        }

    }

    public function listPermissoes(){

        return $this->permissaoDao->selectAll();
    }

    public function getPermissao($id){

        return $this->permissaoDao->getPermissao($id);

    }

}

?>