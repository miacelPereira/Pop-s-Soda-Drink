

<html>
    <head>
        <title>Modal</title>
        <title>Gerenciamento do Sistema</title>
		<meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="css/styleC.css">
        <link rel="stylesheet" type="text/css" href="css/modalEstabelecimento.css">
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
                        <h1>Detalhes do estabelecimento</h1>
                    </div>
                    <div id="div_body">
                        <div id="caixa1">
                            Imagem
                        </div>
                        <div id="caixa2">
                            <div id="caixa_imagem">
                                <div class="img_estabelecimento">
                                
                                </div>
                            </div>
                        </div>
                        <div id="caixa3">
                                Razão Social <br> <input type="text" value="">
                                Email <br> <input type="text" value="">
                                Endereço <br> <input type="button" value="Cadastrar">
                                Bairro <br> <input type="text" value="">
                                Telefone <br> <input type="button" value="Cadastrar">
                        </div>
                        <div id="caixa4">
                            Nome Fantasia <br> <input type="text" value="">
                            Tipo de estabelecimento <br> <input type="text" value="">
                            Cidade <br> <input type="text" value="">
                            CEP <br> <input type="text" value="">
                        </div>
                        <div id="caixa5">
                            CNPJ <br> <input type="text" value="">
                            Renda Mensal <br> <input type="text" value=""> 
                            Bairro <br> <input type="text" value=""> <br>
                            N: &nbsp;&nbsp;UF <br> <input type="button" value="">&nbsp;&nbsp;&nbsp;<input type="button" value="">
                            <input type="button" value="Cadastrar">
                        </div>
                    </div>
                </div>
            </div>
    </body>
</html>