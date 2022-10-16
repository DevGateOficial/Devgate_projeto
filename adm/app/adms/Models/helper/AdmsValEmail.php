<?php

namespace App\adms\Models\helper;

/**
 * Classe responsável em validar o email do usuário.
 * Valida se o email utilizado no cadastro é num formato válido.]
 * Confere se o email a ser cadastrado já existe no banco de dados, caso exista, não permite o cadastro.
 */
class AdmsValEmail
{
    /** @var string $email Recebe o email do formulário de cadastro do usuário*/
    private string $email;

    /** @var string $result Retorna o resultado da validação, caso ocorra com sucesso, retorna true*/
    private bool $result;

    /** @var string $edit */
    private bool|null $edit;

    /** @var string $idUsuario Recebe o id do usuário que possui o email cadastrado*/
    private int|null $idUsuario;

    /** @var string $resultBd Retorna o id do usuário que possui o email cadastrado*/
    private array|null $resultBd;

    /**
     * Retorna o resultado da validação, caso ocorra com sucesso, retorna true
     *
     * @return boolean
     */
    public function getResult(): bool
    {
        return $this->result;
    }

    /**
     * Recebe o email do cadastro e confere se possui um formato válido
     *
     * @param string $email
     * @return void
     */
    public function validadeEmail(string $email): void
    {
        $this->email = $email;
        if (filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            $this->result = true;
        } else {
            $_SESSION['msg'] = "<p style='color: red;'>Erro: Email Inválido!</p>";
            $this->result = false;
        }
    }

    /**
     * Recebe o email do cadastro e confere se o email ja está cadastrado no banco de dados.
     * Caso já esteja cadastrado, não realizada o cadastro do novo usuário.
     *
     * @param string $email
     * @param boolean|null|null $edit
     * @param integer|null|null $idUsuario
     * @return void
     */
    public function validadeEmailSingle(string $email, bool|null $edit = null, int|null $idUsuario = null): void
    {
        $this->email = $email;
        $this->edit = $edit;
        $this->idUsuario = $idUsuario;

        $valEmailSingle = new \App\adms\Models\helper\AdmsRead();
        if (($this->edit == true) and (!empty($this->idUsuario))) {
            $valEmailSingle->fullRead(
                "SELECT idUsuario FROM usuario WHERE email =:email idUsuario =:idUsuario LIMIT :limit",
                "email={$this->email}&idUsuario={$this->idUsuario}&limit=1");
        } else {
            $valEmailSingle->fullRead("SELECT idUsuario FROM usuario WHERE email =:email LIMIT :limit", "email={$this->email}&limit=1");
        }

        $this->resultBd = $valEmailSingle->getResult();

        if (!$this->resultBd) {
            $this->result = true;
        } else {
            $_SESSION['msg'] = "<p style='color: red;'>Erro: Email já cadastrado!</p>";
            $this->result = false;
        }
    }
}
