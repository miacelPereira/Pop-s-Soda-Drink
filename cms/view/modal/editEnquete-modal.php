<?php
echo("pagina para editar");

?>


<div class="modal" style="text-align: center;">
        <div class="fechar">X</div>
       <h1 style="text-align: center; font-size: 25px">Enquete</h1>
       
      <form data-id="" name="frmBrinde" id="form" method="POST" enctype="multipart/form-data"> 
        <div class="caixa">
                <div class="txt"> <h3 >Descrição:</h3></div>
                <textarea name="txtDescricao" id="" style="height: 100px; width: 100%" maxlength="10"></textarea>
        </div>
        <div class="caixa">
                <div class="txt"> <h3 >Pergunta:</h3></div>
                <input type="text" name="txtPergunta" id="txtPergunta" value="">
            </div>
        <div class="caixa" style="width: 100%">
            <div class="txt"> <h3 >Opções de resposta:</h3></div>
            <div id="enquete-lista">

                PEGAR O QUE O ELIMAR FEZ PARA ADICIONAR MAIS DE UMA ENQUETE
        
            </div>
            
        </div>
        
            <div class="btn-enviar">
                <input type="submit" value="Salvar">
            </div> 
        </form>
</div>