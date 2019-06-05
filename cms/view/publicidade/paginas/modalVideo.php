

<html>
    <head>
        <title>Modal</title>
        <title>Gerenciamento do Sistema</title>
		<meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="css/styleC.css">
        <link rel="stylesheet" type="text/css" href="css/ModalVideo.css">
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
                        <h1>Cadastro de Vídeo</h1>
                    </div>
                    <div id="div_body">
                        <div id="caixa_titulo">
                            Titulo: <input type="text">
                        </div>
                        <div id="caixa_video">
                            <label>Video</label> <br>
                            <div id="video">
                            
                            </div>
                            <input type="button" value="Cadastrar">
                        </div>
                    </div>
                </div>
            </div>
    </body>
</html>