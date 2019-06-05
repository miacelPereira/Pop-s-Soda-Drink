<?php

    @session_start();

    require_once($_SESSION['prefix']."require.php");
    reqProduto();
    $produto = new ProdutoController();
    $listProduto = $produto->getAll();

    reqEvento();
    $evento = new EventosController();
    $listEvento = $evento->listarEventos();

    reqComunidadeCms();
    $post = new ComunidadeController();
    $listPost = $post->listarComunidade();




$edit = false;
if(isset($_GET['type'])){
    if($_GET['type'] == "edit"){
        
        $edit = true;
        $id = $_GET['id'];

        $matprimaDao = new MateriaPrimaDao();
        $matprima = new MateriaPrima();
        $matprima = $matprimaDao->selectById($id);

    }
}
?>
<div class="modal" style="text-align: center;">
    <div class="fechar">X</div>
    <form name="frmFaleConosco" method="POST" id="router">
   <h1 style="text-align: center; font-size: 25px">Home Site</h1>
   <div class="caixa">
           <div class="txt"> <h3 >Titulo:</h3><h5 style="font-size: 14px;">(texto chamativo para a entrada do usuario)</h5></div>
           <div class="txt"> 
                <input type="text" placeholder="Digite um titulo" name="txtTitulo">
           </div>
   </div>
   <div class="caixa">
       <div class="txt"> <h3 >Subtitulo</h3><h5 style="font-size: 14px;">(complemento do texto chamativo para a entrada do usuario)</h5></div>
       <div class="txt"> 
           <textarea placeholder="Digite sua mensagem..." style="height:100px" name="txtSubtitulo"></textarea>
       </div>
   </div>
   <div class="caixa-row-auto">
        <div class="caixa">
                <div class="txt"> <h3 >Escolhe Três produtos:</h3></div>
                <div class="txt "> 
                        <select style="border: 0.8px solid #000; margin-top: 5px" name="txtProdutoUm">
                                <?php foreach ($listProduto as $produto) {
                    
                                echo "<option value='".$produto->getId()."'>".$produto->getNome()."</option>";
                            }?>
                        </select>
                    
                </div>
                <div class="txt "> 
                        <select style="border: 0.8px solid #000; margin-top: 5px" name="txtProdutoDois">
                                <?php foreach ($listProduto as $produto) {
                    
                                echo "<option value='".$produto->getId()."'>".$produto->getNome()."</option>";
                            }?>
                        </select>
                    
                </div>
                <div class="txt "> 
                        <select style="border: 0.8px solid #000; margin-top: 5px" name="txtProdutoTres">
                                <?php foreach ($listProduto as $produto) {
                    
                                echo "<option value='".$produto->getId()."'>".$produto->getNome()."</option>";
                            }?>
                        </select>
                    
                </div>
        </div>
        <div class="caixa">
            <div class="txt"> <h3>Enquete</h3></div>
            <div class="txt-bancos">
                    <select style="border: 0.8px solid #000; margin-top: 5px" name="txtEnquete">
                        <option>Escolhido</option>
                </select>
            </div>
        </div>
    </div>
   <div class="caixa" >
        <div class="txt"> <h3 >Post 1</h3> <h5 style="font-size: 14px;">(Escolha um Post da comunidade para aparecer na home)</h5></div>
        <div class="txt"> 
            <select style="border: 0.8px solid #000; margin-top: 5px" name="txtPostUm">
                <?php foreach ($listPost as $post) {

                echo "<option value='".$post->getId()."'>".$post->getNomeUser()."</option>";
                }?>
            </select>
        </div>
    </div>
    <div class="caixa">
        <div class="txt"> <h3 >Post 2 </h3> <h5 style="font-size: 14px;">(Escolha um Post da comunidade para aparecer na home)</h5></div>
        <div class="txt"> 
            <select style="border: 0.8px solid #000; margin-top: 5px" name="txtPostDois">
                <?php foreach ($listPost as $post) {

                echo "<option value='".$post->getId()."'>".$post->getNomeUser()."</option>";
                }?>
            </select>
        </div>
    </div>
    <div class="caixa">
        <div class="txt"> <h3 >Post 3 </h3> <h5 style="font-size: 14px;">(Escolha um Post da comunidade para aparecer na home)</h5></div>
        <div class="txt"> 
            <select style="border: 0.8px solid #000; margin-top: 5px" name="txtPostTres">
                <?php foreach ($listPost as $post) {

                echo "<option value='".$post->getId()."'>".$post->getNomeUser()."</option>";
                }?>
            </select>
        </div>
    </div>
    <div class="caixa">
        <div class="txt"> <h3 >Post 4 </h3> <h5 style="font-size: 14px;">(Escolha um Post da comunidade para aparecer na home)</h5></div>
        <div class="txt"> 
            <select style="border: 0.8px solid #000; margin-top: 5px" name="txtPostQuatro">
                <?php foreach ($listPost as $post) {

                echo "<option value='".$post->getId()."'>".$post->getNomeUser()."</option>";
                }?>
            </select>
        </div>
    </div>
    <div class="caixa-row-auto">
        <div class="caixa">
                <div class="txt"> <h3>Texto chamado Promoção:</h3> <h5 style="font-size: 14px;">(Texto de chamado para a promoção)</h5></div>
                <div class="txt-bancos">
                        <textarea placeholder="Digite sua mensagem..." style="height:100px; " name="txtMensagemPromocao"></textarea>
                </div>
        </div>
    </div>
    <div class="caixa-row-auto">
            <div class="caixa">
                    <div class="txt"> <h3 >Escolha até três eventos</h3></div>
                    <div class="txt "> 
                        <select style="border: 0.8px solid #000; margin-top: 5px" name="txtEventoUm">
                                <?php foreach ($listEvento as $evento) {
                    
                                echo "<option value='".$evento->getId()."'>".$evento->getNome()."</option>";
                            }?>
                        </select>
                    </div>
                    <div class="txt "> 
                        <select style="border: 0.8px solid #000; margin-top: 5px" name="txtEventoDois">
                                <?php foreach ($listEvento as $evento) {
                    
                                echo "<option value='".$evento->getId()."'>".$evento->getNome()."</option>";
                            }?>
                        </select>
                        </div>
                        <div class="txt "> 
                        <select style="border: 0.8px solid #000; margin-top: 5px" name="txtEventoTres">
                                <?php foreach ($listEvento as $evento) {
                    
                                echo "<option value='".$evento->getId()."'>".$evento->getNome()."</option>";
                            }?>
                        </select>
                        </div>
            </div>
        </div>
        <div class="btn-enviar">
            <input type="submit" value="Salvar">
        </div>
    </form>
</div>
<script src="js/homeSite.js"></script>
<script>
$('#router').submit(function(){

        //Cancela o submit do HTML
        event.preventDefault();
            
        var link = "../router.php?controllerhome=home&action=insert";
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