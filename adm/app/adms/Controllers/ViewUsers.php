<?php

namespace App\adms\Controllers;

/**
 * Controller da página visualizar usuarios
 */
class ViewUsers
{
    /** @var array|string|null $data Recebe os dados que devem ser enviados para a VIEW*/
    private array|string|null $data;

    /**
     * Instanciar a classe responsável em carregar a View, e enviar os dados para a View.
     *
     * @return void
     */
    public function index(): void
    {
        echo "CONTROLLER - Pagina visualizar usuario<br>";

        $this->data = [];

        $loadView = new \Core\ConfigView("adms/Views/users/viewUser", $this->data);
        $loadView->loadView();
    }
}
