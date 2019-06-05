<?php


    public function upload($fleFoto){
    
    
    $arquivo = $fleFoto['name'];
    $tamanho_arquivo = $fleFoto['size'];
    $tamanho_arquivo = round($tamanho_arquivo/1024);
    $ext_arquivo = strrchr($arquivo, ".");
    $nome_arquivo = pathinfo($arquivo, PATHINFO_FILENAME);
    $nome_arquivo = md5(uniqid(time()).$nome_arquivo);
    $diretorio_arquivos = "arquivos/";
    $arquivos_permitidos = array(".jpg",".png",".jpeg");
    
    if(in_array($ext_arquivo, $arquivos_permitidos))
        {
            if($tamanho_arquivo<=2000)
            {
                //Arquivo temporário
                $arquivo_tmp = $fleFoto['tmp_name'];
                $foto = $diretorio_arquivos . $nome_arquivo . $ext_arquivo;
                //Move o arquivo para o servidor, usar dois pârametros como origim e destino
                
                $foto2= $nome_arquivo . $ext_arquivo;
                if(move_uploaded_file($arquivo_tmp,$foto))
                {
                   
                    return $foto2;
                    
                }
    
            }
        }


    }
?>