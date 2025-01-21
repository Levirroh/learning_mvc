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
    public static function selecionaPorId($idPost){
        $con = Connection::getConn();

        $sql = "SELECT * FROM postagem WHERE id_postagem = :id";
        $sql = $con->prepare($sql);
        $sql->bindValue(':id', $idPost, PDO::PARAM_INT);
        $sql->execute();

        $resultado = $sql->fetchObject('Postagem');

        if (!$resultado) {
            throw new Exception("Não foi encontrado nenhum registro no banco");	
        } else {
            $resultado->comentarios = Comentario::selecionarComentarios($idPost);

            if (!$resultado->comentarios){
                $resultado->comentario = 'Ainda não existe nenhuma mensagem neste comentário!';
            }
        }

        return $resultado;
    }
    

}

?>