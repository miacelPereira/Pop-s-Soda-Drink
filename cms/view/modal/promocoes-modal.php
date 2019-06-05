<?php

	if(isset($_POST['id'])){
		require_once('../../require.php');
        reqPromocao();
        $controller = new PromocaoController();
		$promocao = $controller->getOnePromo($_POST['id']);
		
		$tipoPromo = $controller->getOneTypePromo($promocao->getIdTipoPromocao());
	}

?>
<div class="modal" style="text-align: center;">
<div class="fechar">X</div>
<div class="caixa">
	<div class="txt"> <h3 >Nome da promoção</h3></div>
	<?php echo $promocao->getNome(); ?>
</div>
<div class="caixa">
	<div class="txt"> <h3 >Descrição da Promoção</h3></div>
	<textarea readonly="readonly"> <?php echo $promocao->getDescricao(); ?></textarea>
</div>
<div class="caixa">
	<div class="txt"> <h3 >Regulamento</h3></div>
	<textarea readonly="readonly"><?php echo $promocao->getRegulamento(); ?> </textarea>
</div>
<div class="caixa-row-auto">
	<div class="caixa">
		<div class="txt"> <h3 >Foto da Promoção:</h3></div>
		<div class="caixa-file">
			<img src="<?php echo $promocao->getFotoPromocao() ?>" >
		</div>
	</div>
	<div class="caixa">
		<div class="txt"> <h3> Tipo da promoção </h3>
		<p> <?php echo $tipoPromo->getNome() ?> </p>
	</div>
	</div>
</div>