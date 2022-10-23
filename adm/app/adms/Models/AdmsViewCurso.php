<?php

namespace App\adms\Models;

/**
 * Classe responsável na listagem de cursos do banco de dados
 */
class AdmsViewCurso
{
    /** @var array $data Recebe os dados que devem ser inseridos no banco de dados*/
    private array|null $data = null;

    /** @var bool $result Recebe os dados que devem ser inseridos no banco de dados*/
    private bool $result;

    public function read()
    {
        $listCurso = new \App\adms\Models\helper\AdmsRead();
        $listCurso->executeRead("curso");
    }
    
}