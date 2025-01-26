<?php

class Usuario{
    public static function selecionaTodos(){
        $con = Connection::getConn();

        $sql = "SELECT * FROM usuarios";
        $sql = $con->prepare($sql);
        $sql->execute();

        while ($row = $sql->fetchObject('usuario')){
            $resultado[] = $row;
        }
        if (!$resultado){
            throw new Exception("Não foi encontrado nenhum usuário.");
        } 
        return $resultado; 
    }
    public static function insert($dadosPost){
        $con = Connection::getConn();

        $sql = "INSERT INTO usuarios (nome_usuario, email_usuario) VALUES (:nome, :email)";
        $sql = $con->prepare($sql);
        $sql->bindValue(':nome', $dadosPost['nome']);
        $sql->bindValue(':email', $dadosPost['email']);
        $res = $sql->execute();

        if  ($res == 0){
            throw new Exception("Falha ao inserir usuário.");
            return false;
        }
        return true;
    }
}