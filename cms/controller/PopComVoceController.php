<?php
    class PopComVoceController{
        private $slide;
        private $foto;
        
        public function __construct(){ 
            $this->slide = new SlidePopComVoceDao(); 
            $this->foto = new FotoPopComVoceDao(); 
        }

        public function selectAll(){ return $this->slide->selectAll(); }
        public function selectOneSlide($id){ return $this->slide->selectOne($id); }
        public function deleteSlide($id){ $this->foto->delete($id); }        
        public function insert($slide){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $foto = new FotoPopComVoce();
                $foto->setAtivo(1);
                $foto->setTitulo($_POST['txt-titulo']);
                $foto->setSlide($slide);
                $foto->setUrl_foto(TreatImage($_FILES['file'], "popComVoce"));
                $this->foto->insert($foto);
            }
        }
        public function update($id){ 
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $foto = new FotoPopComVoce();
                $foto->setUrl_foto(TreatImage($_FILES['file'], "popComVoce"));
                $this->foto->update($id, $foto);
            }
        }
        public function selectAllImage($id){ return $this->foto->selectAll($id); }
        public function selectImage($id){ return $this->foto->select($id); }
        public function disableSlide($id, $ativo){ $this->foto->disable($id, $ativo); }

    }
    function TreatImage($nameFile, $nameFolder){
        $name = $nameFile['name'];
        $fileSize = round($nameFile['size']/2028);
        $fileExtension = strrchr($name,".");
        $filename = pathinfo($name, PATHINFO_FILENAME);
        $filename = md5(uniqid(time()).$filename);
        $dir = $_SERVER['DOCUMENT_ROOT']."/inf4m20191/TCC/cms/view/img/uploaded/".$nameFolder."/";
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