<?php

namespace App\Adms\Controllers;

/**
 * Controller da página Login
 */
class Login
{
    /** @var array|string|null $data Recebe os dados que devem ser enviados para a VIEW*/
    private array|null $data;

    /**
     * Instanciar a classe responsável em carregar a View, e enviar os dados para a View.
     *
     * @return void
     */
    public function index(): void
    {
        echo "Página de login <br>";

        $this->data = null;

        $loadView = new \Core\ConfigView("adms/Views/login/login", $this->data);
        $loadView->loadView();
    }
}