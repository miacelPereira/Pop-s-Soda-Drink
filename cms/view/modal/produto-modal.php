<?php
     if(isset($_POST['id'])){
          require_once('../../require.php');
          reqProduto();

          $controller = new ProdutoController();
          $produto = $controller->getOne($_POST['id']);
          
     }
?>
<div class="modal" style="text-align: center;">
    <div class="fechar">X</div>
   <h1 style="text-align: center; font-size: 25px">Produto</h1>
   <div class="caixa">
        <div class="txt"> <h3 >Nome do produto:</h3></div>
        <div class="txt"> <?php echo $produto->getNome() ?> </div>
   </div>
   <div class="caixa">
        <div class="txt"> <h3 >Descrição do produto:</h3></div>
        <div class="txt"> <?php echo($produto->getDescricao()) ?> </div>
   </div>
   <div class="caixa">
        <div class="txt"> <h3 >Peso do produto:</h3></div>
        <div class="txt"> <?php echo($produto->getPeso()) ?> </div>
   </div>
   <div class="caixa">
        <div class="txt"> <h3 >Imposto do produto:</h3></div>
        <div class="txt"> <?php echo($produto->getImposto()) ?> </div>
   </div>
   <div class="caixa">
        <div class="txt"> <h3 >Demanda mensal:</h3></div>
        <div class="txt"> <?php echo($produto->getDemandaMensal()) ?> </div>
   </div>
   <div class="caixa">
        <div class="txt"> <h3 >Tempo de ressuprimento:</h3></div>
        <div class="txt"> <?php echo($produto->getTempoRessuprimento()) ?> </div>
   </div>
   <div class="caixa">
        <div class="txt"> <h3 >Quantidade no estoque:</h3></div>
        <div class="txt"> <?php echo($produto->getQuantidadeEstoque()) ?> </div>
   </div>
   <div class="caixa">
        <div class="txt"> <h3 >Local no estoque:</h3></div>
        <div class="txt"> <?php echo($produto->getLocalizacao()) ?> </div>
    </div>
   <div class="caixa">
        <div class="txt"> <h3 >Quantidade por fardo:</h3></div>
        <div class="txt"> <?php echo($produto->getQuantidadeFardo()) ?> </div>
   </div>
   <div class="caixa">
        <div class="txt"> <h3 >Embalagem:</h3></div>
        <div class="txt"> <?php echo($produto->getEmbalagem()) ?> </div>
   </div>
   <div class="caixa">
        <div class="txt"> <h3>Unidade de medida:</h3></div>
        <div class="txt"> <?php echo($produto->getUnidadeMedida()) ?> </div>
   </div>
   <div class="caixa">
        <div class="txt"> <h3 >Quantidade por unidade:</h3></div>
        <div class="txt"> <?php echo($produto->getQuantidadeMedida()) ?> </div>
   </div>
   <div class="caixa">
        <div class="txt"> <h3 >Preço do produto:</h3></div>
        <div class="txt"> R$ <?php echo( str_replace(".", ",",$produto->getPrecoUnidade())) ?></div>
    </div>
    <div class="caixa">
        <div class="txt"> <h3 >Imagem do produto:</h3></div>
        <div class="img-file">
          <img src="<?php echo str_replace($_SERVER['DOCUMENT_ROOT'], "", $produto->getImg()) ?>" alt="Imagem Produto">
        </div>
    </div>
</div>