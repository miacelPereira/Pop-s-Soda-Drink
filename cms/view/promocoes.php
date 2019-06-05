<!DOCTYPE html>
<html>
	<head>
		<title>Gerenciamento do Sistema</title>
		<meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link rel="stylesheet" type="text/css" href="css/styleC.css">
        <link rel="stylesheet" type="text/css" href="css/promocoes.css">
        <link rel="stylesheet" type="text/css" href="css/modal.css">
	</head>
	<body>
        
    
        
        <div class="container">
            <!--Chamada para o cabeçalho -->
            <header>
                <?php require_once("header.php"); ?>
            </header>
            <!--Caixa que segura todo o conteúdo principal-->
            <div class="caixa_conteudo">
            <!--Chamada do menu -->
            <?php require_once("body.html"); ?>  
                <!--Div para adicionar os conteúdos-->   
                <div class="conteudo">
                    
                    <h1 class="titulo">Promoções</h1>
                    
                    <div id="nome-promocao"> <p class="dados-tabela">Nome</p></div>
                    <div id="regulamento-promocao"> <p class="dados-tabela">Regulamento</p></div>
                    <div id="opcoes-promocao"><p class="dados-tabela">Opções</p></div>
                    
                    <div id="tabela">
                        
                        <table class="table">
                        
                            <tr height="40px">
                                <td width="230px">TESTE</td>
                                <td width="309px">khgkgkzslgnjkghghjk</td>
                                <td width="230px">EXCL. ATUAL. </td>
                            </tr>
                            <tr height="40px">
                                <td width="230px">TESTE</td>
                                <td width="309px">khgkgkzslgnjkghghjk</td>
                                <td width="230px">EXCL. ATUAL. </td>
                            </tr>
                            
                            
                        
                        </table>
                    
                    </div>
                    
                    <div id="btnNovaPromocao" >Nova Promoção"</div>
                    
                </div>
            
            </div>
            <footer id="rodape">
                 <img src="imagens/logo9.png" width="230px" heigth="145px"/>    
            </footer>           
        </div>
	</body>
</html>

<script>

 $('#btnNovaPromocao').click(function(){
        // $(document).ready(function(){


        $.ajax({
            type: "GET",
            url: "modal/modal.php",
            success: function(data){
                $("#modal").html(data);
            }
        });
    
        $("#back-modal").css('display', 'flex');
        $("#back-modal").css('flex-direction', 'column');
        $("#back-modal").css('justify-content', 'center');
    });


</script>