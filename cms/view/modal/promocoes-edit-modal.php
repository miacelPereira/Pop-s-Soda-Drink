<?php

	if(isset($_POST['id'])){
		require_once('../../require.php');
		reqPromocao();
		$controller = new PromocaoController();
		$promocao = $controller->getOnePromo($_POST['id']);
		$tipoPromo = $controller->getOneTypePromo($promocao->getIdTipoPromocao());
	}

?>
<script>
    function loadList(){
        $.ajax({
            type: "GET",
            url: "content/list_promocao.php",
            success: function(dados){
                $("#container-list").html(dados)
            }
        });
    }
    $('#form').submit(function(){
        event.preventDefault();
        var link = "../router.php?controller=promocao&action=update&id="+$('#form').data('id');
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
</script>

<div class="modal" style="text-align: center;">
	<div class="fechar">X</div>
	<form id="form" data-id="<?php echo $_POST['id'] ?>" enctype="multipart/form-data">	
		<div class="caixa">
			<div class="txt"> <h3 >Nome da promoção</h3></div>
			<input type="text" name="txt-nome-promo" value="<?php echo $promocao->getNome(); ?>">
			<div class="caixa">
				<div class="txt"> <h3 >Descrição da Promoção</h3></div>
				<textarea name="txt-descricao-promo"> <?php echo $promocao->getDescricao(); ?></textarea>
			</div>
			<div class="caixa">
				<div class="txt"> <h3 >Regulamento</h3></div>
				<textarea name="txt-regulamento-promo"><?php echo $promocao->getRegulamento(); ?> </textarea>
			</div>
			<div class="caixa-row-auto">
				<div class="caixa">
					<div class="txt"> <h3 >Foto da Promoção:</h3></div>
					<div class="caixa-file">
						<input type="file" name="file-promo">
					</div>
				</div>
				<div class="caixa">
					<div class="txt">
						<h3> Tipo da promoção </h3>
						<p> <?php echo $tipoPromo->getNome() ?> </p>
					</div>
				</div>
			</div>
		</div>
		<input type="submit" name="btn-promo-edit" value="Editar">
	</form>
</div>