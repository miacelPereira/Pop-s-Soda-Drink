<div class="modal" style="text-align: center;">
    <div class="fechar">X</div>
    <form name="frmFaleConosco" method="POST" id="router">
        <h1 style="text-align: center; font-size: 25px">Eventos</h1>
        <div class="caixa">
            <div class="txt"> <h3 >Nome do Evento:</h3></div>
            <input type="text" placeholder="Ex: Nanina" name="txtNome">
        </div>
       <div class="caixa">
            <div class="txt"> <h3 >Endereço do evento:</h3></div>
            <input type="text" placeholder="Ex: rua NaninaNanina" name="txtEndereco">
        </div>
        <div class="caixa">
                <div class="txt"> <h3 >Data do Evento:</h3></div>
                <input type="text" placeholder="Ex: 20/04/2018" name="txtData">
        </div>
        <div class="caixa">
            <div class="txt"> <h3 >Hora do Evento:</h3></div>
            <input type="text" placeholder="Ex:20:18" name="txtHora">
        </div>  
        <div class="btn-enviar">
            <input type="submit" value="Salvar" >
        </div>
    </form>
</div>
<script src="js/eventosAdm.js"></script>