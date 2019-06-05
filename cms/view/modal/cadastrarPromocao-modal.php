<script>
$(document).ready(function(){
    $('#form').submit(function(){
        event.preventDefault();
         $.ajax({
            type: "POST",
            url: "../router.php?controller=promocao&action=insert",
            data: new FormData($('#form')[0]),
            cache: false,
            contentType: false,
            processData: false,
            async: true,
            success: function(data){
                alert("Registrado com sucesso!");
                $('#back-modal').fadeOut(200);
                loadList();
            }
        });
    });
});
</script>

<div class="modal" style="text-align: center;">
    <div class="fechar">X</div>
    <div class="caixa">

        <form id="form" method="POST" enctype="multipart/form-data" >  
            <div class="txt"> <h3 >Digite um nome para a Promoção</h3></div>
            <input name="txtNomePromo" type="text" placeholder="Ex: Promoção de Viagem">
            <div class="caixa">
                <div class="txt"> <h3 >Digite uma descrição para a Promoção</h3></div>
                <textarea name="txtDescricaoPromo" > </textarea>
            </div>
            <div class="caixa">
                <div class="txt"> <h3 >Regulamento</h3></div>
                <textarea name="txtRegulamentoPromo"> </textarea>
            </div>
            <div class="caixa-row-auto">
            <div class="caixa">
                <div class="txt"> <h3 >Foto da Promoção:</h3></div>
                <div class="caixa-file"></div>
                <input type="file" name="file">
            </div>
            <div class="caixa">
                <div class="txt"> <h3 >Qual vai ser o tipo de promoção?</h3></div>
                <div class="caixa-enquete"> 
                    <div class="caixa-radio">
                        <label class="container">Upload de Imagem
                            <input type="checkbox" checked="checked" id="check" name="ckUpload">
                            <span class="checkmark"></span>
                        </label>
                        <div class="caixa-elemento">
                            <div class="txt"> 
                                <h3 style="float: left; padding-top: 20px;">Quantidade máxima de códigos (0 = ilimitado):</h3> 
								<label class="container">
                                    <input type="checkbox"  id="check" name="ckCodigo">
                                    <span class="checkmark"></span>
                                </label>
                                <input type="text" name="txtMaxCodigo" placeholder="5"  style="width: 100px;float: left; margin-left: 10px;">
                            </div>
                        </div>   
                    </div>
                </div>
            </div>
        <div class="btn-enviar">
            <input type="submit" name="btnSalvar" value="Salvar" >
        </div>
        </form>
    </div>
</div>