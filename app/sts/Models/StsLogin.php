<?php

namespace Sts\Models;

class StsLogin
{
    private array|null $data;

    private array|null $resultBd;

    private $result;

    public function getResult()
    {
        return $this->result;
    }

    public function login(array $data = null)
    {
        $this->data = $data;
        //var_dump($this->data);

        $viewUser = new \Sts\Models\helper\CRUD\StsRead();

        //Método que retorna todas as colunas
        //$viewUser->executeRead("usuario", "WHERE email =:user OR nomeUsuario =:user LIMIT :limit", "user={$this->data['user']}&limit=1");

        //Retorna somente as colunas indicadas
        $viewUser->fullRead(
            "SELECT idUsuario, nomeCompleto, email, senha, nomeUsuario, dtNascimento, adms_user_sits FROM usuario WHERE email =:user OR nomeUsuario =:user LIMIT :limit",
            "user={$this->data['user']}&limit=1"
        );

        $this->resultBd = $viewUser->getResult();
        if ($this->resultBd) {
            $this->valEmailPerm();
        } else {
            $_SESSION['msg'] = "<p style='color: #f00'> Erro: Usuário ou senha incorreto! </p>";
            $this->result = false;
        }
    }

    private function valEmailPerm(): void
    {
        if($this->resultBd[0]['adms_user_sits'] == 1){
            $this->validarPassword();
        }elseif($this->resultBd[0]['adms_user_sits'] == 3){
            $_SESSION['msg'] = "<p style='color: #f00'> Erro: Necessário confirmar o e-mail! </p>";
            $this->result = false;
        }
    }

    /**
     * Reponsável em validar a senha do usuário, caso seja igual à cadastrada, realiza o login.
     *
     * @return void
     */
    private function validarPassword()
    {
        if (password_verify($this->data['password'], $this->resultBd[0]['senha'])) {
            //$_SESSION['msg'] = "<p style='color: green'> Login realizado com sucesso! </p>";

            $_SESSION['user_idUsuario'] = $this->resultBd[0]['idUsuario'];
            $_SESSION['user_nomeCompleto'] = $this->resultBd[0]['nomeCompleto'];
            $_SESSION['user_email'] = $this->resultBd[0]['email'];
            $_SESSION['user_nomeUsuario'] = $this->resultBd[0]['nomeUsuario'];

            $this->result = true;
        } else {
            $_SESSION['msg'] = "<p style='color: #f00'> Erro: Usuário ou senha incorreto! </p>";
            $this->result = false;
        }
    }
}
