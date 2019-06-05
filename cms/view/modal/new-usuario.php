<div id="modal-header">
    <div>&nbsp;</div>
    <div><h1 class="header-text">CADASTRAR NOVO USUÁRIO</h1></div>
    <div><h1 class="header-text" id="close-modal">X</h1></div>
</div>
<div id="modal-body">
<!-- action="../router.php?controller=usuario&action=insert" -->
    <form method="post" id="form" name="frmNewUser" >
        <div class="modal-line" >
            <input type="text" name="txtNome" required placeholder="NOME COMPLETO" id="new-user-nome" style=" border-radius: 5px;"/>
        </div>
        <div class="modal-line">
            <input type="text" name="txtLogin" required placeholder="LOGIN" id="new-user-login" style=" border-radius: 5px;"/>
        </div>
        <div class="modal-line">
            <input type="text" name="txtSenha" required placeholder="SENHA" id="new-user-senha" style=" border-radius: 5px;"/>
        </div>
        <div class="modal-line" >
            <h2 style="color: #000">INFORMAR PERMISSÕES:</h2>
        </div>
        <div class="modal-line">
            <div class="checkbox">
                <input type="checkbox" name="cbPermissaoPadrao" id="cb-permissao-padrao" checked /> 
                <span id="title-padrao">PADRÃO</span>
                <span id="title-personalizado">PERSON.</span>
            </div>
        </div>
        <div class="modal-line box-permissoes-padrao">
            
            <select name="idPermissaoPadrao" style=" border-radius: 8px;">
            <?php

            echo "CWD:".getcwd()."<br>";

            // require_once('../../controller/permissaoController.php');
            // require_once('../../model/DAO/permissaoDao.php');
            // require_once('../../model/permissaoCmsClass.php');

            require_once('../../require.php');
            reqPermissaoCms();

            $listPermissoes = new PermissaoController();

            $rsPermissoes = $listPermissoes->listPermissoes();

            for($i = 0; $i < count($rsPermissoes); $i++){
            ?>
                <option value="<?php echo $rsPermissoes[$i]->getId(); ?>" ><?php echo $rsPermissoes[$i]->getDescricao(); ?></option>
            <?php } ?>
            </select>

            
        </div>
        <div class="modal-line new-user-box-permissoes">
            <p style="padding: 10px 0px; font-size: 23px; color: #fff; background-color: #80e5af; border-radius: 40px;">SITE - ADM. de Páginas</p>
            <div class="modal-line new-user-box-permissoes-row">
                <div class="box-permissoes-paginas">
                    <p>BRINDES 
                        <input type="checkbox" id="cb-pgbrindes" checked class='cb-pg' name='cb-brindes' /></p>
                    <p>DIVULGAÇÃO 
                        <input type="checkbox" id="cb-pgdivulgacao" checked class='cb-pg' name='cb-divulgacao' /></p>
                    <p>EVENTOS 
                        <input type="checkbox" id="cb-pgeventos" checked class='cb-pg' name='cb-eventos' /></p>
                    <p>FALE CONOSCO 
                        <input type="checkbox" id="cb-pgfaleconosco" checked class='cb-pg' name='cb-faleconosco' /></p>
                    <p>HISTÓRIA 
                        <input type="checkbox" id="cb-pghistoria" checked class='cb-pg' name='cb-historia' /></p>
                    <p>HOME 
                        <input type="checkbox" id="cb-pghome" checked class='cb-pg' name='cb-home' /></p>
                    <p>MISSÃO E VALORES 
                        <input type="checkbox" id="cb-pgmissaovalores" checked class='cb-pg' name='cb-missaovalores' /></p>
                    <p>NOSSAS LOJAS 
                        <input type="checkbox" id="cb-pgnossaslojas" checked class='cb-pg' name='cb-nossaslojas' /></p>
                    <p>NOTÍCIAS 
                        <input type="checkbox" id="cb-pgnoticias" checked class='cb-pg' name='cb-noticias' /></p>
                    <p>PATROCINADOS 
                        <input type="checkbox" id="cb-pgpatrocinados" checked class='cb-pg' name='cb-patrocinados' /></p>
                    <p>POP'S NA ESCOLA <input type="checkbox" id="cb-pgpopsnaescola" checked class='cb-pg' name='cb-popsnaescola' /></p>
                    <p>PRODUTOS 
                        <input type="checkbox" id="cb-pgprodutos" checked class='cb-pg' name='cb-produtos' /></p>
                    <p>VÍDEOS 
                        <input type="checkbox" id="cb-pgvideos" checked class='cb-pg' name='cb-videos' /></p>
                </div>
                <div class="box-permissoes-cruds">
                    <p style="font-size: 12px;">
                        <input type="checkbox" name="pfBrindesR" id="cb-pgbrindes-r" class='cb-crud-r' checked />LER 
                        <input type="checkbox" name="pfBrindesC" class='pg-crud-cud' id="cb-pgbrindes-c" checked />CRIAR 
                        <input type="checkbox" name="pfBrindesU" class='pg-crud-cud' id="cb-pgbrindes-u" checked />ATUALIZAR 
                        <input type="checkbox" name="pfBrindesD" class='pg-crud-cud' id="cb-pgbrindes-d" checked />APAGAR 
                    </p>
                    <p style="font-size: 12px;">
                        <input type="checkbox" name="pfDivulgacaoR" id="cb-pgdivulgacao-r" class='cb-crud-r' checked />LER 
                        <input type="checkbox" name="pfDivulgacaoC" class='pg-crud-cud' id="cb-pgdivulgacao-c" checked />CRIAR 
                        <input type="checkbox" name="pfDivulgacaoU" class='pg-crud-cud' id="cb-pgdivulgacao-u" checked />ATUALIZAR 
                        <input type="checkbox" name="pfDivulgacaoD" class='pg-crud-cud' id="cb-pgdivulgacao-d" checked />APAGAR 
                    </p>
                    <p style="font-size: 12px;">
                        <input type="checkbox" name="pfEventosR" id="cb-pgeventos-r" class='cb-crud-r' checked />LER 
                        <input type="checkbox" name="pfEventosC" class='pg-crud-cud' id="cb-pgeventos-c" checked />CRIAR 
                        <input type="checkbox" name="pfEventosU" class='pg-crud-cud' id="cb-pgeventos-u" checked />ATUALIZAR 
                        <input type="checkbox" name="pfEventosD" class='pg-crud-cud' id="cb-pgeventos-d" checked />APAGAR 
                    </p>
                    <p style="font-size: 12px;">
                        <input type="checkbox" name="pfFaleConoscoR" id="cb-pgfaleconosco-r" class='cb-crud-r' checked />LER 
                        <input type="checkbox" name="pfFaleConoscoC" class='pg-crud-cud' id="cb-pgfaleconosco-c" checked />CRIAR 
                        <input type="checkbox" name="pfFaleConoscoU" class='pg-crud-cud' id="cb-pgfaleconosco-u" checked />ATUALIZAR 
                        <input type="checkbox" name="pfFaleConoscoD" class='pg-crud-cud' id="cb-pgfaleconosco-d" checked />APAGAR 
                    </p>
                    <p style="font-size: 12px;">
                        <input type="checkbox" name="pfHistoriaR" id="cb-pghistoria-r" class='cb-crud-r' checked />LER 
                        <input type="checkbox" name="pfHistoriaC" class='pg-crud-cud' id="cb-pghistoria-c" checked />CRIAR 
                        <input type="checkbox" name="pfHistoriaU" class='pg-crud-cud' id="cb-pghistoria-u" checked />ATUALIZAR 
                        <input type="checkbox" name="pfHistoriaD" class='pg-crud-cud' id="cb-pghistoria-d" checked />APAGAR 
                    </p>
                    <p style="font-size: 12px;">
                        <input type="checkbox" name="pfHomeR" id="cb-pghome-r" class='cb-crud-r' checked />LER 
                        <input type="checkbox" name="pfHomeC" class='pg-crud-cud' id="cb-pghome-c" checked />CRIAR 
                        <input type="checkbox" name="pfHomeU" class='pg-crud-cud' id="cb-pghome-u" checked />ATUALIZAR 
                        <input type="checkbox" name="pfHomeD" class='pg-crud-cud' id="cb-pghome-d" checked />APAGAR 
                    </p>
                    <p style="font-size: 12px;">
                        <input type="checkbox" name="pfMissaoValoresR" id="cb-pgmissaovalores-r" class='cb-crud-r' checked />LER 
                        <input type="checkbox" name="pfMissaoValoresC" class='pg-crud-cud' id="cb-pgmissaovalores-c" checked />CRIAR 
                        <input type="checkbox" name="pfMissaoValoresU" class='pg-crud-cud' id="cb-pgmissaovalores-u" checked />ATUALIZAR 
                        <input type="checkbox" name="pfMissaoValoresD" class='pg-crud-cud' id="cb-pgmissaovalores-d" checked />APAGAR 
                    </p>
                    <p style="font-size: 12px;">
                        <input type="checkbox" name="pfNossasLojasR" id="cb-pgnossaslojas-r" class='cb-crud-r' checked />LER 
                        <input type="checkbox" name="pfNossasLojasC" class='pg-crud-cud' id="cb-pgnossaslojas-c" checked />CRIAR 
                        <input type="checkbox" name="pfNossasLojasU" class='pg-crud-cud' id="cb-pgnossaslojas-u" checked />ATUALIZAR 
                        <input type="checkbox" name="pfNossasLojasD" class='pg-crud-cud' id="cb-pgnossaslojas-d" checked />APAGAR 
                    </p>
                    <p style="font-size: 12px;">
                        <input type="checkbox" name="pfNoticiasR" id="cb-pgnoticias-r" class='cb-crud-r' checked />LER 
                        <input type="checkbox" name="pfNoticiasC" class='pg-crud-cud' id="cb-pgnoticias-c" checked />CRIAR 
                        <input type="checkbox" name="pfNoticiasU" class='pg-crud-cud' id="cb-pgnoticias-u" checked />ATUALIZAR 
                        <input type="checkbox" name="pfNoticiasD" class='pg-crud-cud' id="cb-pgnoticias-d" checked />APAGAR 
                    </p>
                    <p style="font-size: 12px;">
                        <input type="checkbox" name="pfPatrocinadosR" id="cb-pgpatrocinados-r" class='cb-crud-r' checked />LER 
                        <input type="checkbox" name="pfPatrocinadosC" class='pg-crud-cud' id="cb-pgpatrocinados-c" checked />CRIAR 
                        <input type="checkbox" name="pfPatrocinadosU" class='pg-crud-cud' id="cb-pgpatrocinados-u" checked />ATUALIZAR 
                        <input type="checkbox" name="pfPatrocinadosD" class='pg-crud-cud' id="cb-pgpatrocinados-d" checked />APAGAR </p>
                    <p style="font-size: 12px;">
                        <input type="checkbox" name="pfPopsNaEscolaR" id="cb-pgpopsnaescola-r" class='cb-crud-r' checked />LER 
                        <input type="checkbox" name="pfPopsNaEscolaC" class='pg-crud-cud' id="cb-pgpopsnaescola-c" checked />CRIAR 
                        <input type="checkbox" name="pfPopsNaEscolaU" class='pg-crud-cud' id="cb-pgpopsnaescola-u" checked />ATUALIZAR 
                        <input type="checkbox" name="pfPopsNaEscolaD" class='pg-crud-cud' id="cb-pgpopsnaescola-d" checked />APAGAR </p>
                    <p style="font-size: 12px;">
                        <input type="checkbox" name="pfProdutoR" id="cb-pgprodutos-r" class='cb-crud-r' checked />LER 
                        <input type="checkbox" name="pfProdutoC" class='pg-crud-cud' id="cb-pgprodutos-c" checked />CRIAR 
                        <input type="checkbox" name="pfProdutoU" class='pg-crud-cud' id="cb-pgprodutos-u" checked />ATUALIZAR 
                        <input type="checkbox" name="pfProdutoD" class='pg-crud-cud' id="cb-pgprodutos-d" checked />APAGAR 
                    </p>
                    <p style="font-size: 12px;">
                        <input type="checkbox" name="pfVideosR" id="cb-pgvideos-r" class='cb-crud-r' checked />LER 
                        <input type="checkbox" name="pfVideosC" class='pg-crud-cud' id="cb-pgvideos-c" checked />CRIAR 
                        <input type="checkbox" name="pfVideosU" class='pg-crud-cud' id="cb-pgvideos-u" checked />ATUALIZAR 
                        <input type="checkbox" name="pfVideosD" class='pg-crud-cud' id="cb-pgvideos-d" checked />APAGAR 
                    </p>
                </div>
            </div>
            <p style="padding: 10px 0px; font-size: 23px; color: #fff; background-color: #80e5af; border-radius: 40px;">CMS</p>
            <div class="modal-line new-user-box-permissoes-row">
                <div class="box-permissoes-paginas">
                    <p>ADM. USUÁRIOS <input type="checkbox" name="" id="cb-pguser" checked /></p>
                </div>
                <div class="box-permissoes-cruds">
                <p style="font-size: 12px;"><input type="checkbox" name="cmsUserR" id="cb-pguser-r" class='cb-crud-r' checked />LER <input type="checkbox" name="cmsUserC" id="cb-pguser-c" checked />CRIAR <input type="checkbox" name="cmsUserU" id="cb-pguser-u" checked />ATUALIZAR <input type="checkbox" name="cmsUserD" id="cb-pguser-d" checked />APAGAR </p>
                </div>
            </div>
                 
        </div>
        <div class="modal-line">
            <input type="submit" value="CADASTRAR" >
        </div>
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

        // console.log("teste:" + $('#form').data('id'));
        // var idItem = $('#form').data('id');

        // alert(location.href)
        var link = "../router.php?controller=usuario&action=insert";
         $.ajax({
            type: "POST",
            url: link,
            data: new FormData($('#form')[0]),
            cache: false,
            contentType: false,
            processData: false,
            async: true,
            success: function(data){
            
                console.log(data);
                
                if(data == "1"){
                    alert("REGISTRADO COM SUCESSO!");
                }else{
                    alert("FALHA AO REGISTRAR \n \n DATA: " + data);
                }
                $('#back-modal').fadeOut(200);
                listUsers();

            }

        });

    });

    // ↓ SHOW E HIDE NAS BOXES DE ACORDO COM CB PADRAO/PERSONALIZADO
    $('#cb-permissao-padrao').change(function(){

        if($('#cb-permissao-padrao').attr('checked')){

            $('.box-permissoes-padrao').css('display', 'block');
            $('.new-user-box-permissoes').hide();

        }else{

            $('.box-permissoes-padrao').hide();
            $('.new-user-box-permissoes').css('display', 'flex');
        }
    });
    // ↑ SHOW E HIDE NAS BOXES DE ACORDO COM CB PADRAO/PERSONALIZADO

    // ↓ MARCAR PÁGINA QUANDO MARCAR R; NAO DEIXAR DESMARCAR R;
    $('.cb-crud-r').change(function(){
        
        // alert($(this).attr('name'));

        name = $(this).attr('name');

        name = name.toLowerCase();
        len = name.length;

        idr = name.substr(0, len-1);
        idr = "#cb-"+idr+"-"+name.substr(len-1, len);

        idp = idr.substr(0, idr.length-2);

        // alert(idr + "|" + idp)

        if(!$(idp).attr('checked')){
            $(idp).attr('checked', 'checked');
        }else{
            $(idr).attr('checked', 'checked');
        }
        
    });
    // ↑ MARCAR PÁGINA QUANDO MARCAR R; NAO DEIXAR DESMARCAR R;


    $('.pg-crud-cud').change(function(){
        
        // alert($(this).attr('name'));

        name = $(this).attr('name');

        name = name.toLowerCase();
        len = name.length;

        idr = name.substr(0, len-1);
        idr = "#cb-"+idr+"-"+name.substr(len-1, len);

        idp = idr.substr(0, idr.length-2);

        // alert(idr + "|" + idp)

        $(idp).attr('checked', 'checked');
        $(idp+"-r").attr('checked', 'checked');
    });

    // ↓ MARCAR R QUANDO CHECKAR PÁGINA; DESMARCAR C R U D QUANDO DESMARCAR PÁGINA
    $('.cb-pg').change(function(){

        // alert($(this).attr('name'));
        
        idpagina = $(this).attr('name');
        idpagina = idpagina.substr(0, 3) + "pg" + idpagina.substr(3, idpagina.length - 1)
        // alert(idpagina)

        if($('#'+idpagina).attr('checked')){

            $('#'+idpagina+'-r').attr('checked', 'checked');
        }else{

            $('#'+idpagina+'-c').removeAttr('checked');
            $('#'+idpagina+'-r').removeAttr('checked');
            $('#'+idpagina+'-u').removeAttr('checked');
            $('#'+idpagina+'-d').removeAttr('checked');
        }

    });
    // ↑ MARCAR R QUANDO CHECKAR PÁGINA; DESMARCAR C R U D QUANDO DESMARCAR PÁGINA;

</script>