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
        }

        return $resultado;
    }
    public static function insert($dadosPost) 
    {
        if (($dadosPost['titulo'] == "") OR empty($dadosPost['conteudo'])){
            throw new Exception("Preencha todos os campos.");
            return false;
        } 
        $con = Connection::getConn();
        $sql = "INSERT INTO postagem(titulo_postagem, conteudo_postagem) VALUES (:tit, :cont)";
        $sql = $con->prepare($sql);
        $sql->bindValue(':tit', $dadosPost['titulo']);
        $sql->bindValue(':cont', $dadosPost['conteudo']);
        $res = $sql->execute();
        if  ($res == 0){
            throw new Exception("Falha ao inserir postagem.");
            return false;
        }
        return true;

    }


    public static function update($params)
    {
        $con = Connection::getConn();

        $sql = "UPDATE postagem SET titulo_postagem = :tit, conteudo_postagem = :cont WHERE id_postagem = :id";
        $sql = $con->prepare($sql);
        $sql->bindValue(':tit', $params['titulo']);
        $sql->bindValue(':cont', $params['conteudo']);
        $sql->bindValue(':id', $params['id']);
        $resultado = $sql->execute();

        if ($resultado == 0){
            throw new Exception("Falha ao atualizar postagem.");
            return false;
        }

        return true;


    }

    public static function delete($id){
        $con = Connection::getConn();

        $sql_comentario = "DELETE FROM comentario WHERE fk_postagem = :id";
        $sql_comentario = $con->prepare($sql_comentario);
        $sql_comentario->bindValue(':id', $id);
        $resultado_comentario = $sql_comentario->execute();
        
        $sql_postagem = "DELETE FROM postagem WHERE id_postagem = :id";
        $sql_postagem = $con->prepare($sql_postagem);
        $sql_postagem->bindValue(':id', $id);
        $resultado_postagem = $sql_postagem->execute();
        
        if ($resultado_postagem == 0 OR $sql_comentario == 0){
            throw new Exception("Falha ao deletar postagem.");
            return false;
        }

        return true;
    }
    

}

?>