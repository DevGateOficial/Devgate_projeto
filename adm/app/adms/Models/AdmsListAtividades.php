<?php

namespace App\adms\Models;

/**
 * Classe responsável na listagem de cursos do banco de dados
 */
class AdmsListAtividades
{
    /** @var array $data Recebe os dados que devem ser inseridos no banco de dados*/
    private array|null $data = null;

    /** @var bool $result Recebe os dados que devem ser inseridos no banco de dados*/
    private bool $result = false;

    /** @var array|null $resultBd Recebe os dados buscados no banco de dados*/
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
     * Retorna os dados vindos da busca no banco de dados.
     *
     * @return boolean
     */
    public function getResultBd(): array|null 
    {
        return $this->resultBd;
    }

    /**
     * Verifica se o curso informado realmente existe.
     * Caso exista, retorna true e os dados referentes ao curso.
     * Caso não exista, retorna false e uma mensagem de erro.
     *
     * @return void
     */
    public function viewAula($id): void
    {
        $listAtividades = new \App\adms\Models\helper\AdmsRead();
        $listAtividades->fullRead("SELECT * FROM atividade WHERE idAula =:idAula", "idAula={$id}");

        $this->resultBd = $listAtividades->getResult();

        if($this->resultBd){
            $this->result = true;
        }else{
            $_SESSION['msg'] = "<p style='color: red;'>Nenhum registro encontrado!</p>";
            $this->result = false;
        }
    }
    
}