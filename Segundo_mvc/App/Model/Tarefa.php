<?php

class tarefa
{
    public static function selecionaTodos(){
        $con = Connection::getConn();

        $sql = "SELECT * FROM tarefas INNER JOIN usuarios ON tarefas.fk_usuario = usuarios.id_usuario ORDER BY id_tarefa DESC";
        $sql = $con->prepare($sql);
        $sql->execute();

        while ($row = $sql->fetchObject('tarefa')){
            $resultado[] = $row;
        }
        if (!$resultado){
            throw new Exception("Não foi encontrado nenhuma tarefa.");
        } 
    
        return $resultado;  
    }
    public static function selecionaPorId($idPost){
        $con = Connection::getConn();

        $sql = "SELECT * FROM tarefas INNER JOIN usuarios ON tarefas.fk_usuario = usuarios.id_usuario WHERE id_tarefa = :id";
        $sql = $con->prepare($sql);
        $sql->bindValue(':id', $idPost, PDO::PARAM_INT);
        $sql->execute();

        $resultado = $sql->fetchObject('Tarefa');

        if (!$resultado) {
            throw new Exception("Não foi encontrado nenhum registro no banco");	
        } 

        return $resultado; 
    }
    public static function insert($dadosPost){
        $con = Connection::getConn();

        $sql = "INSERT INTO tarefas (fk_usuario, descricao_tarefa, setor_tarefa, status_tarefa, prioridade_tarefa) VALUES (:fk, :descr, :setor, :sta, :prio)";
        $sql = $con->prepare($sql);
        $sql->bindValue(':fk', $dadosPost['usuario']);
        $sql->bindValue(':descr', $dadosPost['descricao']);
        $sql->bindValue(':setor', $dadosPost['setor']);
        $sql->bindValue(':prio', $dadosPost['prioridade']);
        $sql->bindValue(':sta', 'A Fazer');
        $res = $sql->execute();

        if  ($res == 0){
            throw new Exception("Falha ao inserir postagem.");
            return false;
        }
        return true;
    }
    public static function delete($id){
        $con = Connection::getConn();

        $sql = "DELETE FROM tarefas WHERE id_tarefa = :id";
        $sql = $con->prepare($sql);
        $sql->bindValue(':id', $id);
        $res = $sql->execute();

        if  ($res == 0){
            throw new Exception("Falha ao inserir postagem.");
            return false;
        }
        return true;
    }
    public static function update($dadosPost){
        $con = Connection::getConn();

        $sql = "UPDATE tarefas SET descricao_tarefa = :descr, setor_tarefa = :setor, fk_usuario = :usu, prioridade_tarefa = :prio WHERE id_tarefa = :id";
        $sql = $con->prepare($sql);
        $sql->bindValue(':descr', $dadosPost['descricao']);
        $sql->bindValue(':setor', $dadosPost['setor']);
        $sql->bindValue(':usu', $dadosPost['usuario']);
        $sql->bindValue(':prio', $dadosPost['prioridade']);
        $sql->bindValue(':id', $dadosPost['id']);
        $res = $sql->execute();
        if  ($res == 0){
            throw new Exception("Falha ao atualizar postagem.");
            return false;
        }
        return true;
    }
    public static function updateStatus($dadosPost){
        $con = Connection::getConn();

        $sql = "UPDATE tarefas SET status_tarefa = :sta WHERE id_tarefa = :id";
        $sql = $con->prepare(query: $sql);
        $sql->bindValue(':sta', $dadosPost['status']);
        $sql->bindValue(':id', $dadosPost['id']);
        $res = $sql->execute();
        if  ($res == 0){
            throw new Exception("Falha ao atualizar postagem.");
            return false;
        }
        return true;
    }
}