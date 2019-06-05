<?php



class UsuarioController{

    private $usuarioCmsDao;
    
    public function __construct(){

        $this->usuarioCmsDao = new UsuarioCmsDao();
    }

    public function insertUsuario(){

        if($_SERVER['REQUEST_METHOD'] == 'POST'){

            $usuario = new UsuarioCms();

            $usuario->setNome($_POST['txtNome']);
            $usuario->setLogin($_POST['txtLogin']);
            $usuario->setSenha($_POST['txtSenha']);
            $usuario->setIdPermissao($_POST['idPermissaoPadrao']);


            return $this->usuarioCmsDao->insert($usuario);
        }
        

    }

    public function insertUsuarioNovaPermissao($idPermissao){

        if($_SERVER['REQUEST_METHOD'] == 'POST'){

            $usuario = new UsuarioCms();

            $usuario->setNome($_POST['txtNome']);
            $usuario->setLogin($_POST['txtLogin']);
            $usuario->setSenha($_POST['txtSenha']);
            $usuario->setIdPermissao($idPermissao);

            return $this->usuarioCmsDao->insert($usuario);
        }
    }

    public function updateUsuario(){

        if($_SERVER['REQUEST_METHOD'] == 'POST'){

            $usuario = new UsuarioCms();

            $usuario->setId($_GET['id']);
            $usuario->setNome($_POST['txtNome']);
            $usuario->setLogin($_POST['txtLogin']);
            $usuario->setSenha($_POST['txtSenha']);

            return $this->usuarioCmsDao->update($usuario);
        }
        

    }

    public function listUsuarios(){

        return $this->usuarioCmsDao->selectAll();
    }

    public function getUsuario($id){

        return $this->usuarioCmsDao->selectById($id);
    }

    public function deleteUsuario($id){

        return $this->usuarioCmsDao->delete($id);
    }

}

?>