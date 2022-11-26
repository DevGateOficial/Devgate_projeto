<?php

namespace App\adms\Models;

/**
 * Classe responsável na visualização de aulas do banco de dados
 */
class AdmsViewAula
{
    /** @var int|string|null $data Recebe o id do registro*/
    private int|string|null $id;

    /** @var bool $result Recebe os dados que devem ser inseridos no banco de dados*/
    private bool $result = false;

    /** @var array|null $resultBd Recebe os registro do banco de dados*/
    private array|null $resultBd;

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

    public function viewAula(int $id): void
    {
        $this->id = $id;

        $viewAula = new \App\adms\Models\helper\AdmsRead();
        $viewAula->fullRead("SELECT au.*, cur.nomeCurso 
                                FROM aula AS au 
                                INNER JOIN curso AS cur ON cur.idCurso=au.idCurso
                                WHERE idAula =:id LIMIT :limit", "id={$this->id}&limit=1");

        $this->resultBd = $viewAula->getResult();

        if ($this->resultBd) {
            $this->result = true;
        } else {
            $_SESSION['msg'] = "<p style='color: red;'> Aula não encontrado!</p>";
            $this->result = false;
        }
    }
}
