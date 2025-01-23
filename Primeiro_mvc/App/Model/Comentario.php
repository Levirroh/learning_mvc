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

    public static function inserir($reqPost)
    {
        $con = Connection::getConn();

        $sql = "INSERT INTO comentario (autor_comentario,mensagem_comentario, fk_postagem) VALUES (:aut, :msg, :fk)";
        $sql = $con->prepare($sql);
        $sql->bindValue(':aut', $reqPost['nome']);
        $sql->bindValue(':msg', $reqPost['msg']);
        $sql->bindValue(':fk', $reqPost['id'], PDO::PARAM_INT);
        $sql->execute();

       if ($sql->rowCount()){
        return true;
       }
        throw new Exception("Falha ao criar comentário.");
        return false;
    }



}
