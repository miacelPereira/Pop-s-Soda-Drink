

<html>
    <head>
        <title>Modal</title>
        <title>Gerenciamento do Sistema</title>
		<meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="css/styleC.css">
        <link rel="stylesheet" type="text/css" href="css/modalParceiro.css">
        <script src="js/jquery.js"></script>
        <script>
        
            $(document).ready(function(){
            
                // Function para abrir a janela modal     
                $(".fechar").click(function(){

                    $("#container").fadeOut(400);    

                });
            
            });
        
        </script>
    </head>
    <body>
        <div id="container">
                <div id="modal">
                    
                    <div id="div_header">
                        <div class="fechar"><a href="#" class="fechar">X</a>
                            
                        </div>
                        <h1>Cadastro de Parceiro</h1>
                    </div>
                    <div id="div_body">
                        <div id="caixa1">
                            Titulo: <input type="text">
                        </div>
                        <div id="caixa2">
                            Imagem: <br>
                            <div id="img_parceiro">
                            
                            </div>
                            
                        </div>
                        <div id="caixa3">
                            Nome da equipe:
                            <input type="text" >
                            Modalide: 
                            <input type="text" >
                        </div>
                        <div id="caixa4">
                            <input type="button" value="Cadastrar">
                        </div>
                    </div>
                </div>
            </div>
    </body>
</html>