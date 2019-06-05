<?php

// echo "CWD:".getcwd()."<br>";

// require_once('../../controller/usuarioController.php');
// require_once('../../model/DAO/usuarioCmsDao.php');
// require_once('../../model/usuarioCmsClass.php');

require_once('../../require.php');
reqUsuarioCms();
reqPermissaoCms();

$listUsuarios = new UsuarioController();

$rsUsuarios = $listUsuarios->listUsuarios();

for($i = 0; $i < count($rsUsuarios); $i++){
?>
    
<div class="li-usuarios">
    <div class="box-left">
        <div class="box-left-halign">
            <div class="profile-photo"><img src="img/profile.svg"/></div>
            <div class="box-left-valign">
                <h2><?php echo $rsUsuarios[$i]->getNome(); ?></h2>
                <h3>MATRÍCULA: <?php echo $rsUsuarios[$i]->getLogin(); ?></h3>
            </div>
        </div>
    </div>
    <div class="box-right">
        <div class="li-ico">
            <div class="ico-details-user" onclick="showViewUserModal(<?php echo $rsUsuarios[$i]->getId(); ?>);"></div>
        </div>
        <!-- <div class="li-ico"><div class="ico-permission-user"></div></div> -->
        <?php if($rsUsuarios[$i]->getId() != 1){ ?>
        <div class="li-ico">
            <div class="ico-del-user" onclick="deleteUser(<?php echo $rsUsuarios[$i]->getId(); ?>)"></div>
        </div>
        <?php } ?>
    </div>
</div>

<?php } ?>
