<script>
$('#form').submit(function(){
    event.preventDefault();

    var link = "../router.php?controller=popnaescola&action=insert&slide="+$('#form').data('id');
        $.ajax({
            type: "POST",
            url: link,
            data: new FormData($('#form')[0]),
            cache: false,
            contentType: false,
            processData: false,
            async: true,
            success: function(data){
                $('#back-modal').fadeOut(200);
                loadList();
            }
        });
    });
    function loadList(){
        $.ajax({
            type: "GET",
            url: "content/list_popComVoce.php?slide=1",
            success: function(dados){
                $(".container-list-1").html(dados);
            }
        })
        $.ajax({
            type: "GET",
            url: "content/list_popComVoce.php?slide=2",
            success: function(dados){
                $(".container-list-2").html(dados);
            }
        })
    }
</script>
<div class="modal">
    <div class="fechar"><span id="fechar">X</span></div>
    <div class="container-list">
        <form data-id="<?php echo $_GET['id'] ?>" id="form" method="POST" enctype="multipart/form-data">
            <div class='container_form'>
                <div class="caixa">   
                    <div class="txtinput"> <h3 >Título:</h3></div>
                    <div class="txtform" style="width: 100%; height: 50px;"><input type="text" name="txt-titulo" placeholder="Título">  </div>
                </div>
                <div class="caixa-file">
                    <h1 >Foto</h1>
                    <div class="img-file"></div>
                    <input type="file" name="file" id="file">  
                </div>
            </div>
        <input type="submit" name="btn-save" value="Salvar">
        </form>
    </div>
</div>