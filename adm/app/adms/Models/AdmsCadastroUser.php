<?php

namespace App\adms\Models;

use App\adms\Models\helper\AdmsConn;
use PDO;

class AdmsCadastroUser extends AdmsConn
{
    private array|null $data;

    private object $conn;

    private $resultBd;

    private $result; 

    public function getResult()
    {
        return $this->result;
    }

    public function create(array $data = null)
    {
        $this->data = $data;
        //var_dump($this->data);

        $this->conn = $this->connectDb();

        $this->data['password'] = password_hash($this->data['password'], PASSWORD_DEFAULT);

        
        $query_cadastrar_usuario = "INSERT INTO usuario(nomeCompleto, email, nomeUsuario, senha, dtNascimento) VALUES (:nomeCompleto, :email, :nomeUsuario, :senha, :dtNascimento)";

        $cadastrar_usuario = $this->conn->prepare($query_cadastrar_usuario);
        $cadastrar_usuario->bindParam(':nomeCompleto', $this->data['name'], PDO::PARAM_STR);
        $cadastrar_usuario->bindParam(':email', $this->data['email'], PDO::PARAM_STR);
        $cadastrar_usuario->bindParam(':nomeUsuario', $this->data['user'], PDO::PARAM_STR);
        $cadastrar_usuario->bindParam(':senha', $this->data['password'], PDO::PARAM_STR);
        $cadastrar_usuario->bindParam(':dtNascimento', $this->data['date'], PDO::PARAM_STR);
        $cadastrar_usuario->execute();

        $this->resultBd = $cadastrar_usuario->fetch();
    }
}
