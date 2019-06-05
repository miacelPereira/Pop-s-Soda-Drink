<!DOCTYPE html>
<html>
	<head>
		<title>Gerenciamento do Sistema</title>
		<meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="css/styleC.css">
        <link rel="stylesheet" type="text/css" href="css/styleVideos.css">
        <script src="js/jquery.js"></script>
        <script>
       $(document).ready(function(){
            
            // Function para abrir a janela modal     
            $(".visualizar").click(function(){
                
                $("#container").fadeIn(1100);    
                
            });
            
        });
        
    </script>
    <script>
        $(document).ready(function(){
        // Function para fechar a janela modal     
        $(".fechar").click(function(){

        $("#container").fadeOut(400);    

            });
            
        });
        
        </script>
	</head>
    
	<body>
        <div class="container">
            <!--Modal da Escola-->
            <div id="container">
                <div id="modal">
                    
                    <div id="div_header">
                        <div class="fechar"><a href="#" class="fechar">X</a>
                            
                        </div>
                        Detalhes do Produto
                    </div>
                    <div id="div_body">
                        <div id="detalhes_produto">
                        
                        </div>
                        <div id="materia_produto">
                        
                        </div>
                    
                    </div>
                </div>
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
                                <th class="titulo_tabela" colspan="3">Vídeos cadastrados
                                </th>
                            </tr>
                            <tr class="tblcadastro_td">
                                <td>Título</td>
                                <td>Vizualições</td>
                                <td>Opções</td>
                            </tr>
                            <tr class="tblconsulta_dados">
                                <td>XXXXXXXXXXX</td>
                                <td>XXXXXXXXXXX</td>
                                <td>
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
                                <td>
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
                                <td>
                                    <a href="#" onclick="">
                                        <img src="icones/delete16.png">
                                    </a>|
                                    <a href="#" class="visualizar" onclick="">
                                        <img class="visualizar" src="icones/Search.png" width="20" height="20">
                                    </a>
                                </td>
                            </tr>       
                        </table>
                        <div class="novo_cadastro">
                            <input type="button" value="+ Novo Vídeo">
                        </div>
                    </div> 
                </div>
            </div>
            <footer id="rodape">
                 <img src="imagens/logo9.png" width="230px" heigth="145px"/>    
            </footer>           
        </div>
	</body>
</html>