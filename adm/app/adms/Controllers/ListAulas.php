<?php

namespace App\adms\Controllers;

/**
 * Controller da página de listagem de aulas.
 */
class ListAulas
{
    /** @var array|string|null $data Recebe os dados que devem ser enviados para a VIEW*/
    private array|string|null $data = [];

    /**
     * Instancia a classe responsável em carregar a View.
     * E envia os dados para a View.
     *
     * @return void
     */
    public function index(string|int|null $id): void
    {
        $listCursos = new \App\adms\Models\AdmsListAulas();
        $listCursos->viewAula($id);

        if ($listCursos->getResult()) {
            $this->data['listAulas'] = $listCursos->getResultBd();
        } else {
            $this->data['listAulas'] = [];
        }

        $loadView = new \Core\ConfigView("adms/Views/aulas/listAulas", $this->data);
        $loadView->loadView();
    }
}
