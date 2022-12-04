<?php

namespace App\adms\Controllers;

/**
 * Controller da página de listagem de usuario.
 */
class ListUsers
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
        $listUsers = new \App\adms\Models\AdmsListUsers();
        $listUsers->listUsers();

        if ($listUsers->getResult()) {
            $this->data['listUsers'] = $listUsers->getResultBd();
        } else {
            $this->data['listUsers'] = [];
        }

        $loadView = new \Core\ConfigView("adms/Views/users/listUsers", $this->data);
        $loadView->loadView();
    }
}
