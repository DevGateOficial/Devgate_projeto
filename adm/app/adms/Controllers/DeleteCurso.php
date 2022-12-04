<?php

namespace App\adms\Controllers;

/**
 * Controller da página para deletar o curso.
 */
class DeleteCurso
{
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
