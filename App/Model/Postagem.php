<?php
class Postagem{
    public static function selecionaTodos(){
        $con = Connection::getConn();

        $sql = "SELECT * FROM postagem ORDER BY id_postagem DESC";
        $sql = $con->prepare($sql);
        $sql->execute();

        while ($row = $sql->fetchObject('postagem')){
            $resultado[] = $row;
        }

        if (!$resultado){
            throw new Exception("Não foi encontrado nenhum registro");
        } 
        return $resultado;
        
    }
}

?>