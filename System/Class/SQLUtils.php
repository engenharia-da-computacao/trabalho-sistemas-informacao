<?php

class SQLUtils {

    /**
     * Função que cria um SQL de Insert com os parametros passados
     * @param string $tabela
     * @param array $campos
     * @return string
     */
    
      public static function gerarSqlInsert($tabela, $campos) {
        $sql = "INSERT INTO $tabela ";
        /** As keys do array são os nomes dos campos na tabela */
        $keys = array_keys ($campos);
        $sql .= "(" . implode(", ", $keys) . ")";
        $sql .= " VALUES (:" . implode(", :", $keys) . ")";
        return $sql;
    }

    /** Usual -----------------------------------------------------------------------------------
     * Função que gera um SQL de Select simples
     * @param string $campos
     * @param string $tabela
     * @param stirng $where
     * @param string $orderBy
     * @return type string
     */

 public static function SelectSimples($campos,$tabela,$where='',$orderBy=''){
        $consulta = "SELECT $campos  FROM $tabela ";
        if ($where != ""){
            $consulta  .= " WHERE $where ";
        }
        if($orderBy != ''){
            $consulta .= "ORDER BY $orderBy ";
        }
        return $consulta;
    }
    /**
     * Função que gera um SQL para Update
     * @param string $tabela
     * @param array $sets
     * @param string $where
     * @return type
     */
    public static function gerarSqlUpdate($tabela, $array, $where) {
        $sql = "UPDATE $tabela SET ";
        $contArray = count($array);
        $i = 1;
        foreach ($array as $key => $value) {
            $sql .= "$key = :$key ";
            $sql .= ($i == $contArray ) ? " " : " , ";
            ++$i;
        }

        if ($where != "") {
            $sql .= " WHERE $where";
        }

        return $sql;
    }

    /**
     * Função que gera um SQL para DELETE
     * @param string $tabela
     * @param string $where
     * @return type
     */
    public static function gerarSqlDelete($tabela, $where, $delete = false) {
        if ($delete) {
            return "DELETE FROM $tabela WHERE $where";
        } else {
            return $this->gerarSqlUpdate($tabela, array("ativo"), $where);
        }
    }

}
