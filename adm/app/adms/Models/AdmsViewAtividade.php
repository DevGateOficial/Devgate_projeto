<?php

namespace App\adms\Models;

/**
 * Classe responsável na visualização de atividades do banco de dados
 */
class AdmsViewAtividade
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

    public function viewAtividade(int $id): void
    {
        $this->id = $id;

        $viewAtividade = new \App\adms\Models\helper\AdmsRead();
        $viewAtividade->fullRead("SELECT at.*, au.nomeAula 
                                FROM atividade AS at 
                                INNER JOIN aula AS au ON au.idAula=at.idAula
                                WHERE idAtividade =:id LIMIT :limit", "id={$this->id}&limit=1");

        $this->resultBd = $viewAtividade->getResult();

        if ($this->resultBd) {
            $this->result = true;
        } else {
            $_SESSION['msg'] = "<p style='color: red;'> Atividade não encontrada!</p>";
            $this->result = false;
        }
    }
}
