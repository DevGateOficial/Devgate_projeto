<?php

namespace App\adms\Models;

/**
 * Classe responsável na edição de cursos do banco de dados
 */
class AdmsEditCursos
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

    public function viewCurso(int $id): void
    {
        $this->id = $id;

        $viewCurso = new \App\adms\Models\helper\AdmsRead();
        $viewCurso->fullRead("SELECT *
                                FROM curso
                                WHERE idCurso =:id LIMIT :limit", "id={$this->id}&limit=1");

        $this->resultBd = $viewCurso->getResult();

        if ($this->resultBd) {
            $this->result = true;
        } else {
            $_SESSION['msg'] = "<p style='color: red;'> Curso não encontrado!</p>";
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
        $valCurso = new \App\adms\Models\helper\AdmsValCurso();
        $valCurso->validadeCurso($this->data['nomeCurso']. true, $this->data['idCurso']);

        if ($valCurso->getResult()) {
            $this->edit();
        } else {
            $this->result = false;
        }
    }

    private function edit(): void
    {
        $updateCurso = new \App\adms\Models\helper\AdmsUpdate();
        $updateCurso->executeUpdate("curso", $this->data, "WHERE idCurso=:idCurso", "idCurso={$this->data['idCurso']}");

        if ($updateCurso->getResult()) {
            $_SESSION['msg'] = "<p style='color: green;'> Curso atualizado com sucesso! </p>";
            $this->result = true;
        } else {
            $_SESSION['msg'] = "<p style='color: red;'> Erro: Não foi possível atualizar o curso!</p>";
            $this->result = false;
        }
    }
}
