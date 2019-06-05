<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Pops</title>
    <link rel="stylesheet" type="text/css" media="screen" href="CSS/style.css" />
    <script type="text/javascript" src="engine0/jquery.js"></script>
    <link rel="stylesheet" type="text/css" media="screen" href="CSS/promocoes.css" />
	<link rel="stylesheet" type="text/css" href="engine0/style.css" />
    <script>
        $(document).ready(function(){
            loadList();
          // function para abrir  a janela da modal 
                $(".caixa-item2-header").click(function(){
                    $("#container").fadeIn(200);
                });
                $(".btn2").click(function(){
                    $("#container").fadeIn(200);
                });
                $(".caixa-conta").click(function(){
                    $("#container2").fadeIn(200);
                });
                $(".caixa-regulamento").click(function(){
                    $("#container3").fadeIn(200);
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
                $(".fechar").click(function(){
                    $("#container3").fadeOut();
                });
            
                $(".caixa-menu").load('menu.html');
        
        });

        function loadList(){
            $.ajax({
                type: "GET",
                url: "list_content/list_promocoes.php",
                success: function(dados){
                    $(".list_promocoes").html(dados)
                }
            })
        }

        function promoClik(idRegistro){
            $.ajax({
                type: "GET",
                url: "list_content/clickPromo.php",
                data: {id:idRegistro},
                success: function(dados){
                    $(".clickPromo").html(dados)
                }
            });
        }
        function regulamentoClik(idRegistro){
            $.ajax({
                type: "GET",
                url: "list_content/regulamentoClik.php",
                data: {id:idRegistro},
                success: function(dados){
                    $(".regulamentoClik").html(dados)
                }
            });
        }


    </script>
    <script>
        $(document).ready(function() {
              function filterPath(string) {
                return string
                  .replace(/^\//,'')
                  .replace(/(index|default).[a-zA-Z]{3,4}$/,'')
                  .replace(/\/$/,'');
              }
              $('a[href*=#]').each(function() {
                if ( filterPath(location.pathname) == filterPath(this.pathname)
                && location.hostname == this.hostname
                && this.hash.replace(/#/,'') ) {
                  var $targetId = $(this.hash), $targetAnchor = $('[name=' + this.hash.slice(1) +']');
                  var $target = $targetId.length ? $targetId : $targetAnchor.length ? $targetAnchor : false;
                   if ($target) {
                       // -100 para pegar a tela inteira
                     var targetOffset = $target.offset().top-0;
                     $(this).click(function() {
                       $('html, body').animate({scrollTop: targetOffset},500);
                       return false;
                     });
                  }
                }
              });
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
    
    <div id="container3">
        <div id="modal3">
            <div class="fechar">X</div>
            
            <div class="caixa-titulo2"> Regulamento</div>
            <div class="regulamentoClik"></div>
           
            
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
            <section class="conteudo-corpo">
                <div class="caixa-descPromo">
                    <div class="caixa-titulo">
                        Já ganhou uma Viagem hoje ?
                    </div>
                   <div class="clickPromo" style="min-width:500px; height: 200px; float: left;"></div>
                    
                    <div class="list_promocoes"></div>

                    <div class="btn">
                        <a href="#caixa-participe">
                          <input class="scroll"type="button" value="PARTICIPAR">
                        </a>
                    </div>
                    
                    
                </div>  
                
                <div id="caixa-participe" class="caixa-participe">
                    <div class="caixa-titulo">
                        PARTICIPE!
                    </div>
                    
                    <div class="caixa-txt-participe">
                            Ganhar é bom e a gente AMA, né. Então fica ligada que estamos com muitas promoções ! cadastre-se já e aproveite! 
                    </div>
                    <div class="caixa-regulamento"  onclick="regulamentoClik(<?php echo $rs['id_promocao']?>)">
                        <input type="button" value="Ver Regulamento completo" id="btnRosa">
                    </div>
                    
                    <div class="cadastro-promo">
                        <form name="frmCadastroPromo">
                            <div class="caixa-titulo2">
                                Acesse sua conta para continuar
                            </div> 

                            <div class="btn2">
                                <a id="btn-entrar">
                                    <input type="button" value="ENTRAR ">
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
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
</body>
</html>