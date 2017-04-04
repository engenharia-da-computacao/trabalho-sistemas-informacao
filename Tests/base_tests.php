<?php
function copiar_diretorio($diretorio, $destino){
      if ($destino{strlen($destino) - 1} == '/'){
         $destino = substr($destino, 0, -1);
        }
      if (!is_dir($destino)){
         mkdir($destino, 0755);
      }
        
      $folder = opendir($diretorio);
       
      while ($item = readdir($folder)){
         if ($item == '.' || $item == '..'){
            continue;
            }
         if (is_dir("{$diretorio}/{$item}")){
            copiar_diretorio("{$diretorio}/{$item}", "{$destino}/{$item}");
         }else{
            copy("{$diretorio}/{$item}", "{$destino}/{$item}");
         }
      }
}