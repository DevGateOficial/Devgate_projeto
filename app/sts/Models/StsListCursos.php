<?php

namespace Sts\Models;

/**
 * Classe responsável na listagem de cursos do banco de dados
 */
class StsListCursos
{
    /** @var array $data Recebe os dados que devem ser inseridos no banco de dados*/
    private array|null $data = null;

    /** @var bool $result Recebe os dados que devem ser inseridos no banco de dados*/
    private bool $result = false;

    private array|null $resultBd;

    public function getResult(): bool
    {
        return $this->result;
    }

    public function getResultBd(): array|null 
    {
        return $this->resultBd;
    }

    public function viewCursos(): void
    {
        $listCurso = new \Sts\Models\helper\CRUD\StsRead();
        $listCurso->fullRead("SELECT idCurso, nomeCurso, descricao, objetivos FROM curso");

        $this->resultBd = $listCurso->getResult();

        if($this->resultBd){
            $this->result = true;
        }else{
            $_SESSION['msg'] = "<p style='color: red;'>Nenhum registro encontrado!</p>";
            $this->result = false;
        }
    }
    
}