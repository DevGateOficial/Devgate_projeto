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

    private string $key;

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
    
    public function cursoSearch(string $key = null): void
    {
        $pesquisa = $key;
        $listCurso = new \Sts\Models\helper\CRUD\StsRead();
        $listCurso->fullRead("SELECT idCurso, nomeCurso, descricao, objetivos FROM curso WHERE nomeCurso LIKE '%{$key}%' or descricao LIKE '%{$key}%' or objetivos LIKE '%{$key}%'");
        $this->resultBd = $listCurso->getResult();
        
        if($this->resultBd){
            $this->result = true;
        }else{
            $_SESSION['msg'] = "<p style='color: red;'>Nenhum registro encontrado!</p>";
            $this->result = false;
        }
    }
}

