<?php

// echo getcwd()." << teste <br>";

if(isset($_GET['id'])){

    // require_once('../../controller/usuarioController.php');
    // require_once('../../model/DAO/usuarioCmsDao.php');
    // require_once('../../model/usuarioCmsClass.php');

    // require_once('../../controller/permissaoController.php');
    // require_once('../../model/DAO/permissaoDao.php');
    // require_once('../../model/permissaoCmsClass.php');
    require_once('../../require.php');

    reqPermissaoCms();
    reqUsuarioCms();
    
    $usuarioController = new UsuarioController();
    
    $usuario = $usuarioController->getUsuario($_GET['id']);
                
}else{
    echo "ID NÃO INFORMADO CORRETAMENTE";
}

?>

<div id="modal-header">
    <div>&nbsp;</div>
    <div><h1 class="header-text">INFORMAÇÕES DO USUÁRIO</h1></div>
    <div><h1 class="header-text" id="close-modal">X</h1></div>
</div>
<div id="modal-body" style="height:100%">
<!-- action="../router.php?controller=usuario&action=update&id=<?php //echo $_GET['id'] ?>" -->
    <form data-id="<?php echo $_GET['id']; ?>" id="form" method="post">
        <div class="modal-line"><p>NOME:</p>
            <!-- <div class="modal-edit"> -->
                <input type="text" name="txtNome" required placeholder="NOME COMPLETO" id="edit-user-nome" value="<?php echo $usuario->getNome(); ?>" disabled />
            <!-- </div> -->
        </div>
        <div class="modal-line">
            <p>MATRÍCULA:</p>
            <div class="modal-edit">
                <input type="text" name="txtLogin" required placeholder="LOGIN" id="edit-user-login" value="<?php echo $usuario->getLogin(); ?>" disabled class="modal-edit"/>
            </div>
        </div>
        <div class="modal-line"><p>SENHA:</p>
        <div class="modal-edit">
            <input type="text" name="txtSenha" required placeholder="SENHA" id="edit-user-senha" value="<?php echo $usuario->getSenha(); ?>" disabled class="modal-edit"/>
        </div>
        <br>
        <!-- <div class="modal-line">
            <div class="checkbox">
                <input type="checkbox" name="cbPermissaoPadrao" id="cb-permissao-padrao" checked /> 
                <span id="title-padrao">PADRÃO</span>
                <span id="title-personalizado">PERSON.</span>
            </div>
        </div> -->
        <select name="idPermissaoPadrao" id='sel-permissao-padrao' disabled>
            <?php

            $listPermissoes = new PermissaoController();

            $rsPermissoes = $listPermissoes->listPermissoes();

            for($i = 0; $i < count($rsPermissoes); $i++){
            ?>
                <option value="<?php echo $rsPermissoes[$i]->getId(); ?>" ><?php echo $rsPermissoes[$i]->getDescricao(); ?></option>
            <?php } ?>
        </select>
        <!-- <div class="modal-line new-permission-box-permissoes">
                <h2 id="new-permission-title2">INFORMAR PERMISSÕES:</h2>
                <div class="new-permission-box-permissoes2">
                    <div class="new-permission-paginas">
                        PG HOME <input type="checkbox" name="" id="cb-pghome" checked disabled /><br/>
                        PG HISTÓRIA <input type="checkbox" name="" id="cb-pghistoria" checked disabled /><br/>
                        ADM. USUÁRIOS <input type="checkbox" name="" id="cb-pguser" checked disabled />
                    </div>
                    <div class="new-permission-cruds">
                        <input type="checkbox" name="pfHomeR" id="cb-pfhome-r" checked disabled />LER 
                        <input type="checkbox" name="pfHomeC" id="cb-pfhome-c" checked disabled />CRIAR 
                        <input type="checkbox" name="pfHomeU" id="cb-pfhome-u" checked disabled />ATUALIZAR 
                        <input type="checkbox" name="pfHomeD" id="cb-pfhome-d" checked disabled />APAGAR <br/>

                        <input type="checkbox" name="pfHistoriaR" id="cb-pfhistoria-r" checked disabled />LER 
                        <input type="checkbox" name="pfHistoriaC" id="cb-pfhistoria-c" checked disabled />CRIAR 
                        <input type="checkbox" name="pfHistoriaU" id="cb-pfhistoria-u" checked disabled />ATUALIZAR 
                        <input type="checkbox" name="pfHistoriaD" id="cb-pfhistoria-d" checked disabled />APAGAR <br/>

                        <input type="checkbox" name="cmsUserR" id="cb-cmsuser-r" checked disabled />LER 
                        <input type="checkbox" name="cmsUserC" id="cb-cmsuser-c" checked disabled />CRIAR 
                        <input type="checkbox" name="cmsUserU" id="cb-cmsuser-u" checked disabled />ATUALIZAR 
                        <input type="checkbox" name="cmsUserD" id="cb-cmsuser-d" checked disabled />APAGAR <br/>
                    </div>
                </div>
        </div> -->
        <?php if($_GET['id'] != 1){ ?>
        <div class="modal-line"><input type="button" value="EDITAR" id="btn-edit-sub" onclick="btnEditSubmit();"></div>
        <?php } ?>
        
    </form>
</div>
<script>

    $(document).ready(function(){
        $("#close-modal").click(function(){
                $("#back-modal").fadeOut();
        });
    });


$('#form').submit(function(){

//Cancela o submit do HTML
event.preventDefault();

console.log("teste:" + $('#form').data('id'));
var idItem = $('#form').data('id');

var link = "../router.php?controller=usuario&action=update&id="+idItem;

    $.ajax({
        type: "POST",
        url: link,
        data: new FormData($('#form')[0]),
        cache: false,
        contentType: false,
        processData: false,
        async: true,
        success: function(dados){
        
            alert("REGISTRADO COM SUCESSO!");
            
            $('#back-modal').fadeOut(200);
            listUsers();

        }

    });

});

function btnEditSubmit(){
    
    var input = document.getElementById('btn-edit-sub');


    if(input.value == "EDITAR"){
        input.value = "SALVAR";

        document.getElementById("edit-user-nome").removeAttribute("disabled");
        document.getElementById("edit-user-login").removeAttribute("disabled");
        document.getElementById("edit-user-senha").removeAttribute("disabled");
        document.getElementById("sel-permissao-padrao").removeAttribute("disabled");

        // document.getElementById("cb-pfhome-r").removeAttribute("disabled");

    }else if(input.value == "SALVAR"){
        input.type = "submit";
    }
}


// PARA EXEMPLO ↓↓↓
// $('.cb-pg').change(function(){

//     idpagina = $(this).attr('name');
//     idpagina = idpagina.substr(0, 3) + "pg" + idpagina.substr(3, idpagina.length - 1)

//     if($('#'+idpagina).attr('checked')){

//         $('#'+idpagina+'-r').attr('checked', 'checked');
//     }else{

//         $('#'+idpagina+'-c').removeAttr('checked');
//         $('#'+idpagina+'-r').removeAttr('checked');
//         $('#'+idpagina+'-u').removeAttr('checked');
//         $('#'+idpagina+'-d').removeAttr('checked');
//     }

// });



</script>