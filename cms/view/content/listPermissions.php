<?php

// require_once('../../controller/permissaoController.php');
// require_once('../../model/DAO/permissaoDao.php');
// require_once('../../model/permissaoCmsClass.php');

require_once('../../require.php');
reqPermissaoCms();

$listPermissoes = new PermissaoController();
$rsPermissoes = $listPermissoes->listPermissoes();

for($i = 0; $i < count($rsPermissoes); $i++){
    
?>    
<div class="li-permissoes">
    <div class="box-left">
        <div class="box-left-halign">
            <div class="box-left-valign">
                <h2><?php echo $rsPermissoes[$i]->getDescricao(); ?></h2>
                <h3>Pg. HOME: <?php echo $rsPermissoes[$i]->getPfHome(); ?> | Pg. História: <?php echo $rsPermissoes[$i]->getPfHistoria(); ?> | Adm. de Usuários: <?php echo $rsPermissoes[$i]->getCmsUser(); ?></h3>
            </div>
        </div>
    </div>
    <div class="box-right">
        <a><div class="li-ico"><div class="ico-edit-permissao ico-details-user" onclick="editPermissao(<?php echo $rsPermissoes[$i]->getId(); ?>)">&nbsp;</div></div></a>
        <a><div class="li-ico"><div class="ico-del-user" onclick="deletePermission(<?php if($rsPermissoes[$i]->getId() != 1)echo $rsPermissoes[$i]->getId(); ?>)"></div></div></a>
    </div>
</div>
<?php } ?>