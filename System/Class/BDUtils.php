<?php
/* Não usada*/
class BDUtils {

    /**
     * Função que retorna um array com os Selects Sql da função
     * @param stirng $sql
     * @return type
     */
    public static function querySelect($sql) {
        $db = new Bd();
        $comandoPreparado = $db->prepare($sql);
        //return ($fetch === true) ? $resultado->fetch() : $resultado;
        try {
            $comandoPreparado->execute();
        } catch (Exception $e) {
            LogUtils::gerarLog(3, 'FALHA', 'log_erro', $sql, $e);
            return PaginaUtils::alertErro($e)->renderizar();
        }
        return $comandoPreparado;
    }

    /**
     * Função que executa um Insert SQL
     * @param string $sql
     * @param array $params
     * @param array $values
     * @return type
     */
    public static function executeInsert($sql, $params, $values) {
        $bd = new Bd();
        $code = $bd->prepare($sql);

        $numberArrayParams = count($values);
        for ($i = 0; $i < $numberArrayParams; ++$i) {
            $code->bindValue(":" . $params[$i], $values[$i]);
        }

        return $code->execute() ? true : false;
    }

    /**
     * Função que executa um Update SQL
     * @param string $sql
     * @param array $params
     * @param array $values
     * @return type
     */
    public static function executeUpdate($sql, $params, $values) {
        $bd = new Bd();
        $code = $bd->prepare($sql);

        $numberArrayParams = count($values);
        for ($i = 0; $i < $numberArrayParams; ++$i) {
            $code->bindValue(":" . $params[$i], $values[$i]);
        }
        return $code->execute() ? true : false;
    }

    /**
     * Função que executa um DELETE SQL
     * @param string $sql
     * @return type
     */
    public static function executeDelete($sql, $delete = false) {
        $bd = new Bd();
        $code = $bd->prepare($sql);
        if ($delete == false) {
            $code->bindValue(":ativo", 0);
        }
        return $code->execute() ? true : false;
    }

    /**
     * Função para verificar se tal registro em tal tabela pode ser apagado
     * @param array $tabelas
     * @param array $colunas
     */
    public static function confirmDelete($id, $tabelas, $colunas) {
        $countArrays = count($colunas);
        for ($i = 0, $ok = true; $i < $countArrays; ++$i) {
            $sql = SQLUtils::gerarSqlSelectSimple("COUNT('id') AS total", $tabelas[$i], "$colunas[$i] = $id AND ativo = 1");
            $registro = BDUtils::querySelect($sql);
            if ($registro['total'] > 0) {
                $ok = false;
                break;
            }
        }
        return $ok;
    }

    /**
     * Pega qualquer valor de qualquer tabela, referente ao $where
     * @param type $colBD
     * @param type $tabelaBD
     * @param type $where
     * @return val
     */
    public static function getDataBD($colBD, $tabelaBD, $where) {
        $sql = SQLUtils::gerarSqlSelectSimple("$colBD", $tabelaBD, $where);
        $resultado = BDUtils::querySelect($sql);
        return $resultado["$colBD"];
    }

   

}
