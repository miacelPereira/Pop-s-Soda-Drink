<?php

if(isset($_GET['id'])){

    // require_once('../../controller/usuarioController.php');
    // require_once('../../model/DAO/usuarioCmsDao.php');
    // require_once('../../model/usuarioCmsClass.php');

    // require_once('../../controller/permissaoController.php');
    // require_once('../../model/DAO/permissaoDao.php');
    // require_once('../../model/permissaoCmsClass.php');

    require_once('../../require.php');
    
    reqAutenticar();
    reqUsuario();
    reqPermissao();
    
    $permissaoController = new PermissaoController();
    
    $permissao = $permissaoController->getPermissao($_GET['id']);

    $descricao = $permissao->getDescricao();

    $pfHome = $permissao->getPfHome();
    $pfHistoria = $permissao->getPfHistoria();
    $pfProduto = $permissao->getPfProduto();;
    $pfBrindes = $permissao->getPfBrindes();;
    $pfNoticias = $permissao->getPfNoticias();;
    $pfDivulgacao = $permissao->getPfDivulgacao();;
    $pfVideos = $permissao->getPfVideos();;
    $pfPatrocinados = $permissao->getPfPatrocinados();;
    $pfEventos = $permissao->getPfEventos();;
    $pfNossasLojas = $permissao->getPfNossasLojas();;
    $pfPromocoes = $permissao->getPfPromocoes();;
    $pfFaleConosco = $permissao->getPfFaleConosco();;
    $pfPopsNaEscola = $permissao->getPfPopsNaEscola();;
    $pfMissaoValores = $permissao->getPfMissaoValores();;
    $cmsUser = $permissao->getCmsUser();
                
}else{
    echo "ID NÃO INFORMADO CORRETAMENTE";
}

?>
<div id="modal-header">
    <div>&nbsp;</div>
    <div><h1 class="header-text">ATUALIZAR PERMISSÃO</h1></div>
    <div><h1 class="header-text" id="close-modal">X</h1></div>
</div>
<div id="modal-body">
    <!-- action="../router.php?controller=permissao&action=update&id=<?php //echo $_GET['id']; ?>" -->
    <form data-id="<?php echo $_GET['id']; ?>" id="form" method="post">
        <div class="modal-line"><input type="text" name="txtDesc" value="<?php echo $permissao->getDescricao() ?>" required placeholder="DIGITE UM NOME PARA ESSA CONFIGURAÇÃO" id=""/></div>
        <div class="modal-line">
            <!-- <textarea name="txtDesc" id="" placeholder="DESCRIÇÃO (opcional)"></textarea> -->
        </div>

        <div class="modal-line new-permission-box-permissoes">
                <h2 id="new-permission-title2">INFORMAR PERMISSÕES:</h2>
                <div class="new-permission-box-permissoes2">
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
                            <p>PROMOÇÕES 
                                <input type="checkbox" id="cb-pgpromocoes" checked class='cb-pg' name='cb-promocoes' /></p>
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
                                <input type="checkbox" name="pfPromocoesR" id="cb-pgvideos-r" class='cb-crud-r' checked />LER 
                                <input type="checkbox" name="pfPromocoesC" class='pg-crud-cud' id="cb-pgvideos-c" checked />CRIAR 
                                <input type="checkbox" name="pfPromocoesU" class='pg-crud-cud' id="cb-pgvideos-u" checked />ATUALIZAR 
                                <input type="checkbox" name="pfPromocoesD" class='pg-crud-cud' id="cb-pgvideos-d" checked />APAGAR 
                            </p>
                            <p style="font-size: 12px;">
                                <input type="checkbox" name="pfVideosR" id="cb-pgvideos-r" class='cb-crud-r' checked />LER 
                                <input type="checkbox" name="pfVideosC" class='pg-crud-cud' id="cb-pgvideos-c" checked />CRIAR 
                                <input type="checkbox" name="pfVideosU" class='pg-crud-cud' id="cb-pgvideos-u" checked />ATUALIZAR 
                                <input type="checkbox" name="pfVideosD" class='pg-crud-cud' id="cb-pgvideos-d" checked />APAGAR 
                            </p>
                        </div>
                    </div>
                </div>
        </div>

        <div class="modal-line"><input type="submit" value="CADASTRAR"></div>
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

        var link = "../router.php?controller=permissao&action=update&id="+idItem;

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
                if(data == 1){
                    alert("REGISTRADO COM SUCESSO!");
                }else{
                    console.log(data);
                    alert("FALHA NO REGISTRO! Tente novamente");
                }
                
                $('#back-modal').fadeOut(200);
                listPermissions();

            }

        });

    });


    // ↓ MARCAR R QUANDO CHECKAR PÁGINA; DESMARCAR C R U D QUANDO DESMARCAR PÁGINA
    $('#cb-pfhome').change(function(){

        if($('#cb-pfhome').attr('checked')){

            $('#cb-pfhome-r').attr('checked', 'checked');
        }else{

            $('#cb-pfhome-c').removeAttr('checked');
            $('#cb-pfhome-r').removeAttr('checked');
            $('#cb-pfhome-u').removeAttr('checked');
            $('#cb-pfhome-d').removeAttr('checked');
        }
    });

    $('#cb-pfhistoria').change(function(){

        if($('#cb-pfhistoria').attr('checked')){

            $('#cb-pfhistoria-r').attr('checked', 'checked');
        }else{

            $('#cb-pfhistoria-c').removeAttr('checked');
            $('#cb-pfhistoria-r').removeAttr('checked');
            $('#cb-pfhistoria-u').removeAttr('checked');
            $('#cb-pfhistoria-d').removeAttr('checked');
        }
    });

    $('#cb-cmsuser').change(function(){

        if($('#cb-cmsuser').attr('checked')){

            $('#cb-cmsuser-r').attr('checked', 'checked');
        }else{

            $('#cb-cmsuser-c').removeAttr('checked');
            $('#cb-cmsuser-r').removeAttr('checked');
            $('#cb-cmsuser-u').removeAttr('checked');
            $('#cb-cmsuser-d').removeAttr('checked');
        }
    });
    // ↑ MARCAR R QUANDO CHECKAR PÁGINA; DESMARCAR C R U D QUANDO DESMARCAR PÁGINA

    // ↓ MARCAR PÁGINA QUANDO MARCAR R; NAO DEIXAR DESMARCAR R;
    $('#cb-pfhome-r').change(function(){
        
        if(!$('#cb-pfhome').attr('checked')){
            $('#cb-pfhome').attr('checked', 'checked');
        }else{
            $('#cb-pfhome-r').attr('checked', 'checked');
        }
        
    });
    $('#cb-pfhistoria-r').change(function(){
        
        if(!$('#cb-pfhistoria').attr('checked')){
            $('#cb-pfhistoria').attr('checked', 'checked');
        }else{
            $('#cb-pfhistoria-r').attr('checked', 'checked');
        }
        
    });
    $('#cb-cmsuser-r').change(function(){
        
        if(!$('#cb-cmsuser').attr('checked')){
            $('#cb-cmsuser').attr('checked', 'checked');
        }else{
            $('#cb-cmsuser-r').attr('checked', 'checked');
        }
        
    });
    // ↑ MARCAR PÁGINA QUANDO MARCAR R; NAO DEIXAR DESMARCAR R;

    // ↓ MARCAR PÁGINA e R QUANDO MARCAR C U D
    $('#cb-pfhome-c').change(function(){
        
        $('#cb-pfhome').attr('checked', 'checked');
        $('#cb-pfhome-r').attr('checked', 'checked');
    });
    $('#cb-pfhome-u').change(function(){
        
        $('#cb-pfhome').attr('checked', 'checked');
        $('#cb-pfhome-r').attr('checked', 'checked');
    });
    $('#cb-pfhome-d').change(function(){
        
        $('#cb-pfhome').attr('checked', 'checked');
        $('#cb-pfhome-r').attr('checked', 'checked');
    });

    $('#cb-pfhistoria-c').change(function(){
        
        $('#cb-pfhistoria').attr('checked', 'checked');
        $('#cb-pfhistoria-r').attr('checked', 'checked');
    });
    $('#cb-pfhistoria-u').change(function(){
        
        $('#cb-pfhistoria').attr('checked', 'checked');
        $('#cb-pfhistoria-r').attr('checked', 'checked');
    });
    $('#cb-pfhistoria-d').change(function(){
        
        $('#cb-pfhistoria').attr('checked', 'checked');
        $('#cb-pfhistoria-r').attr('checked', 'checked');
    });

    $('#cb-cmsuser-c').change(function(){
        
        $('#cb-cmsuser').attr('checked', 'checked');
        $('#cb-cmsuser-r').attr('checked', 'checked');
    });
    $('#cb-cmsuser-u').change(function(){
        
        $('#cb-cmsuser').attr('checked', 'checked');
        $('#cb-cmsuser-r').attr('checked', 'checked');
    });
    $('#cb-cmsuser-d').change(function(){
        
        $('#cb-cmsuser').attr('checked', 'checked');
        $('#cb-cmsuser-r').attr('checked', 'checked');
    });

    // ↑ MARCAR PÁGINA e R QUANDO MARCAR C U D
</script>