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
}