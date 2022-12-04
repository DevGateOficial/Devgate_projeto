<?php

namespace App\adms\Controllers;

/**
 * Controller da página Lista de cursos
 */
class DeleteCurso
{
    /** @var array|string|null $data Recebe os dados que devem ser enviados para a VIEW*/
    private array|string|null $data = [];

    /**
     * Instancia a classe responsável em carregar a View.
     * E envia os dados para a View.
     *
     * @return void
     */
    public function index(string|int|null $idCurso): void
    {   
        $listAtividades = new \App\adms\Models\AdmsDeleteCurso();
        $listAtividades->getAulas($idCurso);
    }
}