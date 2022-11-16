<?php

namespace App\adms\Models;


class AdmsUpdateUser 
{
    /** @var array $data Recebe os dados que devem ser inseridos no banco de dados*/
    private array|null $data;

    /** @var bool $result Recebe os dados que devem ser inseridos no banco de dados*/
    private bool $result = false;

    /** @var array|null $dataEndereco Recebe os dados referemde à tabela endereco*/
    private array|null $dataEndereco;

    /** @var array|null $dataUser Recebe os dados referentes à tabela usuario*/
    private array $dataUser;

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

        $valEmptyField = new \App\adms\Models\helper\AdmsValEmptyField();
        $valEmptyField->valField($this->data);

        $this->organizeArrays();

        if ($valEmptyField->getResult()) {
            $this->add();
        } else {
            $this->result = false;
        }
    }

    public function organizeArrays(): void
    {
        $this->dataUser['cpf'] = $this->data['cpf'];
        $this->dataUser['telefone'] = $this->data['telefone'];

        unset($this->data['cpf'], $this->data['telefone']);

        $this->dataEndereco = $this->data;
    }


    public function add(): void
    {
        $createEndereco = new \App\adms\Models\helper\AdmsCreate();
        $createEndereco->executeCreate("endereco", $this->dataEndereco);

        $this->dataUser['endereco'] = $createEndereco->getResult();

        $updateUser = new \App\adms\Models\helper\AdmsUpdate();
        $updateUser->executeUpdate("usuario", $this->dataUser, "WHERE idUsuario=:idUsuario", "idUsuario={$_SESSION['user_idUsuario']}");
    }
}
