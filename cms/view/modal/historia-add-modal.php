<script>
$(document).ready(function(){
    $('#form-add').submit(function(){
        event.preventDefault();
         $.ajax({
            type: "POST",
            url: "../router.php?controller=historia&action=insert",
            data: new FormData($('#form-data')[0]),
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
   <h1 style="text-align: center; font-size: 25px">História Pops</h1>

   <form id="form-add" method="POST" action="../router.php?controller=historia&action=insert" enctype="multipart/form-data" >  
        <div class="caixa">   
            <div class="txtinput"> <h3 >Título:</h3></div>
            <div class="txtinput" name="txttitulo"> <textarea></textarea> </div>
        </div>
        <div class="caixa">
            <div class="txtinput"> <h3 >Subtítulo:</h3></div>
            <div class="txtinput" name="txtsubtitulo" >  <textarea></textarea></div>
        </div>
        <div class="caixa">
            <div class="txt" name="txthistoriaprimeira"> <h3 >História parte 1:</h3><h5>(primeira quebra de texto da história) </h5></div>
            <textarea></textarea>
        </div>
        <div class="caixa">
            <div class="txt"name="txthistoriasegunda"> <h3 >História parte 2:</h3><h5>(segunda quebra de texto da história) </h5></div>
            <textarea> </textarea>
        </div>
        <div class="caixa">
            <h3>Foto História</h3>
            <div class="img-file"></div>
            <input type="file" id="fileprimeira">
        </div>
        <div class="caixa">
            <h3>Foto História</h3>
            <div class="img-file"> </div>
            <input type="file" id="filesegunda">
        </div>
        <input type="submit" value="salvar">
    </form>
</div>
