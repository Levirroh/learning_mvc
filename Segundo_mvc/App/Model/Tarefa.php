<?php

class tarefa
{
    public static function selecionaTodos(){
        $con = Connection::getConn();

        $sql = "SELECT * FROM tarefas ORDER BY id_tarefa DESC";
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
    public static function insert($dadosPost){
        $con = Connection::getConn();

        $sql = "SELECT id_usuario FROM usuarios WHERE nome_usuario = ':usu'";
        $sql = $con->prepare($sql);
        $sql->bindValue(':usu', $dadosPost['usuario']);
        $sql->execute();
        $res = $sql->execute();

        $sql = "INSERT INTO tarefas(fk_usuario, descricao_tarefa, setor_tarefa, status_tarefa, prioridade_tarefa) VALUES (:fk, :descr, :setor, :sta, :prio)";
        $sql = $con->prepare($sql);
        $sql->bindValue(':descr', $dadosPost['descricao']);
        $sql->bindValue(':setor', $dadosPost['setor']);
        $sql->bindValue(':fk', $dadosPost['usuario']);
        $sql->bindValue(':prio', $dadosPost['prioridade']);
        $sql->bindValue(':tit', 'A Fazer');
        $sql->execute();
        $res = $sql->execute();

        if  ($res == 0){
            throw new Exception("Falha ao inserir postagem.");
            return false;
        }
        return true;
    }

}