<?php

namespace App\adms\Controllers;

/**
 * Controller da página de listagem de cursos.
 */
class ListCursos
{
    /** @var array|string|null $data Recebe os dados que devem ser enviados para a VIEW*/
    private array|string|null $data = [];

    /**
     * Instancia a classe responsável em carregar a View.
     * E envia os dados para a View.
     *
     * @return void
     */
    public function index(): void
    {
        $listCursos = new \App\adms\Models\AdmsListCursos();
        $listCursos->viewCursos();

        if ($listCursos->getResult()) {
            $this->data['listCursos'] = $listCursos->getResultBd();
        } else {
            $this->data['listCursos'] = [];
        }

        $loadView = new \Core\ConfigView("adms/Views/cursos/listCursos", $this->data);
        $loadView->loadView();
    }
}
