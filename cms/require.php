<?php

@session_start();


$_SESSION['prefix'] = $_SERVER['DOCUMENT_ROOT']."/inf4m20191/tcc/cms/";

require_once($_SESSION['prefix'].'model/DAO/mysqlConn.php');

function reqPopComVoce(){
    require_once($_SESSION['prefix'].'model/fotoPopComVoceClass.php');
    require_once($_SESSION['prefix'].'model/slidePopComVoceClass.php');
    require_once($_SESSION['prefix'].'model/DAO/slidePopComVoceDao.php');
    require_once($_SESSION['prefix'].'model/DAO/fotoPopComVoceDao.php');
    require_once($_SESSION['prefix'].'controller/PopComVoceController.php');
}


function reqUsuarioCms(){
    require_once($_SESSION['prefix'].'model/usuarioCmsClass.php');
    require_once($_SESSION['prefix'].'model/DAO/usuarioCmsDao.php');
    require_once($_SESSION['prefix'].'controller/usuarioController.php');
}
function reqComunidadeCms(){
    require_once($_SESSION['prefix'].'model/comunidadeClass.php');
    require_once($_SESSION['prefix'].'model/DAO/comunidadeDao.php');
    require_once($_SESSION['prefix'].'controller/comunidadeController.php');
}
function reqChamadosCms(){
    require_once($_SESSION['prefix'].'model/chamadosClass.php');
    require_once($_SESSION['prefix'].'model/DAO/chamadosDao.php');
    require_once($_SESSION['prefix'].'controller/chamadosController.php');
}

function reqPermissaoCms(){
    require_once($_SESSION['prefix'].'model/permissaoCmsClass.php');
    require_once($_SESSION['prefix'].'model/DAO/permissaoDao.php');
    require_once($_SESSION['prefix'].'controller/permissaoController.php');
}

function reqAutenticarCms(){
    require_once($_SESSION['prefix'].'model/autenticarClass.php');
    require_once($_SESSION['prefix'].'model/DAO/autenticarDao.php');
    require_once($_SESSION['prefix'].'controller/autenticarController.php');
}

function reqPromocao(){
    require_once($_SESSION['prefix'].'model/promocaoClass.php');
    require_once($_SESSION['prefix'].'model/tipoPromocaoClass.php');
    require_once($_SESSION['prefix'].'model/DAO/promocaoDao.php');
    require_once($_SESSION['prefix'].'model/DAO/tipoPromocaoDao.php');
    require_once($_SESSION['prefix'].'controller/promocaoController.php');
}

function reqRespostaPromocao(){
    require_once($_SESSION['prefix'].'model/respostaPromocaoClass.php');
    require_once($_SESSION['prefix'].'model/DAO/respostaPromocaoDao.php');
    require_once($_SESSION['prefix'].'controller/respostaPromocaoController.php');
}

function reqProduto(){
    require_once($_SESSION['prefix'].'model/produtoClass.php');
    require_once($_SESSION['prefix'].'model/nutricionalClass.php');
    require_once($_SESSION['prefix'].'model/DAO/produtoDao.php');
    require_once($_SESSION['prefix'].'model/DAO/nutricionalDao.php');
    require_once($_SESSION['prefix'].'controller/produtoController.php');
}

function reqPrateleira(){
    require_once($_SESSION['prefix'].'model/prateleiraClass.php');
    require_once($_SESSION['prefix'].'model/DAO/prateleiraDao.php');
    require_once($_SESSION['prefix'].'controller/prateleiraController.php');
}

function reqUniMedida(){
    require_once($_SESSION['prefix'].'model/uniMedidaClass.php');
    require_once($_SESSION['prefix'].'model/DAO/uniMedidaDao.php');
    require_once($_SESSION['prefix'].'controller/uniMedidaController.php');
}

function reqEmbalagem(){
    require_once($_SESSION['prefix'].'model/embalagemClass.php');
    require_once($_SESSION['prefix'].'model/DAO/embalagemDao.php');
    require_once($_SESSION['prefix'].'controller/embalagemController.php');
}

function reqNutricional(){
    require_once($_SESSION['prefix'].'model/nutricionalClass.php');
    require_once($_SESSION['prefix'].'model/DAO/nutricionalDao.php');
    require_once($_SESSION['prefix'].'controller/nutricionalController.php');
}
function reqNoticias(){
    require_once($_SESSION['prefix'].'model/noticiasClass.php');
    require_once($_SESSION['prefix'].'model/DAO/noticiasDao.php');
    require_once($_SESSION['prefix'].'controller/noticiasController.php');
} 

function reqEstabelecimento(){
    require_once($_SESSION['prefix'].'model/estabelecimentoClass.php');
    require_once($_SESSION['prefix'].'model/DAO/estabelecimentoDao.php');
    require_once($_SESSION['prefix'].'controller/estabelecimentoController.php');
}

function reqHistoria(){
    require_once($_SESSION['prefix'].'model/historiaClass.php');
    require_once($_SESSION['prefix'].'model/DAO/historiaDao.php');
    require_once($_SESSION['prefix'].'controller/historiaController.php');
}

function reqMissaoValor(){
    require_once($_SESSION['prefix'].'model/missaoValorClass.php');
    require_once($_SESSION['prefix'].'model/DAO/missaoValorDao.php');
    require_once($_SESSION['prefix'].'controller/missaoValorController.php');
}

function reqParceiro(){
    require_once($_SESSION['prefix'].'model/parceiroClass.php');
    require_once($_SESSION['prefix'].'model/DAO/parceiroDao.php');
    require_once($_SESSION['prefix'].'controller/parceiroController.php');
}

function reqLojas(){
    require_once($_SESSION['prefix'].'model/lojasClass.php');
    require_once($_SESSION['prefix'].'model/DAO/lojasDao.php');
    require_once($_SESSION['prefix'].'controller/lojasController.php');
}

function reqBrinde(){
    require_once($_SESSION['prefix'].'model/DAO/brindeDao.php');
    require_once($_SESSION['prefix'].'controller/brindeController.php');
    require_once($_SESSION['prefix'].'model/brindeCmsClass.php');
}

function reqMateriaPrima(){
    require_once('model/DAO/materiaPrimaDao.php');
    require_once('controller/materiaPrimaController.php');
    require_once('model/materiaPrimaClass.php');
}
function reqFale(){

    require_once('model/faleConoscoClass.php');
    require_once('model/DAO/faleConoscoDao.php');
    require_once('controller/faleConoscoController.php');    
}
function reqEvento(){

    require_once('model/eventosClass.php');
    require_once('model/DAO/eventosDao.php');
    require_once('controller/eventosController.php');    
}
function reqVideos(){

    require_once('model/videosClass.php');
    require_once('model/DAO/videosDao.php');
    require_once('controller/videosController.php');    
}
function reqContatos(){

    require_once('model/contatosClass.php');
    require_once('model/DAO/contatosDao.php');
    require_once('controller/contatosController.php');    
}
function reqHome(){

    require_once('model/homeClass.php');
    require_once('model/DAO/homeDao.php');
    require_once('controller/homeController.php');    
}

?>