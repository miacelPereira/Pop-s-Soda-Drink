<?php
    require_once('../php/conexao.php');

    $conn = conexaoBD();

    $sql = 'select * from tbl_imagens_slide_pop_escola where ativado = 1 and slide = 1';

    $result = mysqli_query($conn, $sql);

    $rs = mysqli_fetch_array($result)
?>
    <div class="caixa-slide">
        <div id="wowslider-container0">
        <div class="ws_images"><ul>
            <li>
                <img src="<?php echo (str_replace($_SERVER['DOCUMENT_ROOT'], "", $rs['url_imagem'])) ?>" alt="<?php echo $rs['titulo'] ?>" title="<?php echo $rs['titulo'] ?>" id="wows1_0" />
            </li>
            
        </ul></div>
        <div class="ws_bullets">
            <div>
                <a href="#" title="Escola claro camargo no dia 17/05/2018"><span><img src="data0/tooltips/escol.jpg" alt="Escola claro camargo no dia 17/05/2018"/>1</span></a>
                <a href="#" title="Escola Freiki  no dia 10/08/2018"><span><img src="data0/tooltips/escola.jpg" alt="Escola Freiki  no dia 10/08/2018"/>2</span></a>
                <a href="#" title="Escola nota 10 no dia 17/08/2018"><span><img src="data0/tooltips/180517_escolanota10_mvs7710.jpg" alt="Escola nota 10 no dia 17/08/2018"/>3</span></a>
            </div></div><div class="ws_script" style="position:absolute;left:-99%"></div>
            <div class="ws_shadow"></div>
        </div>	
        <script type="text/javascript" src="engine0/wowslider.js"></script>
        <script type="text/javascript" src="engine0/script.js"></script>
    </div>


        