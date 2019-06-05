

<html>
    <head>
        <title>Modal</title>
        <title>Gerenciamento do Sistema</title>
		<meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="css/styleC.css">
        <link rel="stylesheet" type="text/css" href="css/modalProduto.css">
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
                            <div class="caixa_esquerda">
                                Nome do brinde:<br> <input type="text"><br><br>
                            Unidade de medida:<br> <input type="text">
                            </div>
                            <div class="caixa_direita">
                                Descrição: <br><textarea id="#" value="" name="" cols="50" rows="8" ></textarea>
                            </div>
                        </div>
                        <div id="caixa2">
                            <div class="divisao">
                                Peso Bruto:<br> <input type="text">
                            </div>
                            <div class="divisao">
                                Imposto:<br> <input type="text">
                            </div>
                            <div class="divisao">
                                Demanda Mensal:<br> <input type="text">
                            </div>
                        </div>
                        <div id="caixa3">
                            <div class="divisao">
                                Tempo de Ressuprimento:<br> <input type="text">
                            </div>
                            <div class="divisao">
                                Intervalo de Ressuprimento:<br> <input type="text">
                            </div>
                            <div class="divisao">
                                Quantidade estoque:<br> <input type="text">
                            </div>
                        </div>
                        <div id="caixa4">
                            <div class="divisao">
                                Preço Unitário:<br> <input type="text">
                            </div>
                            <div class="divisao">
                                Quantidade em fardo:<br> <input type="text">
                            </div>
                            <div class="divisao">
                                Preço Fardo:<br> <input type="text">
                            </div>
                        </div>
                        <div id="caixa5">
                            <div class="divisao_maior">
                                Embalagem:<br> <input type="text">
                            </div>
                            <div class="divisao_maior">
                                Foto:<br> <input type="text">
                                <div id="img">
                                    
                                </div>
                            </div>
                            <div class="divisao_maior">
                                
                            </div>
                        </div>
                        <div id="caixa6">
                            <h1>Matérias-primas necessárias</h1>
                        </div>
                        <div id="caixa7">
                            <div class="divisao">
                                Matéria-prima:<br> <input type="text">
                            </div>
                            <div class="divisao">
                                Quantidade:<br> <input type="text">
                            </div>
                            <div class="divisao">
                                <input type="button" value="+"> Adicionar
                            </div>
                        </div>
                        <div id="caixa8">
                            <div class="tabela">
                                <div class="row-titulo">
                                    <div class="assunto"> Nome</div>
                                     <div class="assunto"> Tipo</div>
                                     <div class="assunto"> Mensagens</div>
                                     <div class="assunto"> Opções</div>
                                </div>
                                <div class="row">
                                    <div class="conteudo">Conteudo</div>
                                    <div class="conteudo">Conteudo</div>
                                    <div class="conteudo">Conteudo</div>
                                    <div class="conteudo-img">
                                        <div class="icon1"></div>
                                        <div class="icon2"></div>
                                    </div>
                                </div>
                             </div>
                        </div>
                        <div id="caixa9">
                            <input type="button" value="Cadastrar"> 
                        </div>
                    </div>
                </div>
            </div>
    </body>
</html>