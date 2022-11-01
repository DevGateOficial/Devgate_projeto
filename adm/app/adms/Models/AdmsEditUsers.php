<?php

namespace App\adms\Models;

/**
 * Classe responsável na edição de usuarios no banco de dados
 */
class AdmsEditUsers
{
    /** @var int|string|null $data Recebe o id do registro*/
    private int|string|null $id;

    /** @var bool $result Recebe os dados que devem ser inseridos no banco de dados*/
    private bool $result = false;

    /** @var array|null $resultBd Recebe os registro do banco de dados*/
    private array|null $resultBd;

    /** @var array $data Recebe os dados que devem ser inseridos no banco de dados*/
    private array|null $data;

    /**
     * Retorna true qwuando executar o processo com sucesso, retorna false quando ocorrer algum erro
     *
     * @return boolean
     */
    public function getResult(): bool
    {
        return $this->result;
    }

    /**
     * Retorna os registro do banco de dados
     *
     * @return array|null
     */
    public function getResultBd(): array|null
    {
        return $this->resultBd;
    }

    /**
     * Faz a leitura do ususário correspondente ao id que é recebido através da controller
     *
     * @param integer $id
     * @return void
     */
    public function viewUser(int $id): void
    {
        $this->id = $id;

        $viewUser = new \App\adms\Models\helper\AdmsRead();
        $viewUser->fullRead("SELECT * 
                                FROM usuario
                                WHERE idUsuario =:id LIMIT :limit", "id={$this->id}&limit=1");

        $this->resultBd = $viewUser->getResult();

        if ($this->resultBd) {
            $this->result = true;
        } else {
            $_SESSION['msg'] = "<p style='color: red;'> Usuario não encontrado!</p>";
            $this->result = false;
        }
    }

    public function update(array $data = null): void
    {
        $this->data = $data;
        var_dump($this->data);

        $valEmptyField = new \App\adms\Models\helper\AdmsValEmptyField();
        $valEmptyField->valField($this->data);

        if ($valEmptyField->getResult()) {
            $this->valInput();
        } else {
            $this->result = false;
        }
    }

    /**
     * Valida o email e senha do usuário. 
     * Verifica se o email é válido e se já existe no banco de dados.
     *
     * @return void
     */
    private function valInput(): void
    {
        //Validação do email
        $valEmail = new \App\adms\Models\helper\AdmsValEmail();
        $valEmail->validadeEmail($this->data['email']);

        $valEmailSingle = new \App\adms\Models\helper\AdmsValEmailSingle();
        $valEmailSingle->validadeEmailSingle($this->data['email'], $this->data['nomeUsuario'], true, $this->data['idUsuario']);

        if(($valEmail->getResult()) and ($valEmailSingle->getResult())){
            $this->edit();
        }else{
            $this->result = false;
        }
    }

    private function edit(): void
    {
        $updateUser = new \App\adms\Models\helper\AdmsUpdate();
        $updateUser->executeUpdate("usuario", $this->data, "WHERE idUsuario=:idUsuario", "idUsuario={$this->data['idUsuario']}");

        if($updateUser->getResult()){
            $_SESSION['msg'] = "<p style='color: green;'> Usuário atualizado com sucesso! </p>";
            $this->result = true;
        }else{
            $_SESSION['msg'] = "<p style='color: red;'> Erro: Não foi possível atualizar o usuário!</p>";
            $this->result = false;
        }
    }
}
