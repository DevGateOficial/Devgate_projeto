<?php

namespace App\adms\Models;

use App\adms\Models\helper\AdmsConn;
use PDO;

class AdmsLogin extends AdmsConn
{
    private array|null $data;

    private object $conn;

    private $resultBd;

    private $result;

    public function getResult()
    {
        return $this->result;
    }

    public function login(array $data = null)
    {
        $this->data = $data;
        //var_dump($this->data);

        $this->conn = $this->connectDb();

        $query_validar_login = "SELECT idUsuario, nomeCompleto, email, nomeUsuario, senha 
                                FROM usuario 
                                WHERE email =:email OR nomeUsuario =:nomeUsuario
                                LIMIT 1";

        $result_validar_login = $this->conn->prepare($query_validar_login);
        $result_validar_login->bindParam(':email', $this->data['user'], PDO::PARAM_STR);
        $result_validar_login->bindParam(':nomeUsuario', $this->data['user'], PDO::PARAM_STR);
        $result_validar_login->execute();

        $this->resultBd = $result_validar_login->fetch();
        

        if ($this->resultBd) {
            //var_dump($this->resultBd);
            $this->validarPassword();
        } else {
            $_SESSION['msg'] = "<p style='color: #f00'> Erro: Usuário ou senha incorreto! </p>";
            $this->result = false;
            //echo $_SESSION['msg'];
        }
    }

 
    private function validarPassword()
    {
        if (password_verify($this->data['password'], $this->resultBd['senha'])) {
            //$_SESSION['msg'] = "<p style='color: green'> Login realizado com sucesso! </p>";

            $_SESSION['user_idUsuario'] = $this->resultBd['idUsuario'];
            $_SESSION['user_nomeCompleto'] = $this->resultBd['nomeCompleto'];
            $_SESSION['user_email'] = $this->resultBd['email'];
            $_SESSION['user_nomeUsuario'] = $this->resultBd['nomeUsuario'];

            $this->result = true;
        } else {
            $_SESSION['msg'] = "<p style='color: #f00'> Erro: Usuário ou senha incorreto! </p>";
            $this->result = false;

        }
    }
}
