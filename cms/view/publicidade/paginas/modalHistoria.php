

<html>
    <head>
        <title>Modal</title>
        <title>Gerenciamento do Sistema</title>
		<meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="css/styleC.css">
        <link rel="stylesheet" type="text/css" href="css/modalHistoria.css">
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
                        <h1>História da empresa</h1>
                    </div>
                    <div id="div_body">
                        <div id="caixa1">
                            Titulo: <input type="text">
                            Frase: <input type="text">
                        </div>
                        <div id="caixa2">
                            <div id="caixa_imagem">
                                Imagem 1
                                <div class="img_historia">
                                
                                </div>
                            </div>
                            <div id="caixa_imagem">
                                Imagem 2
                                <div class="img_historia">
                                
                                </div>
                            </div>
                        </div>
                        <div id="caixa3">
                            <div id="caixa_texto">
                                Texto 1
                                <div class="txt_historia">
                                    <textarea id="#" value="" name="" cols="50" rows="8" ></textarea>
                                </div>
                            </div>
                            <div id="caixa_texto">
                                Texto 2
                                <div class="txt_historia">
                                    <textarea id="#" value="" name="" cols="50" rows="8" ></textarea>
                                </div>
                            </div>
                        </div>
                        <div id="caixa4">
                            <input type="button" value="Cadastrar">
                        </div>
                    </div>
                </div>
            </div>
    </body>
</html>