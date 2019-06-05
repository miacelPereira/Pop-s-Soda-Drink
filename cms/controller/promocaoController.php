<?php
    class PromocaoController{
        private $promocaoDao;
        private $tipoPromocaoDao;
        
        public function __construct(){ 
            $this->promocaoDao = new PromocaoDao(); 
            $this->tipoPromocaoDao = new TipoPromocaoDao(); 
        }

        /* Promoção */ 
        public function getAllPromo(){ return $this->promocaoDao->selectAll(); }
        public function getOnePromo($id){ return $this->promocaoDao->selectOne($id); }
        public function deletePromo($id){ $this->promocaoDao->delete($id); }
        public function disablePromo($id, $ativo){ $this->promocaoDao->disable($id, $ativo); }
        public function insertPromo(){
           if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $promocao = new Promocao();
                $promocao->setNome($_POST['txtNomePromo']);
                $promocao->setDescricao($_POST['txtDescricaoPromo']);
                $promocao->setRegulamento($_POST['txtRegulamentoPromo']);
                $promocao->setFotoPromocao(TreatImage($_FILES['file'], "promocao"));
                if($_POST['ckUpload']){
                    $promocao->setIdTipoPromocao(1);
                    $promocao->setMaxCodigo(0);
                }else{
                    $promocao->setIdTipoPromocao(2);
                    $promocao->setMaxCodigo($_POST['txtMaxCodigo']);
                }
                $this->promocaoDao->insert($promocao);
           }
        }

        public function updatePromo($id){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $promocao = new Promocao();
                $promocao->setIdPromocao($id);
                $promocao->setNome($_POST['txt-nome-promo']);
                $promocao->setDescricao($_POST['txt-descricao-promo']);
                $promocao->setRegulamento($_POST['txt-regulamento-promo']);
                
                if($_FILES['file-promo']['size'] != 0){
                    $promocao->setFotoPromocao(TreatImage($_FILES['file-promo'], "promocao"));
                }
                 $this->promocaoDao->update($id, $promocao);
            }
        }

        /* Tipo Promoção */
        public function getAllTypePromo(){ return $this->tipoPromocaoDao->selectAll(); }
        public function getOneTypePromo($id){ return $this->tipoPromocaoDao->selectOne($id); }
        public function deleteTypePromo($id){ $this->tipoPromocaoDao->delete($id); }
        public function disableTypePromo($id, $ativo){ $this->tipoPromocaoDao->disable($id, $ativo); }
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