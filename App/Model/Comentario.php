<?php


class Comentario{

    public static function selecionarComentarios($idPost){
        $con = Connection::getConn();

        $sql = "SELECT * FROM comentario WHERE fk_postagem = :id";
        $sql = $con->prepare($sql);
        $sql->bindValue(':id', $idPost, PDO::PARAM_INT);
        $sql->execute();

        // como pode ter mais de um comentário, deve ser armazenado em uma array


        $resultado = array();

        while ($row = $sql->fetchObject('Comentario')){
            $resultado[] = $row;
        }
        return $resultado;

    }



}
