<!--Cabeçalho do CMS -->
 <header class="cabecalho">
     <div class="conteudo_cabecalho">
         <div class="texto_cabecalho">
             <h1>Gerenciamento do Sistema</h1>
         </div>
         <div class="imagem_cabecalho">
             <img src="imagens/user.png"/>           
             <div class="tela_usuario"><!--Div do usuário para sair do sistema do CMS -->
                 <div class="texto_usuario">
                     <h2>Olá, <?php echo $_SESSION['autenticado'];?>!</h2><br>
                        Deseja sair?
                </div>
                <div class="sair_usuario">
                    <a href="login/index.php">Logout</a>
                 </div>
             </div>
         </div>
     </div>
</header>