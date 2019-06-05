<?php

    class MateriaPrimaController{

        private $dao;

        public function __construct(){
            $this->dao = new MateriaPrimaDao();
        }

        public function insert(){

            if($_SERVER['REQUEST_METHOD'] == 'POST'){

                
                $matprima = new MateriaPrima();

                $matprima->setNome($_POST['txtNome']);
                $matprima->setImposto($_POST['txtImposto']);
                $matprima->setTempoRessuprimento($_POST['txtTempoRessup']);
                $matprima->setIntervaloRessuprimento($_POST['txtIntervaloRessup']);
                $matprima->setLocalizacao($_POST['slPrateleira']);
                $matprima->setQuantidadeEstoque($_POST['txtQtdEstoque']);
                $matprima->setUnidadeMedida("id", $_POST['slUniMedida']);


                return $this->dao->insert($matprima);
                
                
            }
        }

        public function update(){

            if($_SERVER['REQUEST_METHOD'] == 'POST'){
    
                $matprima = new MateriaPrima();
                $matprima->setId($_GET['id']);
                $matprima->setNome($_POST['txtNome']);
                $matprima->setImposto($_POST['txtImposto']);
                $matprima->setTempoRessuprimento($_POST['txtTempoRessup']);
                $matprima->setIntervaloRessuprimento($_POST['txtIntervaloRessup']);
                $matprima->setLocalizacao($_POST['slPrateleira']);
                $matprima->setQuantidadeEstoque($_POST['txtQtdEstoque']);
                $matprima->setUnidadeMedida("id", $_POST['slUniMedida']);
    
                return $this->dao->update($matprima);
            }
            
    
        }
        
        public function deleteMateria($id){

            return $this->dao->delete($id);
        }

        public function getAll(){

            return $this->dao->selectAll();
        }
        public function getMateria($id){

        return $this->dao->selectById($id);
    }

    }

?>