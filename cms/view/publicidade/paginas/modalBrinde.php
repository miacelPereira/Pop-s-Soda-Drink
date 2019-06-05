

<html>
    <head>
        <title>Modal</title>
        <title>Gerenciamento do Sistema</title>
		<meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="css/styleC.css">
        <link rel="stylesheet" type="text/css" href="css/modalBrinde.css">
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
                        <h1>Cadastro de Brinde</h1>
                    </div>
                    <div id="div_body">
                        <div id="caixa1">
                            Nome do brinde:<br> <input type="text"><br><br>
                            Unidade de medida:<br> <input type="text">
                        </div>
                        <div id="caixa2">
                            Descrição: <br><textarea id="#" value="" name="" cols="50" rows="8" ></textarea>
                            <input type="button" value="Cadastrar">
                        </div>
                    </div>
                </div>
            </div>
    </body>
</html>