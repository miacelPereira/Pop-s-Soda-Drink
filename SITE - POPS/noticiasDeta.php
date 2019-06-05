<?php

    if(isset($_GET['id'])){
        require_once('php/conexao.php');

        $conn = conexaoBD();

        $sql = "select * from tbl_noticias where id_noticias = ".$_GET['id'];

        $result = mysqli_query($conn, $sql);

        $rs = mysqli_fetch_array($result);
    }

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Pops</title>
    <link rel="stylesheet" type="text/css" media="screen" href="CSS/style.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="CSS/noticiasDeta.css" />

	<link rel="stylesheet" type="text/css" href="engine0/style.css" />
	<script type="text/javascript" src="engine0/jquery.js"></script>
        
        <script src="../cms/view/js/jquery.js"></script>
        
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
        
        <!--  começo do conteudo-->
            <section class="conteudo-corpo">
                <div class="caixa-titulo">
                    <p> <?php echo $rs['titulo'] ?> </p> 
                </div>
                <div class="caixa-desc">
                    <p> <?php echo $rs['subtitulo'] ?> </p>
                </div>
                
                <div class="noticia">
                <p> <?php echo $rs['introducao'] ?> </p>
                </div>

                <div class="img-noti">
                    <img class="img-noti" style="width: 400px; heigth: 450px;" src="<?php echo (str_replace($_SERVER['DOCUMENT_ROOT'], "", $rs['imagem'])) ?>">
                </div>
                <div class="noticia">
                <p> <?php echo $rs['texto'] ?> </p>
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