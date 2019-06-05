<?php


// require_once('../controller/usuarioController.php');
// require_once('../model/DAO/usuarioCmsDao.php');
// require_once('../model/usuarioCmsClass.php');

// require_once('../controller/permissaoController.php');
// require_once('../model/DAO/permissaoDao.php');
// require_once('../model/permissaoCmsClass.php');

?>
<!-- <script>

    function teste(){
       alert(window.location.href);
    }

</script> -->
<div id="container-usuarios">
    <div id="usuarios-header">
        <div class="item-exit">
            <a href="index.php?home"> 
                <div id="exit"></div>
            </a>
        </div>
        <div class="page-header-item" id="new-permission">
            <div id="new-permission-img"></div>
        </div>
        <div class="page-header-item" id="new-user">
            <div id="new-user-img"></div>
        </div>
    </div>

    <div class="box-cb-user-permission" class="tooltip">
        <input type="checkbox" id="cb-user-permission" checked /> 
        <span style="font-size: 30px;color: #fff;">USUÁRIOS</span>
<!--        <span class="tooltiptext">Notificações</span>-->
    </div>
    <div id="usuarios-body">
        <div class="box-content">
            <div class="li-title"><img src="img/list-white.svg" /><h1>LISTA DE USUÁRIOS</h1></div>


            <!-- listUsers aqui -->
            <div id="li-list-users"></div>

            <div class="li-footer">
                <img src="img/profile-new-green.svg" class="add-new-user" />
                <h1 class="add-new-user">CRIAR NOVO USUÁRIO</h1>
            </div>

        </div>


        <div class="box-content2">
            <div class="li-title"><img src="img/list-white.svg" /><h1>LISTA DE PERMISSÕES</h1></div>

            <!-- listPermissions aqui -->
            <div id="li-list-permissions"></div>

            <div class="li-footer"><img src="img/profile-new-green.svg" class="add-new-permission" /><h1 class="add-new-permission">NOVA PERMISSÃO</h1></div>

        </div>
    </div>
</div>

<script>


    $(document).ready(function(){
        console.log('usuarios.php');
        listUsers();
        listPermissions();
    });

    function listUsers(){

        // alert(location.href);
        $.ajax({
                
            type: "GET",
            url: "content/listUsers.php",
            success: function(data){
                
                $('#li-list-users').html(data);
            }
        });
    }

    function listPermissions(){

        // alert(location.href);
        $.ajax({
                
            type: "GET",
            url: "content/listPermissions.php",
            success: function(data){
                
                $('#li-list-permissions').html(data);
            }
        });
    }

    

    $('#cb-user-permission').change(function(){

        if($('#cb-user-permission').attr('checked')){

            $('.box-content').css('display', 'flex');
            $('.box-content2').hide();

        }else{

            $('.box-content').hide();
            $('.box-content2').css('display', 'flex');
        }
    });
    

    
    $('.add-new-user').click(function(){
        // $(document).ready(function(){

        console.log("add new user");

        $.ajax({
            type: "GET",
            url: "modal/new-usuario.php",
            success: function(data){
                $("#modal").html(data);
            }
        });
    
        $("#back-modal").css('display', 'flex');
        $("#back-modal").css('flex-direction', 'column');
        $("#back-modal").css('justify-content', 'center');
    });

    $('.add-new-permission').click(function(){
        // $(document).ready(function(){

        console.log("add new permission");

        $.ajax({
            type: "GET",
            url: "modal/new-permissao.html",
            success: function(data){
                $("#modal").html(data);
            }
        });
    
        $("#back-modal").css('display', 'flex');
        $("#back-modal").css('flex-direction', 'column');
        $("#back-modal").css('justify-content', 'center');
    });

    $('#new-user').click(function(){

        console.log("add new user");

        $.ajax({
            type: "GET",
            url: "modal/new-usuario.php",
            success: function(data){
                $("#modal").html(data);
            }
        });
    
        $("#back-modal").css('display', 'flex');
        $("#back-modal").css('flex-direction', 'column');
        $("#back-modal").css('justify-content', 'center');
    });

    
    $('#new-permission').click(function(){
    // $(document).ready(function(){

        console.log("add new PERMISSaaAO");

        $.ajax({
            type: "GET",
            url: "modal/new-permissao.html",
            success: function(data){
                $("#modal").html(data);
            }
        });
    
        $("#back-modal").css('display', 'flex');
        $("#back-modal").css('flex-direction', 'column');
        $("#back-modal").css('justify-content', 'center');
    });
</script>