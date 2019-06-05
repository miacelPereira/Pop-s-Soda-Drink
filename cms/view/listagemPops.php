<!DOCTYPE html>
<html>
	<head>
		<title>Gerenciamento do Sistema</title>
		<meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="css/styleC.css">
        <link rel="stylesheet" type="text/css" href="css/styleEscola.css">
        <script src="js/jquery.js"></script>
        <script>
        $(document).ready(function(){
            
            // Function para abrir a janela modal     
            $(".visualizar").click(function(){
                
                $("#modal").fadeIn(400);    
                
            });
            
        });
    </script>
	</head>
    
	<body>
        <div class="container">
            <!--Modal da Escola-->
            <div id="modal">
        
            </div>
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
                    <div class="pag_escola">
                        <table class="tabEscola">
                            <tr>
                                <th class="titulo_tabela" colspan="4">Escolas cadastradas
                                </th>
                            </tr>
                            <tr class="tblcadastro_td">
                                <td>Nome da Escola</td>
                                <td>CNPJ</td>
                                <td>Endereço</td>
                                <td>Opções</td>
                            </tr>
                            <tr class="tblconsulta_dados">
                                <td>XXXXXXXXXXX</td>
                                <td>XXXXXXXXXXX</td>
                                <td>XXXXXXXXXXX</td>
                                <td>
                                    <a href="#" class="modal" onclick="">
                                        <img src="icones/modify16.png">
                                    </a>|
                                    <a href="#" onclick="">
                                        <img src="icones/delete16.png">
                                    </a>|
                                    <a href="#" class="visualizar" onclick="">
                                        <img class="visualizar" src="icones/Search.png" width="20" height="20">
                                    </a>
                                </td>
                            </tr> 
                            <tr class="tblconsulta_dados">
                                <td>XXXXXXXXXXX</td>
                                <td>XXXXXXXXXXX</td>
                                <td>XXXXXXXXXXX</td>
                                <td>
                                    <a href="#" class="modal" onclick="">
                                        <img src="icones/modify16.png">
                                    </a>|
                                    <a href="#" onclick="">
                                        <img src="icones/delete16.png">
                                    </a>|
                                    <a href="#" class="visualizar" onclick="">
                                        <img class="visualizar" src="icones/Search.png" width="20" height="20">
                                    </a>
                                </td>
                              </tr> 
                              <tr class="tblconsulta_dados">
                                <td>XXXXXXXXXXX</td>
                                <td>XXXXXXXXXXX</td>
                                <td>XXXXXXXXXXX</td>
                                <td>
                                    <a href="#" class="modal" onclick="">
                                        <img src="icones/modify16.png">
                                    </a>|
                                    <a href="#" onclick="">
                                        <img src="icones/delete16.png">
                                    </a>|
                                    <a href="#" class="visualizar" onclick="">
                                        <img src="icones/Search.png" width="20" height="20">
                                    </a>
                                </td>
                              </tr>       
                        </table>
                    </div> 
                </div>
            </div>
            <footer id="rodape">
                 <img src="imagens/logo9.png" width="230px" heigth="145px"/>    
            </footer>           
        </div>
	</body>
</html>