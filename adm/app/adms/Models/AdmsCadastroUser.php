<?php

namespace App\adms\Models;


class AdmsCadastroUser
{
    private array|null $data;

    private $result;

    public function getResult()
    {
        return $this->result;
    }

    public function create(array $data = null)
    {
        $this->data = $data;

        $valEmptyField = new \App\adms\Models\helper\AdmsValEmptyField();
        $valEmptyField->valField($this->data);

        if ($valEmptyField->getResult()) {
            $this->data['senha'] = password_hash($this->data['senha'], PASSWORD_DEFAULT);

            $cadastrarUser = new \App\adms\Models\helper\AdmsCreate();
            $cadastrarUser->executeCreate("usuario", $this->data);

            if($cadastrarUser->getResult()){
                $_SESSION['msg'] = "<p style='color: green;'>Usuário cadastrado com sucesso!</p>";
                $this->result = true;
            }else{
                $_SESSION['msg'] = "<p style='color: #f00;'>Erro: Usuário não cadastrado com sucesso!</p>";
                $this->result = false;
                echo "ta aqui";
            }
        }else{
            $this->result = false;
        }

        // $query_cadastrar_usuario = "INSERT INTO usuario(nomeCompleto, email, nomeUsuario, senha, dtNascimento) VALUES (:nomeCompleto, :email, :nomeUsuario, :senha, :dtNascimento)";

        // $cadastrar_usuario = $this->conn->prepare($query_cadastrar_usuario);
        // $cadastrar_usuario->bindParam(':nomeCompleto', $this->data['name'], PDO::PARAM_STR);
        // $cadastrar_usuario->bindParam(':email', $this->data['email'], PDO::PARAM_STR);
        // $cadastrar_usuario->bindParam(':nomeUsuario', $this->data['user'], PDO::PARAM_STR);
        // $cadastrar_usuario->bindParam(':senha', $this->data['password'], PDO::PARAM_STR);
        // $cadastrar_usuario->bindParam(':dtNascimento', $this->data['date'], PDO::PARAM_STR);
        // $cadastrar_usuario->execute();

        // $this->resultBd = $cadastrar_usuario->fetch();
    }
}
