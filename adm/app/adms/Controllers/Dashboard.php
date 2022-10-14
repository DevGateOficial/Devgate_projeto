<?php

namespace App\adms\Controllers;

/**
 * Controller da página Dashboard
 */
class Dashboard
{
    /** @var array|string|null $data Recebe os dados que devem ser enviados para a VIEW*/
    //private array|string|null $data;

    /**
     * Instanciar a classe responsável em carregar a View, e enviar os dados para a View.
     *
     * @return void
     */
    public function index(): void
    {
        $this->data = "Bem vindo à Dashboard";

        $loadView = new \Core\ConfigView("adms/Views/dashboard/dashboard", $this->data);
        $loadView->loadView();
    }
}