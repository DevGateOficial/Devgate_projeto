<?php

namespace App\adms\Models;

class AdmsUpdateUser
{
    /** @var array $data Recebe os dados que devem ser inseridos no banco de dados*/
    private array|null $data;

    /** @var bool $result Recebe os dados que devem ser inseridos no banco de dados*/
    private bool $result;

    /** @var array|null $dataEndereco Recebe os dados referemde à tabela endereco*/
    private array|null $dataEndereco;

    /** @var array|null $dataUser Recebe os dados referentes à tabela usuario*/
    private array|null $dataUser;

    /**
     * Retorna a situação do cadastro para quem o instanciar.
     * Caso execute com sucesso retorna true, caso de algum problema, retorna false
     *
     * @return boolean
     */
    public function getResult(): bool
    {
        return $this->result;
    }

    public function create(array $data = null)
    {
        $this->data = $data;

        $this->organizeArrays();

        $valEmptyField = new \App\adms\Models\helper\AdmsValEmptyField();
        $valEmptyField->valField($this->data);

        if ($valEmptyField->getResult()) {
            $this->add();
        } else {
            $this->result = false;
        }
    }

    public function organizeArrays(): void
    {
        $this->dataUser['cpf'] = $this->dataForm['cpf'];
        $this->dataUser['telefone'] = $this->dataForm['telefone'];

        unset($this->dataForm['cpf'], $this->dataForm['telefone']);

        $this->dataEndereco = $this->dataForm;
    }

    public function add(): void
    {
        // $updateUser = new \App\adms\Models\helper\AdmsUpdate();
        // $updateUser->executeUpdate("user", $this->dataUser);

        // $updateEndereco = new \App\adms\Models\helper\AdmsUpdate();
        // $updateEndereco->executeUpdatee("endereco", $this->dataEndereco);
    }
}
