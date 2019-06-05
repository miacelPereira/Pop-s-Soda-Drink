<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Pops</title>
    <link rel="stylesheet" type="text/css" media="screen" href="CSS/style.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="CSS/faleConosco.css" />

    
	<!-- Start WOWSlider.com HEAD section --> <!-- add to the <head> of your page -->
	<link rel="stylesheet" type="text/css" href="engine0/style.css" />
	<script type="text/javascript" src="engine0/jquery.js"></script>
	<!-- End WOWSlider.com HEAD section -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        
         <script>
        $(document).ready(function(){
          // function para abrir  a janela da modal 
                $(".caixa-item2-header").click(function(){
                    $("#container").fadeIn(200);
                });
            
                $(".caixa-conta").click(function(){
                        $("#container2").fadeIn(200);
                });
            
                $(".caixa-contaLogin").click(function(){
                    $("#container2").fadeOut(200);
                });
            
                $(".fechar").click(function(){
                    $("#container").fadeOut();
                });
            
                $(".fechar").click(function(){
                    $("#container2").fadeOut();
                });
            
           
                $(".caixa-menu").load('menu.html');
               
        
        });
    </script>
    
	</head>
    
<body>
     <div id="container">
        <div id="modal">
            <div class="fechar">X</div>
            <div class="titulo-modal">
                Autentique-se para continuar
            </div>
            <div class="caixa-input">
                <input type="text" placeholder="CPF/CNPJ">
            </div>

            <div class="caixa-input">
                <input type="text" placeholder="Senha">
            </div>
            <div class="caixa-button">
                <input id="btn-modal" type="button" value="Entrar">
            </div>
            <div class="caixa-conta">
                <h3>Não tem uma conta? Cadastre-se</h3>
            </div>
            
        </div>
    </div>
    
     <div id="container2">
        <div id="modal2">
            <div class="fechar">X</div>
            <div class="titulo-modal">
                Cadastre-se
            </div>
            <div class="caixa-input">
                <input type="text" placeholder="Nome">
            </div>
            <div class="caixa-input">
                <input type="text" placeholder="Sobrenome">
            </div>
            <div class="caixa-input">
                <input type="tel" placeholder="Telefone">
            </div>

            <div class="caixa-input">
                <input type="email" placeholder="Email">
            </div>
            <div class="caixa-input">
                <input type="password" placeholder="Senha">
            </div>
            <div class="caixa-button">
                <input id="btn-modal" type="button" value="Entrar">
            </div>

            <div class="caixa-contaLogin">
                <h3>Já tem uma conta? Fazer Login</h3>
            </div>
        </div>
    </div>
    <div id="container1">
            <header class="conteudo-header">
                <div class="conteudo">
                    <!--  include do menu com jquery -->
                    <div class="caixa-menu"></div>
                    <div class="caixa-item1-header">
                        <a href="produtos.html">
                            PRODUTOS
                        </a>
                    </div>
                    <a href="index.html">
                        <div class="caixa-logo"></div>
                    </a>
                    <div class="caixa-item2-header">
                        <a href="#">
                            COMUNIDADE
                        </a>
                    </div>
                    <div class="caixa-user">
                        <img src="IMG/user.png">

                        <div class="caixa-login">
                            <form name="frmlogin">
                                <div class="titulologin"> CPF/CNPJ:</div>
                                <input type="text" placeholder="Digite..">
                                
                                 <div class="titulologin"> Senha:</div>
                                <input type="text" placeholder="Digite..">
                                <div class="caixa-submit"> 
                                    <input type="submit" value="ENTRAR">
                                </div>
                                <h4> Não tem uma conta? Cadastre-se</h4>
                            </form>

                        </div>
                    </div>
                </div>

            </header>
        
        <!-- area de conteudo-->
            <section class="conteudo-corpo">
                <h1>Para qualquer dúvida entre em contato conosco </h1>
                <form name="frmFaleConosco" method="POST" id="router">
                    <div class="caixa_formulario">
                        <div id="titulo_faleConosco">
                            <h1 style="font-size:36px">Fale Conosco</h1> 
                        </div>

                        <div class="caixa_row">
                            <div class="caixa-metade">
                                <div class="assunto">
                                    Nome:
                                </div>
                                <div class="caixa_input">
                                    <input type="text" placeholder="Digite seu nome" id="nome" name="txtNome"  required>
                                </div>
                            </div>

                            <div class="caixa-metade">
                                <div class="assunto">
                                    Sobrenome:
                                </div>
                                <div class="caixa_input">
                                    <input type="text" placeholder="Digite seu nome" id="nome" name="txtSobrenome"  required>
                                </div>
                            </div>

                        </div>

                        <div class="caixa_row">
                            <div class="assunto">
                                Email:
                            </div>
                            <div class="caixa_input">
                                <input type="email" placeholder="Ex: soda@gmail.com" name="txtEmail" required>
                            </div>
                        </div>

                        <div class="caixa_row">
                            <div class="caixa-metade">
                                <div class="assunto">
                                    tel.Residencial:
                                </div>
                                <div class="caixa_input">
                                    <input type="text" placeholder="Digite um telefone" id="tel" name="txtTelefone"  required>
                                </div>
                            </div>

                            <div class="caixa-metade">
                                <div class="assunto">
                                    Celular:
                                </div>
                                <div class="caixa_input">
                                    <input type="text" placeholder="Digite seu telefone" id="tel" name="txtCelular"  required>
                                </div>
                            </div>
                        </div>
                        <div class="caixa_row">
                            <div class="assunto">
                                Categoria do assunto:
                            </div>
                            <div class="caixa_input">
                                <select name="txtCategoriaAssunto" >
                                  <option value="1">Duvida</option>
                                  <option value="2">Critica</option>
                                    <option value="3">Sugestão</option>
                                </select>
                            </div>
                        </div>

                        <div class="caixa_row">
                            <div class="assunto">
                                Mensagem:
                            </div>
                            <div class="caixa_input">
                                <textarea placeholder="Digite sua mensagem..." style="height:150px" name="txtMensagem"></textarea>
                            </div>
                        </div>

                        <input type="submit" value="ENVIAR">


                </div>
            </form>
            </section>
        
        
            <footer class="conteudo-footer">
                <div class="caixa-footer-sobre">
                    <div class="caixa-sobre">
                       <h2>Sobre nós</h2>
                    </div>
                    <div class="caixa-txt-sobre">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat
                    </div>
                </div>
                <div class="caixa-footer-contatos">
                    <h2>Contatos</h2>
                    <div class="caixa-contatos">
                        oncreate@gmail.com
                        <br>
                        <br>
                        (11)4144-2481
                        
                        <div class="caixa-copy"> 
                            © 2018 Pop´s Soda Drink
                        </div>
                    </div>
                </div>
                <div class="caixa-footer-redes">
                    <h2>Redes Sociais </h2>
                    <div class="redes">
                        <div class="caixa-redes">
                            <img src="IMG/facebook%20(1).png">
                            <img src="IMG/google-plus.png">
                            <img src="IMG/instagram.png">
                        </div>
                    </div>
                </div>
            </footer>
    </div>
    <script>
       $('#router').submit(function(){

        //Cancela o submit do HTML
        event.preventDefault();
            
        var link = "../cms/router.php?controllerfale=mensagem&action=insert";
         $.ajax({
            type: "POST",
            url: link,
            data: new FormData($('#router')[0]),
            cache: false,
            contentType: false,
            processData: false,
            async: true,
            success: function(data){
            
                console.log(data);
                
                if(data == 1){
                    alert("REGISTRADO COM SUCESSO!");
                }else{
                    alert("FALHA AO REGISTRAR \n \n DATA: " + data);
                }

            }

        });

    });
        
    </script>
</body>
</html>