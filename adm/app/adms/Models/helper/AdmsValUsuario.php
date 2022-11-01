<?php

namespace App\adms\Models\helper;

/**
 * Classe responsável em validar o usuário.
 * Somente um ucadastro pode utilizar o nomeUsuario.
 */
class AdmsValUsuario
{
    /** @var string $usuario Recebe o usuario do formulário de cadastro do usuário*/
    private string $nomeUsuario;

    /** @var string $result Retorna o resultado da validação, caso ocorra com sucesso, retorna true*/
    private bool $result;

    /** @var string $edit Recebe a informação que é utilizada para verificar se é para validar o usuario para o cadastro ou edição*/
    private bool|null $edit;

    /** @var string $idUsuario Recebe o id do usuário que possui o email cadastrado*/
    private int|null $idUsuario;

    /** @var string $resultBd Recebe os registros do banco de dados*/
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

    public function validadeUserSingleLogin(string $usuario, string $email, bool|null $edit = null, int|null $idUsuario = null): void
    {
        $this->nomeUsuario = $usuario;
        $this->edit = $edit;
        $this->idUsuario = $idUsuario;

        $valUserSingle = new \App\adms\Models\helper\AdmsRead();
        if (($this->edit == true) and (!empty($this->idUsuario))) {
            $valUserSingle->fullRead(
                "SELECT idUsuario FROM usuario WHERE (email =: email OR nomeUsuario =:nomeUsuario) AND idUsuario <>:idUsuario LIMIT :limit",
                "nomeUsuario={$this->nomeUsuario}&idUsuario={$this->idUsuario}&limit=1");
        } else {
            $valUserSingle->fullRead("SELECT idUsuario FROM usuario WHERE nomeUsuario =:nomeUsuario LIMIT :limit", "nomeUsuario={$this->nomeUsuario}&limit=1");
        }

        $this->resultBd = $valUserSingle->getResult();

        if (!$this->resultBd) {
            $this->result = true;
        } else {
            $_SESSION['msg'] = "<p style='color: red;'>Erro: Nome de usuário já cadastrado!</p>";
            $this->result = false;
        }
    }
}
