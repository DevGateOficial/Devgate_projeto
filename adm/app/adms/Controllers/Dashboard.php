<?php

namespace App\adms\Controllers;

/**
 * Controller da página Dashboard
 */
class Dashboard
{
    /** @var array|string|null $data Recebe os dados que devem ser enviados para a VIEW*/
    private array|string|null $data;

    /**
     * Instancia a classe responsável em carregar a View.
     * E envia os dados para a View.
     * 
     * @return void
     */
    public function index(): void
    {
        $this->data = "Bem vindo à Dashboard";
        $this->loadView();
    }

    /**
     * Método responsável em carregar a VIEW referente ao CONTROLLER
     * Passa os dados a serem carregados na VIEW.
     * 
     * @return void
     */
    private function loadView(): void
    {
        $loadView = new \Core\ConfigView("adms/Views/dashboard/dashboard", $this->data);
        $loadView->loadView();
    }
}