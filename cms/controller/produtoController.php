<?php


class ProdutoController{

    private $produtoDao;
    private $nutricionalDao;

    public function __construct(){
        $this->produtoDao = new ProdutoDao();
        $this->nutricionalDao = new NutricionalDao();
    }

    public function insert($quant){
        $produto = new Produto();
        $produto->setNome($_POST['txtNome']);
        $produto->setImg(TreatImage($_FILES['flImg'], 'produto'));
        $produto->setDescricao($_POST['txtDesc']);
        $produto->setQuantidadeMedida($_POST['txtQuantidade']);
        $produto->setUnidadeMedida($_POST['slUniMedida']);
        $produto->setPeso($_POST['txtPeso']);
        $produto->setImposto($_POST['txtImposto']);
        $produto->setDemandaMensal($_POST['txtDemanda']);
        $produto->setTempoRessuprimento($_POST['txtTempoRessup']);
        $produto->setIntervaloRessuprimento($_POST['txtIntervaloRessup']);
        $produto->setQuantidadeEstoque($_POST['txtQtdEstoque']);
        $produto->setPrecoUnidade($_POST['txtPrecoUni']);
        $produto->setQuantidadeFardo($_POST['txtQtdFardo']);
        $produto->setLocalizacao($_POST['slPrateleira']);
        $produto->setEmbalagem($_POST['slEmbalagem']);
        $produto->setUnidadeMedida($_POST['slEmbalagem']);
        $produto->setQuantidadeMedida($_POST['slEmbalagem']);

        $id_produto = $this->produtoDao->insert($produto);
        
        for($i=1; $i<=$quant; $i++){
            $nutricional = new Nutricional();
            $nutricional->setIdProduto($id_produto);
            $nutricional->setElemento($_POST['txtNomePorcao'.$i]);
            $nutricional->setQuantidade($_POST['txtQtdPorcao'.$i]);
            $nutricional->setVd($_POST['txtVd'.$i]);

            $this->nutricionalDao->insert($nutricional);
        }
    }

    public function getAll(){
        return $this->produtoDao->selectAll();
    }

    public function getOne($id){
        return $this->produtoDao->selectOne($id);
    }

    public function disable($id, $ativo){
        $this->produtoDao->disable($id, $ativo);
    }

    public function deleteProduto($id){

        return $this->produtoDao->delete($id);
    }
}
        
function TreatImage($nameFile, $nameFolder){
    $name = $nameFile['name'];
    $fileSize = round($nameFile['size']/2028);
    $fileExtension = strrchr($name,".");
    $filename = pathinfo($name, PATHINFO_FILENAME);
    $filename = md5(uniqid(time()).$filename);
    $dir = $_SERVER['DOCUMENT_ROOT']."/INF4M20191/TCC/cms/view/img/uploaded/".$nameFolder."/";
    $extensoesPermitidas = array(".jpg", ".png", ".jpeg");
    if(in_array($fileExtension, $extensoesPermitidas)){
        if($fileSize<20000){
            $tempFile = $nameFile['tmp_name'];
            $imgDir = $dir . $filename . $fileExtension;
            if(move_uploaded_file($tempFile, $imgDir)){
                return $imgDir;
            }
        }
    }
}  

?>